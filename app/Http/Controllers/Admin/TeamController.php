<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\teams\Store;
use App\Http\Requests\Admin\teams\Update;
use App\Models\Team ;
use App\Traits\Report;


class TeamController extends Controller
{
    public function index($id = null)
    {
        if (request()->ajax()) {
            $teams = Team::search(request()->searchArray)->paginate(30);
            $html = view('admin.teams.table' ,compact('teams'))->render() ;
            return response()->json(['html' => $html]);
        }
        return view('admin.teams.index');
    }

    public function create()
    {
        return view('admin.teams.create');
    }


    public function store(Store $request)
    {
        Team::create($request->validated());
        Report::addToLog('  اضافه عضو') ;
        return response()->json(['url' => route('admin.teams.index')]);
    }
    public function edit($id)
    {
        $team = Team::findOrFail($id);
        return view('admin.teams.edit' , ['team' => $team]);
    }

    public function update(Update $request, $id)
    {
        $team = Team::findOrFail($id)->update($request->validated());
        Report::addToLog('  تعديل عضو') ;
        return response()->json(['url' => route('admin.teams.index')]);
    }

    public function show($id)
    {
        $team = Team::findOrFail($id);
        return view('admin.teams.show' , ['team' => $team]);
    }
    public function destroy($id)
    {
        $team = Team::findOrFail($id)->delete();
        Report::addToLog('  حذف عضو') ;
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if (Team::whereIntegerInRaw('id',$ids)->get()->each->delete()) {
            Report::addToLog('  حذف العديد من فريق العمل') ;
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
