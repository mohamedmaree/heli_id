<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Client\Store;
use App\Http\Requests\Admin\Client\Update;
use App\Jobs\Notify;
use App\Mail\SendMail;
use App\Jobs\SendSms;
use App\Models\Complaint;
use App\Models\Order;
use App\Models\User;
use App\Notifications\NotifyUser;
use App\Notifications\BlockUser;
use App\Traits\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Mail;
use App\Imports\ClientImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Services\TransactionService;
use App\Http\Requests\Admin\Client\BalanceRequest;
use DB;
use App\Models\Country ;
use App\Models\SiteSetting;

class ClientController extends Controller {

    public function index($id = null) {
        if (request()->ajax()) {
            $rows = User::search(request()->searchArray)->paginate(30);
            $html = view('admin.clients.table', compact('rows'))->render();
            return response()->json(['html' => $html]);
        }
        return view('admin.clients.index');
    }

    public function create() {
        $supported_countries = SiteSetting::where('key','countries')->first()->value??'';
        $supported_countries = json_decode($supported_countries);
        $countries = Country::whereIn('id',$supported_countries??[])->orderBy('id','ASC')->get();
        return view('admin.clients.create',get_defined_vars());
    }

    public function store(Store $request) {
        $is_blocked = ($request->is_blocked)? 1:0;
        User::create($request->validated()+['is_blocked' => $is_blocked]);
        Report::addToLog('  اضافه مستخدم');
        return response()->json(['url' => route('admin.clients.index')]);
    }

    public function edit($id) {
        $row = User::findOrFail($id);
        $supported_countries = SiteSetting::where('key','countries')->first()->value??'';
        $supported_countries = json_decode($supported_countries);
        $countries = Country::whereIn('id',$supported_countries??[])->orderBy('id','ASC')->get();
        return view('admin.clients.edit',get_defined_vars());
    }

    public function update(Update $request, $id) {
        $is_blocked = ($request->is_blocked)? 1:0;
        $user = User::findOrFail($id)->update($request->validated()+['is_blocked' => $is_blocked]);
        Report::addToLog('  تعديل مستخدم');
        return response()->json(['url' => route('admin.clients.index')]);
    }

        /** public function Update Balance **/
        public function updateBalance(BalanceRequest $request){
            $user = User::findOrFail($request->user_id);
            $amount = convert2english($request->balance);
            DB::beginTransaction();
            try {
                if( $amount > 0){
                   (new TransactionService)->adminAddtoUserWallet($user,$amount); 
                }elseif($amount <  0 ){
                    (new TransactionService)->adminCutFromUserWallet($user,$amount); 
                }
                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();
            }
    
            return redirect()->back()->with('success', __('admin.update_successfullay'));
        }
    
    public function show($id) {
        $row = User::findOrFail($id);
        $supported_countries = SiteSetting::where('key','countries')->first()->value??'';
        $supported_countries = json_decode($supported_countries);
        $countries = Country::whereIn('id',$supported_countries??[])->orderBy('id','ASC')->get();
        return view('admin.clients.show', get_defined_vars());
    }
    public function showfinancial($id) {
        $complaints = Complaint::where('user_id', $id)->paginate(10);
        return view('admin.complaints.user_complaints', ['complaints' => $complaints]);
    }

    public function showorders($id) {
        $orders = Order::where('user_id', $id)->paginate(10);
        return view('admin.clients.orders', ['orders' => $orders]);
    }


    public function destroy($id) {
        $user = User::findOrFail($id)->delete();
        Report::addToLog('  حذف مستخدم');
        return response()->json(['id' => $id]);
    }

    public function block(Request $request) {
        $user = User::findOrFail($request->id);
        $user->update(['is_blocked' => !$user->is_blocked]);
        Notification::send($user, new BlockUser($request->all()));
        return response()->json(['message' => $user->refresh()->is_blocked == 1 ? __('admin.client_blocked') :  __('admin.client_unblocked')]);
    }

    public function notify(Request $request) {
        if ($request->notify == 'notify') {
            if ('all' == $request->id) {
                $clients = User::latest()->get();
            } else {
                $clients = User::findOrFail($request->id);
            }
            Notification::send($clients, new NotifyUser($request->all()));
        }elseif($request->notify == 'email'){
            if ('all' == $request->id) {
                $mails = User::where('email', '!=', null)->get()->pluck('email')->toArray();
            } else {
                $mails = User::findOrFail($request->id)->email;
            }
            Mail::to($mails)->send(new SendMail(['title' => 'اشعار اداري', 'message' => $request->message]));
        }elseif($request->notify == 'sms'){
            if ('all' == $request->id) {
                $phones = User::where('phone' , '!=' , null)->get()->pluck('phone')->toArray();
                dispatch(new SendSms($phones , $request->body));
            } else {
                $phone = User::findOrFail($request->id)->full_phone;
                dispatch(new SendSms($phone , $request->body));
                // $this->sendSms($phone , $request->body);
            }
        }
        return response()->json();
    }

      
    public function destroyAll(Request $request) {
        $requestIds = json_decode($request->data);

        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (User::whereIntegerInRaw('id', $ids)->get()->each->delete()) {
            Report::addToLog('  حذف العديد من المستخدمين');
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }

    public function importFile(Request $request){
        Excel::import(new ClientImport,request()->file('file'));        
        Report::addToLog(' رفع ملف بالعملاء') ;
        return response()->json(['url' => route('admin.clients.index')]);
    }
}