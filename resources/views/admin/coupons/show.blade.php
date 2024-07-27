@extends('admin.layout.master')

@section('content')
<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
    <div class="coupon match-height">
        <div class="col-12">
            <div class="card">
                {{-- <div class="card-header">
                    <h4 class="card-title">{{__('admin.show')}}</h4>
                </div> --}}
                <div class="card-content">
                    <div class="card-body">
                        <form  class="store form-horizontal" >
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">{{__('admin.coupon_number')}}</label>
                                            <div class="controls">
                                                <input type="text" name="coupon_num" value="{{$coupon->coupon_num}}" class="form-control" placeholder="{{__('admin.enter_coupon_number')}}" required data-validation-required-message="{{__('admin.this_field_is_required')}}" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">{{__('admin.number_of_use')}}</label>
                                            <div class="controls">
                                                <input type="number" name="max_use" value="{{$coupon->max_use}}" class="form-control" placeholder="{{__('admin.enter_number_of_use')}}" required data-validation-required-message="{{__('admin.this_field_is_required')}}" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">{{__('admin.discount_type')}}</label>
                                            <div class="controls">
                                                <select name="type" class="select2 form-control" required data-validation-required-message="{{__('admin.this_field_is_required')}}" >
                                                    <option value>{{__('admin.select_the_discount_state')}}</option>
                                                    <option {{$coupon->type == 'ratio' ? 'selected' : ''}} value="ratio">{{__('admin.Percentage')}}</option>
                                                    <option {{$coupon->type == 'number' ? 'selected' : ''}} value="number">{{__('admin.fixed_number')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">{{__('admin.discount_value')}}</label>
                                            <div class="controls">
                                                <input type="number" value="{{$coupon->discount}}" name="discount" class="discount form-control" placeholder="{{__('admin.type_the_value_of_the_discount')}}" required data-validation-required-message="{{__('admin.this_field_is_required')}}" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">{{__('admin.larger_value_for_discount')}}</label>
                                            <div class="controls">
                                                <input readonly type="number" value="{{$coupon->max_discount}}" name="max_discount" class="max_discount form-control" placeholder="{{__('admin.write_the_greatest_value_for_the_discount')}}" required data-validation-required-message="{{__('admin.this_field_is_required')}}" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">{{ __('admin.start_date') }}</label>
                                            <div class="controls">
                                                <input type="text" value="{{date('M,Y d', strtotime($coupon->start_date))}}" name="start_date" class="form-control" required
                                                    data-validation-required-message="{{ __('admin.this_field_is_required') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">{{__('admin.expiry_date')}}</label>
                                            <div class="controls">
                                                <input  type="text" value="{{date('M,Y d', strtotime($coupon->expire_date));}}" name="expire_date" class="pickadate form-control"  required data-validation-required-message="{{__('admin.this_field_is_required')}}" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-center mt-3">
                                        <a href="{{ url()->previous() }}" type="reset" class="btn btn-outline-warning mr-1 mb-1">{{__('admin.back')}}</a>
                                    </div>
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('js')
    <script>
        $('.store input').attr('disabled' , true)
        $('.store textarea').attr('disabled' , true)
        $('.store select').attr('disabled' , true)

    </script>
@endsection