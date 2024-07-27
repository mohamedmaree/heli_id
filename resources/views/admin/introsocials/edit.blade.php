@extends('admin.layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css-rtl/plugins/forms/validation/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/extensions/sweetalert2.min.css')}}">
@endsection

@section('content')
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    {{-- <div class="card-header">
                        <h4 class="card-title">{{__('admin.edit')}}</h4>
                    </div> --}}
                    <div class="card-content">
                        <div class="card-body">
                            <form  method="POST" action="{{route('admin.introsocials.update' , ['id' => $social->id])}}" class="store" novalidate>
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="row">
                                        
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">{{__('admin.name')}}</label>
                                                <div class="controls">
                                                    <input type="text" name="key" class="form-control" value="{{$social->key}}" placeholder="{{__('admin.write_the_name')}}" required data-validation-required-message="{{__('admin.this_field_is_required')}}" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">{{__('admin.link')}}</label>
                                                <div class="controls">
                                                    <input type="url" name="url"   class="form-control" value="{{$social->url}}" placeholder="{{__('admin.enter_the_link')}}" required data-validation-required-message="{{__('admin.this_field_is_required')}}" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">{{__('admin.icon')}}</label>
                                                <div class="controls">
                                                    <input type="text" name="icon"  value="{{$social->icon}}" class="form-control" placeholder="{{__('admin.enter_the_icon')}}" required data-validation-required-message="{{__('admin.this_field_is_required')}}" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex justify-content-center mt-3">
                                            <button type="submit" class="btn btn-primary mr-1 mb-1 submit_button">{{__('admin.update')}}</button>
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
    <script src="{{asset('admin/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"></script>
    <script src="{{asset('admin/app-assets/js/scripts/forms/validation/form-validation.js')}}"></script>
    <script src="{{asset('admin/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/js/scripts/extensions/sweet-alerts.js')}}"></script>

    
    {{-- show selected image script --}}
        @include('admin.shared.addImage')
    {{-- show selected image script --}}

    {{-- submit edit form script --}}
        @include('admin.shared.submitEditForm')
    {{-- submit edit form script --}}
@endsection