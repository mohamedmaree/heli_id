<div class="tab-pane fade" id="walletHistory">
    @if($row->transactions->count() > 0)
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">{{  __('admin.wallet_history') }}</h5>
        </div>
        <div class="d-flex justify-content-center btns">

        </div>
        <div class="card-body">
            <div class="contain-table">
                <table class="table datatable-button-init-basic">
                    <thead>
                    <tr class="text-center">
                        <th class="text-center">#</th>
                        <th class="text-center">{{ __('admin.opertaion') }}</th>
                        <th class="text-center">{{ __('admin.the_amount') }}</th>
                        <th class="text-center">{{ __('admin.date') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($row->transactions as $key => $history)
                        <tr class="text-center" id="row_865">
                            <td class="text-center">{{ $key + 1  }}</td>
                            <td class="text-center">{{ $history->message }}</td>
                            <td class="text-center">{{ $history->amount }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($history->created_at)->format('Y-m-d') }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @else
        <div class="d-flex flex-column w-100 align-center mt-4">
            <img src="{{asset('admin/app-assets/images/pages/404.png')}}" alt="">
            <span class="mt-2" style="font-family: cairo">{{__('admin.there_are_no_matches_matching')}}</span>
        </div>
    @endif
</div>