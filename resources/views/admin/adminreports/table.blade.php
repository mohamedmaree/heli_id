@extends('admin.layout.master')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/index_page.css')}}">
@endsection

@section('content')

<div class="position-relative">

    {{-- table loader  --}}
  
    {{-- table loader  --}}
    
    {{-- table content --}}
    <table class="table " id="tab">
        <thead>
            <tr>
               
                <th>{{ __('admin.date') }}</th>
                <th>{{ __('admin.transactionable_type') }}</th>
                <th>{{ __('admin.credit') }}</th>
                <th>{{ __('admin.debit') }}</th>
                <th>{{ __('admin.type') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr class="delete_row">
                  
                    <td>{{ $transaction->created_at ? : '-' }}</td>
                    <td>{{ $transaction->transactionable->name??'' }}</td>
                    <td>{{ $transaction->credit }}</td>
                    <td>{{ $transaction->dept }}</td>
                    <td>{{ $transaction->message }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- table content --}}
    {{-- no data found div --}}
    @if ($transactions->count() == 0)
        <div class="d-flex flex-column w-100 align-center mt-4">
            <img src="{{asset('admin/app-assets/images/pages/404.png')}}" alt="">
            <span class="mt-2" style="font-family: cairo">{{__('admin.there_are_no_matches_matching')}}</span>
        </div>
    @endif
    {{-- no data found div --}}

</div>
{{-- pagination  links div --}}
@if ($transactions->count() > 0 && $transactions instanceof \Illuminate\Pagination\AbstractPaginator )
    <div class="d-flex justify-content-center mt-3">
        {{$transactions->links()}}
    </div>
@endif
{{-- pagination  links div --}}
@endsection

