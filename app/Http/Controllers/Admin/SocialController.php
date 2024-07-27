<?php

namespace App\Http\Controllers\Admin;

use App\Models\Social;
use App\Traits\Report;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ISocial;
use App\Http\Requests\Admin\Socials\Store;
use Illuminate\Support\Facades\Cache;

class SocialController extends Controller
{
    use Report ;

    public function index($id = null)
    {
        if (request()->ajax()) {
            $socials = Social::search(request()->searchArray)->paginate(30);
            $html = view('admin.socials.table' ,compact('socials'))->render() ;
            return response()->json(['html' => $html]);
        }
        return view('admin.socials.index');
    }
  


    public function create()
    {
        return view('admin.socials.create');
    }
    
    public function store(Store $request)
    {
        Social::create($request->validated());
        Cache::forget('socials');
        Report::addToLog('  اضافه وسيلة تواصل') ;
        return response()->json(['url' => route('admin.socials.index')]);
    }

    public function edit($id)
    {
        $social = Social::findOrFail($id);
        return view('admin.socials.edit' , ['social' => $social]);
    }

    public function update(Store $request, $id)
    {
        Social::findOrFail($id)->update($request->validated());
        Cache::forget('socials');
        Report::addToLog('  تعديل وسيلة تواصل') ;
        return response()->json(['url' => route('admin.socials.index')]);
    }

    public function show($id)
    {
        $social = Social::findOrFail($id);
        return view('admin.socials.show' , ['social' => $social]);
    }
    public function destroy($id)
    {
        Social::findOrFail($id)->delete();
        Cache::forget('socials');
        Report::addToLog('  حذف وسيلة تواصل') ;
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (Social::whereIntegerInRaw('id' , $ids)->get()->each->delete()) {
            Cache::forget('socials');
            Report::addToLog('  حذف العديد من وسائل التواصل') ;
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }

    public function blockUser($id)
    {
        $client = $this->userRepo->findOrFail($id);
        $this->userRepo->block($client);
        $data = [
            'sender'        => auth()->guard('admin')->id(),
            'title_ar'      => 'حظر',
            'title_en'      => 'Block',
            'message_ar'    => 'تم حظرك من قبل الادراه ',
            'message_en'    => 'You have been banned by admin',
            'data'          => [
                'type'       => 4 ,
            ],
        ];
        dispatch(new BlockUser($client, $data));
        return redirect()->back()->with('success', 'تم حظر المستخدم بنجاح');
    }
    public function notify(Request $request)
    {
        $client = $this->userRepo->findOrFail($request->id);
        $data = [
            'sender'        => auth()->guard('admin')->id(),
            'title_ar'      => 'تنبيه اداري',
            'title_en'      => 'Administrative Notify',
            'message_ar'    => $request->message_ar ? $request->message_ar : $request->message_en ,
            'message_en'    => $request->message_en ? $request->message_en : $request->message_ar,
            'data'          => [
                'type'       => 0 ,
            ],
        ];
        dispatch(new AcceptAd($client, $data));
        return redirect()->back()->with('success', 'تم ارسال الاشعار بنجاح');
    }
}
