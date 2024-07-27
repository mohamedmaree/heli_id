@extends('admin.layout.master')

@section('content')
<div class="position-relative">

    {{-- table loader  --}}
  
    {{-- table loader  --}}
    
    {{-- table content --}}
    <table class="table " id="tab">
        <thead>
            <tr>
               
                <th>{{ __('admin.date') }}</th>
                <th>{{ __('admin.order_num') }}</th>
                <th>{{ __('admin.coupon_number') }}</th>
                <th>{{ __('admin.status') }}</th>
             
            </tr>
        </thead>
        <tbody>
            @foreach ( $orders as $order)
                <tr class="delete_row">
                  
                    <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y')}}</td>
                    <td>{{ $order->order_num }}</td>
                    <td>{{ $order->coupon_id }}</td>
                    <td>{{ $order->status }}</td>
                   
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- table content --}}
    {{-- no data found div --}}
    @if ( $orders->count() == 0)
        <div class="d-flex flex-column w-100 align-center mt-4">
            <img src="{{asset('admin/app-assets/images/pages/404.png')}}" alt="">
            <span class="mt-2" style="font-family: cairo">{{__('admin.there_are_no_matches_matching')}}</span>
        </div>
    @endif
    {{-- no data found div --}}

</div>
{{-- pagination  links div --}}
@if ( $orders->count() > 0 &&  $orders instanceof \Illuminate\Pagination\AbstractPaginator )
    <div class="d-flex justify-content-center mt-3">
        {{ $orders->links()}}
    </div>
@endif
{{-- pagination  links div --}}
@endsection