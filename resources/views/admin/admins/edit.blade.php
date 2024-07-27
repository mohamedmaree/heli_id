@extends('admin.layout.master')
{{-- extra css files --}}
@section('css')
  <link rel="stylesheet" type="text/css"
        href="{{ asset('admin/app-assets/css-rtl/plugins/forms/validation/form-validation.css') }}">
  <link rel="stylesheet" type="text/css"
        href="{{ asset('admin/app-assets/vendors/css/extensions/sweetalert2.min.css') }}">
@endsection
{{-- extra css files --}}

@section('content')
  <!-- // Basic multiple Column Form section start -->
  <form method="POST" action="{{ route('admin.admins.update', ['id' => $admin->id]) }}" class="store form-horizontal" novalidate>

  <section id="multiple-column-form">
    <div class="row ">
      <div class="col-md-3 ">
        <div class="col-12 card card-body">
          <div class="imgMontg col-12 text-center">
            <div class="dropBox">
              <div class="textCenter">
                <div class="imagesUploadBlock">
                  <label class="uploadImg">
                    <span><i class="feather icon-image"></i></span>
                    <input type="file" accept="image/*" name="avatar"
                           class="imageUploader">
                  </label>
                  <div class="uploadedBlock">
                    <img src="{{ $admin->avatar }}">
                    <button class="close"><i
                         class="la la-times"></i></button>
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
            <h4 class="card-title">{{ __('admin.edit') }}</h4>
          </div> --}}
          <div class="card-content">
            <div class="card-body">
                @csrf
                @method('PUT')
                <div class="form-body">
                  <div class="row">

                    <div class="col-md-6 col-12">
                      <div class="form-group">
                        <label for="first-name-column">{{ __('admin.name') }}</label>
                        <div class="controls">
                          <input type="text" name="name" value="{{ $admin->name }}"
                                 class="form-control"
                                 placeholder="{{ __('admin.enter_the_name') }}" required
                                 data-validation-required-message="{{ __('admin.this_field_is_required')  }}">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-12">
                      <div class="form-group">
                          <label for="first-name-column">{{__('admin.phone_number')}}</label>
                          <div class="row">
                              <div class="col-md-9 col-12">
                                  <div class="controls">
                                      <input type="number" name="phone" value="{{$admin->phone}}"  class="form-control" placeholder="{{__('admin.enter_phone_number')}}" required data-validation-required-message="{{__('admin.this_field_is_required')}}" data-validation-number-message="{{__('admin.the_phone_number_ must_not_have_charachters_or_symbol')}}"  >
                                  </div>
                              </div>
                              <div class="col-md-3 col-12">
                                  <select name="country_code" class="form-control select2">
                                      @foreach($countries as $country)
                                          <option value="{{ $country->key }}"
                                              @if ($admin->country_code == $country->key)
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
                        <label
                               for="first-name-column">{{ __('admin.email') }}</label>
                        <div class="controls">
                          <input type="email" name="email" value="{{ $admin->email }}"
                                 class="form-control"
                                 placeholder="{{ __('admin.enter_the_email')  }}"
                                 required
                                 data-validation-required-message="{{ __('admin.this_field_is_required')  }}"
                                 data-validation-email-message="{{__('admin.email_formula_is_incorrect')}}">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-12">
                      <div class="form-group">
                        <label
                               for="first-name-column">{{  __('admin.password') }}</label>
                        <div class="controls">
                          <input type="password" name="password" class="form-control">
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12 col-12">
                      <div class="form-group">
                        <label for="first-name-column">{{  __('admin.Validity') }}</label>
                        <div class="controls">
                          <select name="role_id" class="select2 form-control" required
                                  data-validation-required-message="{{ __('admin.this_field_is_required')  }}">
                            <option value>{{  __('admin.Select_the_validity') }}</option>
                            @foreach ($roles as $role)
                              <option {{ $role->id == $admin->role_id ? 'selected' : '' }}
                                      value="{{ $role->id }}">{{ $role->name }}
                              </option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12 col-12">
                      <div class="form-group">
                          <label for="first-name-column">{{__('admin.ban_status')}} :</label>
                          {{-- <div class="controls"> --}}
                              <label class="switch">
                                  <input name="is_blocked" type="checkbox" value="1" {{$admin->is_blocked == 1 ? 'checked' : ''}}/>
                                  <span class="slider round"></span>
                              </label>
                          {{-- </div> --}}
                      </div>
                  </div>
                  
                    <div class="col-12 d-flex justify-content-center mt-3">
                      <button type="submit"
                              class="btn btn-primary mr-1 mb-1 submit_button">{{ __('admin.update') }}</button>
                      <a href="{{ url()->previous() }}" type="reset"
                         class="btn btn-outline-warning mr-1 mb-1">{{__('admin.back') }}</a>
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
  <script
          src="{{ asset('admin/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js') }}">
  </script>
  <script
          src="{{ asset('admin/app-assets/js/scripts/forms/validation/form-validation.js') }}">
  </script>
  <script
          src="{{ asset('admin/app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}">
  </script>
  <script src="{{ asset('admin/app-assets/js/scripts/extensions/sweet-alerts.js') }}">
  </script>

  {{-- show selected image script --}}
  @include('admin.shared.addImage')
  {{-- show selected image script --}}

  {{-- submit edit form script --}}
  @include('admin.shared.submitEditForm')
  {{-- submit edit form script --}}

@endsection
