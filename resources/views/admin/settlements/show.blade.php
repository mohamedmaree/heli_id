@extends('admin.layout.master')

@section('content')
    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    {{-- <div class="card-header">
                        <h4 class="card-title">{{__('admin.show')}}</h4>
                    </div> --}}
                    <div class="card-content">
                        <div class="card-body">
                            <form class="show form-horizontal">
                                <div class="form-body">
                                    <div class="form-body">
                                        <div class="category">
                                            <div class="col-12">
                                                <div class="imgMontg col-12 text-center">
                                                    <div class="dropBox">
                                                        <div class="textCenter">
                                                            <div class="imagesUploadBlock">
                                                                @if($settlement->image)
                                                                <label class="uploadImg">
                                                                    <span><i class="feather icon-image"></i></span>
                                                                    <input type="file" accept="image/*" name="image"
                                                                           class="imageUploader">
                                                                </label>
                                                                <div class="uploadedBlock">
                                                                    <img src="{{$settlement->ImagePath}}">
                                                                </div>
                                                                @else
                                                                    <p>لا يوجد صوره إيصال</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="first-name-column">{{__('admin.service_provider_name')}}</label>
                                                        <div class="controls">
                                                            <input type="text"
                                                                   value="{{$settlement->transactionable?->name}}"
                                                                   name="user_id" class="form-control"
                                                                   placeholder="{{__('site.write') . __('admin.service_provider_name')}}"
                                                                   required
                                                                   data-validation-required-message="{{__('admin.this_field_is_required')}}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="first-name-column">{{__('admin.settlement_amount')}}</label>
                                                        <div class="controls">
                                                            <input type="text"
                                                                   value="{{$settlement->amount}}"
                                                                   name="user_id" class="form-control"
                                                                   placeholder="{{__('site.write') . __('admin.settlement_amount')}}"
                                                                   required
                                                                   data-validation-required-message="{{__('admin.this_field_is_required')}}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 col-12">
                                                    <div class="form-group">
                                                        <label for="first-name-column">{{__('admin.order_status')}}</label>
                                                        <div class="controls">
                                                            <select name="parent_id" class="select2 form-control">
                                                                <option value>{{__('admin.select_section')}}</option>
                                                                @foreach ($types as $type)
                                                                    <option {{$settlement->status == $type ? 'selected' : ''}}>@lang('site.'.$settlement->status)</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex justify-content-center mt-3">
                                                    <a href="{{ url()->previous() }}" type="reset"
                                                       class="btn btn-outline-warning mr-1 mb-1">{{__('admin.back')}}</a>
                                                </div>

                                            </div>
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
        $('.show input').attr('disabled', true)
        $('.show textarea').attr('disabled', true)
        $('.show select').attr('disabled', true)
    </script>
@endsection