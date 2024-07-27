@extends('admin.layout.master')
{{-- extra css files --}}
@section('css')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin/app-assets/css-rtl/plugins/forms/validation/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/extensions/sweetalert2.min.css') }}">
@endsection
{{-- extra css files --}}

@section('content')
    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="city match-height">
            <div class="col-12">
                <div class="card">
                    {{-- <div class="card-header">
                        <h4 class="card-title">{{ __('admin.edit') }}</h4>
                    </div> --}}
                    <div class="card-content">
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.cities.update', ['id' => $city->id]) }}"
                                class="store form-horizontal" novalidate>
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="city">
                                        <div class="row">
                                            
                                            <div class="col-12">
                                                <div class="col-12">
                                                    <ul class="nav nav-tabs mb-3">
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
                                                            <div class="col-md-12 col-12">
                                                                <div class="form-group">
                                                                    <label for="first-name-column">{{__('admin.name')}} {{ $lang }}</label>
                                                                    <div class="controls">
                                                                        <input type="text" value="{{$city->getTranslations('name')[$lang]??''}}" name="name[{{$lang}}]" class="form-control" placeholder="{{__('admin.write') . __('admin.name')}} {{ $lang }}" required data-validation-required-message="{{__('admin.this_field_is_required')}}" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>

                                                <div class="col-md-12 col-12">
                                                    <div class="form-group">
                                                        <label for="first-name-column">{{ __('admin.country') }}</label>
                                                        <div class="controls">
                                                            <select name="country_id" id="country_id" class="select2 form-control" required
                                                                data-validation-required-message="{{ __('admin.this_field_is_required') }}">
                                                                <option value>{{ __('admin.choose_the_country') }}</option>
                                                                @foreach ($countries as $country)
                                                                    <option
                                                                        {{ $country->id == $city->country_id ? 'selected' : '' }}
                                                                        value="{{ $country->id }}">{{ $country->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 col-12">
                                                    <div class="form-group">
                                                        <label for="first-name-column">{{ __('admin.region') }}</label>
                                                        <div class="controls">
                                                            <select name="region_id" id="region_id" class="select2 form-control" required
                                                                data-validation-required-message="{{ __('admin.this_field_is_required') }}">
                                                                <option value>{{ __('admin.choose_the_region') }}</option>
                                                                @foreach ($regions as $region)
                                                                    <option
                                                                        {{ $region->id == $city->region_id ? 'selected' : '' }}
                                                                        value="{{ $region->id }}">{{ $region->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-12 d-flex justify-content-center mt-3">
                                            <button type="submit"
                                                class="btn btn-primary mr-1 mb-1 submit_button">{{ __('admin.update') }}</button>
                                            <a href="{{ url()->previous() }}" type="reset"
                                                class="btn btn-outline-warning mr-1 mb-1">{{ __('admin.back') }}</a>
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
    <script src="{{ asset('admin/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js') }}"></script>
    <script src="{{ asset('admin/app-assets/js/scripts/forms/validation/form-validation.js') }}"></script>
    <script src="{{ asset('admin/app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('admin/app-assets/js/scripts/extensions/sweet-alerts.js') }}"></script>

    {{-- show selected image script --}}
    @include('admin.shared.addImage')
    {{-- show selected image script --}}

    {{-- submit edit form script --}}
    @include('admin.shared.submitEditForm')
    {{-- submit edit form script --}}
    <script>
        $('#country_id').on('change', function(e) { //any select change on the dropdown with id country trigger this code
        e.preventDefault();
        var country_id = $('#country_id').val();
        $.get("<?= route('admin.cities.get-country-regions') ?>", {
            country_id: country_id,
        }, function(data) {
            console.log(data);
            var html = '<option>{{__('admin.region')}}</option>';
            var len = data.length;
            for (var i = 0; i < len; i++) {
                html += '<option value="' + data[i].id + '" >' +data[i].name.{{ lang() }}+'</option>';
            }
            $('#region_id').html("");
            $('#region_id').append(html);
        });
    });
</script> 
@endsection
