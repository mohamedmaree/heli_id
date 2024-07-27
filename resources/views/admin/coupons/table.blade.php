<div class="position-relative">
    {{-- table loader  --}}
    {{-- <div class="table_loader" >
        {{__('admin.loading')}}
    </div> --}}
    {{-- table loader  --}}
    {{-- table content --}}
    <table class="table " id="tab">
        <thead>
            <tr>
                <th>
                    <label class="container-checkbox">
                        <input type="checkbox" value="value1" name="name1" id="checkedAll">
                        <span class="checkmark"></span>
                    </label>
                </th>
                <th>{{ __('admin.date') }}</th>
                <th>{{ __('admin.coupon_number') }}</th>
                <th>{{ __('admin.discount_type') }}</th>
                <th>{{ __('admin.discount_value') }}</th>
                <th>{{ __('admin.start_date') }}</th>
                <th>{{ __('admin.expiry_date') }}</th>
                <th>{{ __('admin.active_or_diactive_coupon') }}</th>
                <th>{{ __('admin.control') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($coupons as $coupon)
                <tr class="delete_coupon">
                    <td class="text-center">
                        <label class="container-checkbox">
                            <input type="checkbox" class="checkSingle" id="{{$coupon->id}}">
                            <span class="checkmark"></span>
                        </label>
                    </td>
                    <td>{{\Carbon\Carbon::parse($coupon->created_at)->format('d/m/Y')}}</td>
                    <td>{{$coupon->coupon_num}}</td>
                    <td>{{$coupon->type == 'ratio' ? 'نسبة' :  'رقم ثابت'}}</td>
                    <td>{{$coupon->discount}}</td>
                    <td>{{date('d-m-Y', strtotime($coupon->start_date))}}</td>
                    <td>{{date('d-m-Y', strtotime($coupon->expire_date))}}</td>
                    <td>
                        @if($coupon->status == 'available')
                            <span class="btn btn-sm round btn-outline-danger change-coupon-status" data-date="{{$coupon->expire_date}}" data-status="closed" data-id="{{$coupon->id}}"> 
                                {{__('admin.Stop_Coupon')}}  <i class="feather icon-slash"></i>
                            </span>
                        @else
                            <span class="btn btn-sm round btn-outline-success open-coupon" data-toggle="modal" id="div_{{$coupon->id}}" data-target="#notify" data-id="{{$coupon->id}}"> 
                                {{__('admin.reactivation_Coupon')}}  <i class="feather icon-rotate-cw"></i>
                            </span>
                        @endif
                    </td>
                    <td class="product-action">
                        <span class="text-primary"><a href="{{ route('admin.coupons.show', ['id' => $coupon->id]) }}" class="btn btn-warning btn-sm"><i class="feather icon-eye"></i> {{ __('admin.show') }}</a></span>
                        <span class="action-edit text-primary"><a href="{{ route('admin.coupons.edit', ['id' => $coupon->id]) }}" class="btn btn-primary btn-sm"><i class="feather icon-edit"></i>{{ __('admin.edit') }}</a></span>
                        <span class="delete-row btn btn-danger btn-sm" data-url="{{ url('admin/coupons/' . $coupon->id) }}"><i class="feather icon-trash"></i>{{ __('admin.delete') }}</span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- table content --}}
    {{-- no data found div --}}
    @if ($coupons->count() == 0)
        <div class="d-flex flex-column w-100 align-center mt-4">
            <img src="{{asset('admin/app-assets/images/pages/404.png')}}" alt="">
            <span class="mt-2" style="font-family: cairo">{{__('admin.there_are_no_matches_matching')}}</span>
        </div>
    @endif
    {{-- no data found div --}}

</div>
{{-- pagination  links div --}}
@if ($coupons->count() > 0 && $coupons instanceof \Illuminate\Pagination\AbstractPaginator )
    <div class="d-flex justify-content-center mt-3">
        {{$coupons->links()}}
    </div>
@endif
{{-- pagination  links div --}}