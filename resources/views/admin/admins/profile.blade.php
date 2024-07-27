@extends('admin.layout.master')
{{-- extra css files --}}
@section('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/css-rtl/plugins/forms/validation/form-validation.css') }}">
@endsection
{{-- extra css files --}}
@section('content')

<div class="content-body">
  <!-- account setting page start -->
  <section id="page-account-settings">
      <div class="row">
          <!-- left menu section -->
          <div class="col-md-3 mb-2 mb-md-0">
              <ul class="nav nav-pills flex-column mt-md-0 mt-1 card card-body">

                  <li class="nav-item">
                      <a class="nav-link d-flex py-75 active" id="account-pill-main" data-toggle="pill" href="#account-vertical-main" aria-expanded="true">
                          <i class="feather icon-settings mr-50 font-medium-3"></i>
                          {{__('admin.main_data')}}
                      </a>
                  </li>
                  <li class="nav-item" style="margin-top: 3px" > 
                      <a class="nav-link d-flex py-75" id="account-pill-terms" data-toggle="pill" href="#account-vertical-terms" aria-expanded="false">
                          <i class="feather icon-edit-1 mr-50 font-medium-3"></i>
                          {{__('admin.change_password')}}
                      </a>
                  </li>

              </ul>
          </div>
          <!-- right content section -->
          <div class="col-md-9">
              <div class="card">
                  <div class="card-content">
                      <div class="card-body">
                          <div class="tab-content">

                              <div role="tabpanel" class="tab-pane active" id="account-vertical-main" aria-labelledby="account-pill-main" aria-expanded="true">
                                <form action="{{route('admin.profile.update')}}" method="post" enctype="multipart/form-data" class="form-horizontal" novalidate>
                                    @method('put')
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="imgMontg  text-center">
                                                <div class="dropBox">
                                                    <div class="textCenter d-flex flex-lg-column">
                                                        <div class="imagesUploadBlock">
                                                            <label class="uploadImg">
                                                                <span><i class="feather icon-image"></i></span>
                                                                <input type="file" accept="image/*" name="avatar" class="imageUploader">
                                                            </label>
                                                            <div class="uploadedBlock">
                                                                <img src="{{auth('admin')->user()->avatar}}">
                                                                <button class="close"><i class="feather icon-trash-2"></i></button>
                                                            </div>
                                                        </div>
                                                        <span>{{__('admin.profile_image')}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">{{  __('admin.name') }}</label>
                                                <div class="controls">
                                                    <input type="text" name="name" class="form-control" value="{{auth('admin')->user()->name}}" placeholder="{{  __('admin.write_the_name') }}" required data-validation-required-message="{{ __('admin.this_field_is_required') }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">{{__('admin.phone_number')}}</label>
                                                <div class="row">
                                                    <div class="col-md-9 col-12">
                                                        <div class="controls">
                                                            <input type="number" name="phone" value="{{auth('admin')->user()->phone}}"  class="form-control" placeholder="{{__('admin.enter_phone_number')}}" required data-validation-required-message="{{__('admin.this_field_is_required')}}" data-validation-number-message="{{__('admin.the_phone_number_ must_not_have_charachters_or_symbol')}}"  >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <select name="country_code" class="form-control select2">
                                                            @foreach($countries as $country)
                                                                <option value="{{ $country->key }}"
                                                                    @if (auth('admin')->user()->country_code == $country->key)
                                                                        selected
                                                                    @endif >
                                                                {{ $country->key.'+' }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">{{ __('admin.email') }}</label>
                                                <div class="controls">
                                                <input type="email" value="{{auth('admin')->user()->email}}"  name="email" class="form-control" placeholder="{{  __('admin.enter_the_email') }}" required data-validation-required-message="{{ __('admin.this_field_is_required') }}" data-validation-email-message="{{__('admin.email_formula_is_incorrect')}}">
                                                </div>
                                            </div>
                                        </div>
                                           
                                        
                                        <div class="col-12 d-flex justify-content-center mt-3">
                                            <button type="submit" class="btn btn-primary mr-1 mb-1 submit_button">{{__('admin.saving_changes')}}</button>
                                            <a href="{{ url()->previous() }}" type="reset" class="btn btn-outline-warning mr-1 mb-1">{{__('admin.back')}}</a>
                                        </div>
                                    </div>
                                </form>
                              </div>

                              <div role="tabpanel" class="tab-pane" id="account-vertical-terms" aria-labelledby="account-pill-terms" aria-expanded="false">
                                <form action="{{route('admin.profile.update_password')}}" method="post" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                        <div class="row">
                                            
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="first-name-column">{{  __('admin.new_password') }}</label>
                                                    <div class="controls">
                                                        <input type="password" name="password" class="form-control" required data-validation-required-message="{{ __('admin.this_field_is_required') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <div class="form-group">
                                                    <label for="first-name-column">{{  __('admin.new_password_confirm') }}</label>
                                                    <div class="controls">
                                                        <input type="password" name="password_confirmation" class="form-control" required data-validation-required-message="{{ __('admin.this_field_is_required') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <div class="col-12 d-flex justify-content-center mt-3">
                                          <button type="submit" class="btn btn-primary mr-1 mb-1 submit_button">{{__('admin.saving_changes')}}</button>
                                          <a href="{{ url()->previous() }}" type="reset" class="btn btn-outline-warning mr-1 mb-1">{{__('admin.back')}}</a>
                                      </div>
                                    </div>
                                </form>
                              </div>

                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- account setting page end -->

</div>

@endsection
@section('js')
    <script src="{{asset('admin/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"></script>
    <script src="{{asset('admin/app-assets/js/scripts/forms/validation/form-validation.js')}}"></script>
  {{-- show selected image script --}}
    @include('admin.shared.addImage')
  {{-- show selected image script --}}
@endsection

