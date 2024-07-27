@extends('admin.layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css-rtl/plugins/forms/validation/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/extensions/sweetalert2.min.css')}}">
@endsection

@section('content')
<form  method="POST" action="{{route('admin.socials.update' , ['id' => $social->id])}}" class="store" novalidate>

    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-md-3">
                <div class="col-12 card card-body">
                    <div class="imgMontg col-12 text-center">
                        <div class="dropBox">
                            <div class="textCenter">
                                <div class="imagesUploadBlock">
                                    <label class="uploadImg">
                                        <span><i class="feather icon-image"></i></span>
                                        <input type="file" accept="image/*" name="icon" class="imageUploader">
                                    </label>
                                    <div class="uploadedBlock">
                                        <img src="{{$social->icon}}">
                                        <button class="close"><i class="la la-times"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <div class="card">
                    {{-- <div class="card-header">
                        <h4 class="card-title">{{__('admin.edit')}}</h4>
                    </div> --}}
                    <div class="card-content">
                        <div class="card-body">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="row">

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">{{__('admin.name')}}</label>
                                                <div class="controls">
                                                    <input type="text" name="name" class="form-control" value="{{$social->name}}" placeholder="{{__('admin.write_the_name')}}" required data-validation-required-message="{{__('admin.this_field_is_required')}}" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">{{__('admin.Link')}}</label>
                                                <div class="controls">
                                                    <input type="url" name="link"   class="form-control" value="{{$social->link}}" placeholder="{{__('admin.enter_the_link')}}" required data-validation-required-message="{{__('admin.this_field_is_required')}}" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex justify-content-center mt-3">
                                            <button type="submit" class="btn btn-primary mr-1 mb-1 submit_button">{{__('admin.update')}}</button>
                                            <a href="{{ url()->previous() }}" type="reset" class="btn btn-outline-warning mr-1 mb-1">{{__('admin.back')}}</a>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
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