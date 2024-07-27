<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\settlements\Store;
use App\Models\Settlement;
use App\Services\TransactionService;
use App\Traits\Report;
use App\Http\Controllers\Controller;


class SettlementController extends Controller
{
    public function index($id = null)
    {
        if (request()->ajax()) {
            $settlements = Settlement::search(request()->searchArray)->paginate(30);
            $html = view('admin.settlements.table' ,compact('settlements'))->render() ;
            return response()->json(['html' => $html]);
        }
        return view('admin.settlements.index');
    }


    public function show($id)
    {
        $settlement = Settlement::findOrFail($id);
        $types = ['pending' , 'accepted' , 'rejected'];
        return view('admin.settlements.show', compact('settlement','types'));
    }

    public function settlementChangeStatus(Store $request)
    {
        $data = $request->validated();

        $settlement = Settlement::findOrFail($data['id']);

        if ($data['status'] == 'accepted')
        {
            $settlement->update([
                'status' => $data['status'] ,
                'image' => $data['image'],
                'amount' => $data['amount']]
            );

            /*  Add Your Transactions Service here  */
            (new TransactionService)->AcceptWithdraw($settlement);
            /*  Add Your Transactions Service here  */


            /*  Add Your Notification here  */

        }else
        {
            $settlement->update([
                'status' => $data['status']
            ]);

            /*  Add Your Notification here  */
        }

        Report::addToLog('  بتغير حاله طلب التسوية') ;

        return response()->json(['url' => route('admin.settlements.index')]);

    }

}
