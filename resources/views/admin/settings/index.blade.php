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
          <div class="col-md-3 mb-2 mb-md-0 ">
              <ul class="nav nav-pills flex-column mt-md-0 mt-1 card card-body">

                <li class="nav-item">
                    <a class="nav-link d-flex py-75 active" id="account-pill-main" data-toggle="pill" href="#account-vertical-main" aria-expanded="true">
                        <i class="feather icon-settings mr-50 font-medium-3"></i>
                        {{__('admin.app_setting')}}
                    </a>
                </li>
                <li class="nav-item" style="margin-top: 3px" >
                    <a class="nav-link d-flex py-75" id="account-pill-language" data-toggle="pill" href="#account-vertical-language" aria-expanded="true">
                        <i class="feather icon-settings mr-50 font-medium-3"></i>
                        {{__('admin.language_setting')}}
                    </a>
                </li>
                <li class="nav-item" style="margin-top: 3px" >
                    <a class="nav-link d-flex py-75" id="account-pill-countries" data-toggle="pill" href="#account-vertical-countries" aria-expanded="true">
                        <i class="feather icon-settings mr-50 font-medium-3"></i>
                        {{__('admin.countries_currencies')}}
                    </a>
                </li>
                <li class="nav-item" style="margin-top: 3px" > 
                    <a class="nav-link d-flex py-75" id="account-pill-terms" data-toggle="pill" href="#account-vertical-terms" aria-expanded="false">
                        <i class="feather icon-edit-1 mr-50 font-medium-3"></i>
                        {{__('admin.terms_and_conditions')}}
                    </a>
                </li>
                <li class="nav-item " style="margin-top: 3px">
                    <a class="nav-link d-flex py-75" id="account-pill-about" data-toggle="pill" href="#account-vertical-about" aria-expanded="false">
                        <i class="feather icon-edit-1 mr-50 font-medium-3"></i>
                        {{__('admin.about_app')}}
                    </a>
                </li>
                <li class="nav-item " style="margin-top: 3px">
                    <a class="nav-link d-flex py-75" id="account-pill-privacy" data-toggle="pill" href="#account-vertical-privacy" aria-expanded="false">
                        <i class="feather icon-award mr-50 font-medium-3"></i>
                        {{__('admin.Privacy_policy')}}
                    </a>
                </li>
                <li class="nav-item " style="margin-top: 3px">
                    <a class="nav-link d-flex py-75" id="account-pill-smtp" data-toggle="pill" href="#account-vertical-smtp" aria-expanded="false">
                        <i class="feather icon-mail mr-50 font-medium-3"></i>
                        {{__('admin.email_data')}}
                    </a>
                </li>
                <li class="nav-item " style="margin-top: 3px">
                    <a class="nav-link d-flex py-75" id="account-pill-notifications" data-toggle="pill" href="#account-vertical-notifications" aria-expanded="false">
                        <i class="feather icon-bell mr-50 font-medium-3"></i>
                        {{__('admin.notification_data')}}
                    </a>
                </li>
                <li class="nav-item " style="margin-top: 3px">
                    <a class="nav-link d-flex py-75" id="account-pill-api" data-toggle="pill" href="#account-vertical-api" aria-expanded="false">
                        <i class="feather icon-droplet mr-50 font-medium-3"></i>
                        {{__('admin.api_data')}}
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
                                <form accept="{{route('admin.settings.update')}}" method="post" enctype="multipart/form-data" class="form-horizontal" novalidate>
                                  @method('put')
                                  @csrf
                                <div class="row">
                                  <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label for="account-name">{{__('admin.the_name_of_the_application_in_arabic')}}</label>
                                                <input type="text" class="form-control" name="name_ar" id="account-name" placeholder="{{__('admin.the_name_of_the_application_in_arabic')}}" value="{{$data['name_ar']}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label for="account-name">{{__('admin.the_name_of_the_application_in_english')}}</label>
                                                <input type="text" class="form-control" name="name_en" id="account-name" placeholder="{{__('admin.the_name_of_the_application_in_english')}}" value="{{$data['name_en']}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label for="account-name">{{__('admin.email')}}</label>
                                                <input type="email" class="form-control" name="email" id="account-name" placeholder="{{__('admin.email')}}" value="{{$data['email']}}" data-validation-email-message="{{__('admin.verify_the_email_format')}}" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">{{__('admin.phone_number')}}</label>
                                            <div class="row">
                                                <div class="col-md-9 col-12">
                                                    <div class="controls">
                                                        <input type="number" name="phone" value="{{$data['phone']}}"  class="form-control" placeholder="{{__('admin.enter_phone_number')}}" required data-validation-required-message="{{__('admin.this_field_is_required')}}" data-validation-number-message="{{__('admin.the_phone_number_ must_not_have_charachters_or_symbol')}}"  >
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                    <select name="country_code" class="form-control select2">
                                                        @foreach($countries as $country)
                                                            <option value="{{ $country->key }}"
                                                                @if ($data['country_code'] == $country->key)
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
                                            <label for="first-name-column">{{__('admin.whatts_app_number')}}</label>
                                            <div class="row">
                                                <div class="col-md-9 col-12">
                                                    <div class="controls">
                                                        <input type="number" name="whatsapp" value="{{$data['whatsapp']}}"  class="form-control" placeholder="{{__('admin.whatts_app_number')}}" required data-validation-required-message="{{__('admin.this_field_is_required')}}" data-validation-number-message="{{__('admin.the_phone_number_ must_not_have_charachters_or_symbol')}}"  >
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                    <select name="whatsapp_country_code" class="form-control select2">
                                                        @foreach($countries as $country)
                                                            <option value="{{ $country->key }}"
                                                                @if ($data['whatsapp_country_code'] == $country->key)
                                                                    selected
                                                                @endif >
                                                            {{ $country->key.'+' }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="account-name">is production </label>
                                            <div class="custom-control custom-switch custom-switch-success mr-2 mb-1">
                                                <input name="is_production" {{$data['is_production']  == '1' ? 'checked' : ''}}   type="checkbox" class="custom-control-input" id="customSwitch11">
                                                <label class="custom-control-label" for="customSwitch11">
                                                    <span class="switch-icon-left"><i class="feather icon-check"></i></span>
                                                    <span class="switch-icon-right"><i class="feather icon-check"></i></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                      <div class="row">

                                        <div class="imgMontg col-12 col-lg-4 col-md-6 text-center">
                                            <div class="dropBox">
                                                <div class="textCenter d-flex flex-column">
                                                    <div class="imagesUploadBlock">
                                                        <label class="uploadImg">
                                                            <span><i class="feather icon-image"></i></span>
                                                            <input type="file" accept="image/*" name="logo" class="imageUploader">
                                                        </label>
                                                        <div class="uploadedBlock">
                                                            <img src="{{$data['logo']}}">
                                                            <button class="close"><i class="feather icon-trash-2"></i></button>
                                                        </div>
                                                      </div>
                                                      <span>{{__('admin.logo_image')}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="imgMontg col-12 col-lg-4 col-md-6 text-center">
                                            <div class="dropBox">
                                                <div class="textCenter d-flex flex-column">
                                                    <div class="imagesUploadBlock">
                                                        <label class="uploadImg">
                                                            <span><i class="feather icon-image"></i></span>
                                                            <input type="file" accept="image/*" name="fav_icon" class="imageUploader">
                                                        </label>
                                                        <div class="uploadedBlock">
                                                            <img src="{{$data['fav_icon']}}">
                                                            <button class="close"><i class="feather icon-trash-2"></i></button>
                                                        </div>
                                                      </div>
                                                      <span>{{__('admin.fav_icon_image')}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="imgMontg col-12 col-lg-4 col-md-6 text-center">
                                            <div class="dropBox">
                                                <div class="textCenter d-flex flex-column">
                                                    <div class="imagesUploadBlock">
                                                        <label class="uploadImg">
                                                            <span><i class="feather icon-image"></i></span>
                                                            <input type="file" accept="image/*" name="login_background" class="imageUploader">
                                                        </label>
                                                        <div class="uploadedBlock">
                                                            <img src="{{$data['login_background']}}">
                                                            <button class="close"><i class="feather icon-trash-2"></i></button>
                                                        </div>
                                                      </div>
                                                      <span>{{__('admin.background_image')}}</span>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="imgMontg col-12 col-lg-4 col-md-6 text-center">
                                            <div class="dropBox">
                                                <div class="textCenter d-flex flex-column">
                                                    <div class="imagesUploadBlock">
                                                        <label class="uploadImg">
                                                            <span><i class="feather icon-image"></i></span>
                                                            <input type="file" accept="image/*" name="default_user" class="imageUploader">
                                                        </label>
                                                        <div class="uploadedBlock">
                                                            <img src="{{$data['default_user']}}">
                                                            <button class="close"><i class="feather icon-trash-2"></i></button>
                                                        </div>
                                                      </div>
                                                      <span>{{__('admin.virtual_user_image')}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="imgMontg col-12 col-lg-4 col-md-6 text-center">
                                            <div class="dropBox">
                                                <div class="textCenter d-flex flex-column">
                                                    <div class="imagesUploadBlock">
                                                        <label class="uploadImg">
                                                            <span><i class="feather icon-image"></i></span>
                                                            <input type="file" accept="image/*" name="profile_cover" class="imageUploader">
                                                        </label>
                                                        <div class="uploadedBlock">
                                                            <img src="{{$data['profile_cover']}}">
                                                            <button class="close"><i class="feather icon-trash-2"></i></button>
                                                        </div>
                                                      </div>
                                                      <span>{{__('admin.profile_cover')}}</span>
                                                </div>
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


                              <div role="tabpanel" class="tab-pane" id="account-vertical-language" aria-labelledby="account-pill-language" aria-expanded="false">
                                <form accept="{{route('admin.settings.update')}}" method="post" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <div class="row">

                                        <div class="col-12 col-md-12">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="account-name">{{__('admin.supported_languages')}}</label>
                                                    <select name="locales[]" class="form-control select2" multiple="">
                                                        @foreach (config('available-locales') as $key => $language)
                                                            <option value="{{ $key }}"
                                                                @if (in_array($key,json_decode($data['locales'])))
                                                                    selected
                                                                @endif >
                                                                {{ $language['native'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-12">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="account-name">{{__('admin.rtl_languages')}}</label>
                                                    <select name="rtl_locales[]" class="form-control select2" multiple="">
                                                        @foreach (config('available-locales') as $key => $language)
                                                            <option value="{{ $key }}"
                                                                    @if (in_array($key,json_decode($data['rtl_locales'])))
                                                                    selected
                                                                @endif>
                                                                {{ $language['native'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="account-name">{{__('admin.default_language')}}</label>
                                                    <select name="default_locale" class="form-control select2">
                                                        @foreach (config('available-locales') as $key => $language)
                                                            <option value="{{ $key }}"
                                                                    @if ($data['default_locale'] == $key)
                                                                    selected
                                                                @endif>
                                                                {{ $language['native'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
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

                              <div role="tabpanel" class="tab-pane" id="account-vertical-countries" aria-labelledby="account-pill-countries" aria-expanded="false">
                                <form accept="{{route('admin.settings.update')}}" method="post" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <div class="row">

                                        <div class="col-12 col-md-12">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="account-name">{{__('admin.supported_countries')}}</label>
                                                    <select name="countries[]" class="form-control select2" multiple="">
                                                        @foreach ($countries as $country)
                                                            <option value="{{ $country->id }}"
                                                                @if (in_array($country->id,json_decode($data['countries'])))
                                                                    selected
                                                                @endif >
                                                                {{ $country->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-12">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="account-name">{{__('admin.default_country')}}</label>
                                                    <select name="default_country" class="form-control select2">
                                                        @foreach ($countries as $country)
                                                            <option value="{{ $country->id }}"
                                                                    @if ($data['default_country'] == $country->id)
                                                                    selected
                                                                @endif>
                                                                {{ $country->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-12">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="account-name">{{__('admin.supported_currencies')}}</label>
                                                    <select name="currencies[]" class="form-control select2" multiple="">
                                                        @foreach ($countries as $country)
                                                            <option value="{{ $country->currency }}"
                                                                @if (in_array($country->currency,json_decode($data['currencies'])))
                                                                    selected
                                                                @endif >
                                                                {{ $country->currency }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-12">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="account-name">{{__('admin.default_currency')}}</label>
                                                    <select name="default_currency" class="form-control select2">
                                                        @foreach ($countries as $country)
                                                            <option value="{{ $country->currency }}"
                                                                    @if ($data['default_currency'] == $country->currency)
                                                                    selected
                                                                @endif>
                                                                {{ $country->currency }}
                                                            </option>
                                                        @endforeach
                                                    </select>
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
                                <form accept="{{route('admin.settings.update')}}" method="post" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <div class="row">

                                        <div class="col-12">
                                            <ul class="nav nav-tabs  mb-3">
                                                @foreach (languages() as $lang)
                                                    <li class="nav-item">
                                                        <a class="nav-link @if($loop->first) active @endif"  data-toggle="pill" href="#first_{{$lang}}" aria-expanded="true">{{  __('admin.data') }} {{ $lang }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div> 

                                        <div class="tab-content">
                                            @foreach (languages() as $lang)
                                                <div role="tabpanel" class="tab-pane fade @if($loop->first) show active @endif " id="first_{{$lang}}" aria-labelledby="first_{{$lang}}" aria-expanded="true">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="account-name">{{__('admin.conditions_and_conditions')}} {{ $lang  }}</label>
                                                                <textarea class="form-control" name="terms_{{ $lang }}" id="terms_{{ $lang }}_editor" cols="30" rows="10" placeholder="{{__('admin.conditions_and_conditions')}} {{ $lang }}">{{$data['terms_'.$lang]??''}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <div class="col-12 d-flex justify-content-center mt-3">
                                          <button type="submit" class="btn btn-primary mr-1 mb-1 submit_button">{{__('admin.saving_changes')}}</button>
                                          <a href="{{ url()->previous() }}" type="reset" class="btn btn-outline-warning mr-1 mb-1">{{__('admin.back')}}</a>
                                      </div>
                                    </div>
                                </form>
                              </div>

                              <div role="tabpanel" class="tab-pane" id="account-vertical-about" aria-labelledby="account-pill-about" aria-expanded="false">
                                <form accept="{{route('admin.settings.update')}}" method="post" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <div class="row">
                                        
                                        <div class="col-12">
                                            <ul class="nav nav-tabs  mb-3">
                                                @foreach (languages() as $lang)
                                                    <li class="nav-item">
                                                        <a class="nav-link @if($loop->first) active @endif"  data-toggle="pill" href="#about_{{$lang}}" aria-expanded="true">{{  __('admin.data') }} {{ $lang }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div> 

                                        <div class="tab-content">
                                            @foreach (languages() as $lang)
                                                <div role="tabpanel" class="tab-pane fade @if($loop->first) show active @endif " id="about_{{$lang}}" aria-labelledby="first_{{$lang}}" aria-expanded="true">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="account-name">{{__('admin.about_the_application')}} {{ $lang  }}</label>
                                                                <textarea class="form-control" name="about_{{ $lang }}" id="about_{{ $lang }}_editor" cols="30" rows="10" placeholder="{{__('admin.about_the_application')}} {{ $lang }}">{{$data['about_'.$lang]??''}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <div class="col-12 d-flex justify-content-center mt-3">
                                          <button type="submit" class="btn btn-primary mr-1 mb-1 submit_button">{{__('admin.saving_changes')}}</button>
                                          <a href="{{ url()->previous() }}" type="reset" class="btn btn-outline-warning mr-1 mb-1">{{__('admin.back')}}</a>
                                      </div>
                                    </div>
                                </form>
                              </div>

                              <div role="tabpanel" class="tab-pane" id="account-vertical-privacy" aria-labelledby="account-pill-privacy" aria-expanded="false">
                                <form accept="{{route('admin.settings.update')}}" method="post" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <div class="row">

                                        <div class="col-12">
                                            <ul class="nav nav-tabs  mb-3">
                                                @foreach (languages() as $lang)
                                                    <li class="nav-item">
                                                        <a class="nav-link @if($loop->first) active @endif"  data-toggle="pill" href="#privacy_{{$lang}}" aria-expanded="true">{{  __('admin.data') }} {{ $lang }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div> 

                                        <div class="tab-content">
                                            @foreach (languages() as $lang)
                                                <div role="tabpanel" class="tab-pane fade @if($loop->first) show active @endif " id="privacy_{{$lang}}" aria-labelledby="first_{{$lang}}" aria-expanded="true">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="account-name">{{__('admin.privacy_policy')}} {{ $lang  }}</label>
                                                                <textarea class="form-control" name="privacy_{{ $lang }}" id="privacy_{{ $lang }}_editor" cols="30" rows="10" placeholder="{{__('admin.privacy_policy')}} {{ $lang }}">{{$data['privacy_'.$lang]??''}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <div class="col-12 d-flex justify-content-center mt-3">
                                          <button type="submit" class="btn btn-primary mr-1 mb-1 submit_button">{{__('admin.saving_changes')}}</button>
                                          <a href="{{ url()->previous() }}" type="reset" class="btn btn-outline-warning mr-1 mb-1">{{__('admin.back')}}</a>
                                      </div>
                                    </div>
                                </form>
                              </div>

                              <div role="tabpanel" class="tab-pane" id="account-vertical-smtp" aria-labelledby="account-pill-smtp" aria-expanded="false">
                                <form accept="{{route('admin.settings.update')}}" method="post" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <div class="row">

                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="account-name">{{__('admin.user_name')}}</label>
                                                    <input type="text" class="form-control" name="smtp_user_name" id="account-name" placeholder="{{__('admin.user_name')}}" value="{{$data['smtp_user_name']}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="account-name">{{__('admin.password')}}</label>
                                                    <input type="password" class="form-control" name="smtp_password" id="account-name" placeholder="{{__('admin.password')}}" value="{{$data['smtp_password']}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="account-name">{{__('admin.email_Sender')}}</label>
                                                    <input type="text" class="form-control" name="smtp_mail_from" id="account-name" placeholder="{{__('admin.email_Sender')}}" value="{{$data['smtp_mail_from']}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="account-name">{{__('admin.the_sender_name')}}</label>
                                                    <input type="text" class="form-control" name="smtp_sender_name" id="account-name" placeholder="{{__('admin.the_sender_name')}}" value="{{$data['smtp_sender_name']}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="account-name">{{__('admin.the_nouns_al')}}</label>
                                                    <input type="text" class="form-control" name="smtp_host" id="account-name" placeholder="{{__('admin.the_nouns_al')}}" value="{{$data['smtp_host']}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="account-name">{{__('admin.encryption_type')}}</label>
                                                    <input type="text" class="form-control" name="smtp_encryption" id="account-name" placeholder="{{__('admin.encryption_type')}}" value="{{$data['smtp_encryption']}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="account-name">{{__('admin.Port_number')}}</label>
                                                    <input type="number" class="form-control" name="smtp_port" id="account-name" placeholder="{{__('admin.Port_number')}}" value="{{$data['smtp_port']}}">
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

                              <div role="tabpanel" class="tab-pane" id="account-vertical-notifications" aria-labelledby="account-pill-notifications" aria-expanded="false">
                                <form accept="{{route('admin.settings.update')}}" method="post" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <div class="row">

                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="account-name">{{__('admin.server_key')}}</label>
                                                    <input type="text" class="form-control" name="firebase_key" id="account-name" placeholder="{{__('admin.server_key')}}" value="{{$data['firebase_key']}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="account-name">{{__('admin.sender_identification')}}</label>
                                                    <input type="text" class="form-control" name="firebase_sender_id" id="account-name" placeholder="{{__('admin.sender_identification')}}" value="{{$data['firebase_sender_id']}}">
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

                              <div role="tabpanel" class="tab-pane" id="account-vertical-api" aria-labelledby="account-pill-api" aria-expanded="false">
                                <form accept="{{route('admin.settings.update')}}" method="post" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <div class="row">

                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="account-name">{{__('admin.live_chat')}}</label>
                                                    <input type="text" class="form-control" name="live_chat" id="account-name" placeholder="{{__('admin.live_chat')}}" value="{{$data['live_chat']}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="account-name">{{__('admin.google_analytics')}}</label>
                                                    <input type="text" class="form-control" name="google_analytics" id="account-name" placeholder="{{__('admin.google_analytics')}}" value="{{$data['google_analytics']}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label for="account-name">{{__('admin.google_places')}}</label>
                                                    <input type="text" class="form-control" name="google_places" id="account-name" placeholder="{{__('admin.google_places')}}" value="{{$data['google_places']}}">
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
    <script src="https://cdn.ckeditor.com/4.16.2/full-all/ckeditor.js"></script>
    <script>
        @foreach(languages() as $lang)
            CKEDITOR.replace( 'about_{{ $lang }}_editor' );
            CKEDITOR.replace( 'terms_{{ $lang }}_editor' );
            CKEDITOR.replace( 'privacy_{{ $lang }}_editor' );
        @endforeach

    </script>
  {{-- show selected image script --}}
    @include('admin.shared.addImage')
  {{-- show selected image script --}}
@endsection

