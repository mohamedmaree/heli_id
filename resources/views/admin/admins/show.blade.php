@extends('admin.layout.master')

@section('content')
<form class="store form-horizontal">

  <!-- // Basic multiple Column Form section start -->
  <section id="multiple-column-form">
    <div class="row">
      <div class="col-md-3">
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
            <h4 class="card-title">{{ __('admin.show') }}</h4>
          </div> --}}
          <div class="card-content">
            <div class="card-body">
                <div class="form-body">
                  <div class="row">


                    <div class="col-md-6 col-12">
                      <div class="form-group">
                        <label for="first-name-column">{{ __('admin.name') }}</label>
                        <div class="controls">
                          <input type="text" name="name" value="{{ $admin->name }}"
                                 class="form-control"
                                 placeholder="{{  __('admin.write_the_name') }}" required
                                 data-validation-required-message="{{ __('admin.this_field_is_required') }}">
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
                                 placeholder="{{ __('admin.enter_the_email') }}"
                                 required
                                 data-validation-required-message="{{  __('admin.this_field_is_required') }}">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-12">
                      <div class="form-group">
                        <label for="first-name-column">{{ __('admin.password') }}</label>
                        <div class="controls">
                          <input type="password" name="password" class="form-control">
                        </div>
                      </div>
                    </div>

                  
                    <div class="col-md-12 col-12">
                      <div class="form-group">
                        <label for="first-name-column">{{ __('admin.Validity') }}</label>
                        <div class="controls">
                          <select name="role_id" class="select2 form-control" required
                                  data-validation-required-message="{{  __('admin.this_field_is_required') }}">
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
                      <a href="{{ url()->previous() }}" type="reset"
                         class="btn btn-outline-warning mr-1 mb-1">{{ __('admin.back') }}</a>
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
  <script>
    $('.store input').attr('disabled', true)
    $('.store textarea').attr('disabled', true)
    $('.store select').attr('disabled', true)
  </script>
@endsection
