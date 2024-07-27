@extends('admin.layout.master')
{{-- extra css files --}}
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css-rtl/plugins/forms/validation/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/extensions/sweetalert2.min.css')}}">
@endsection
{{-- extra css files --}}

@section('content')
<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                {{-- <div class="card-header">
                    <h4 class="card-title">{{__('admin.edit')}}</h4>
                </div> --}}
                <div class="card-content">
                    <div class="card-body">
                        <form  method="POST" action="{{route('admin.seos.update' , ['id' => $seo->id])}}" class="store form-horizontal" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="form-body">
                                <div class="row">
                                    
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">{{__('admin.key')}}</label>
                                            <div class="controls">
                                                <input type="text" value="{{$seo->key}}" name="key" class="form-control" placeholder="{{__('admin.write_key')}}" required data-validation-required-message="{{__('admin.this_field_is_required')}}" >
                                            </div>
                                        </div>
                                    </div>
                                    @foreach (languages() as $lang)
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">{{__('site.meta_title_'.$lang) }}</label>
                                                <div class="controls">
                                                    <textarea name="meta_title[{{$lang}}]" class="form-control" placeholder="{{__('site.write') . __('site.meta_title_'.$lang)}}" required data-validation-required-message="{{__('admin.this_field_is_required')}}" cols="30" rows="10">{{$seo->getTranslations('meta_title')[$lang]}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    @foreach (languages() as $lang)
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">{{__('site.meta_description_'.$lang) }}</label>
                                                <div class="controls">
                                                    <textarea name="meta_description[{{$lang}}]" class="form-control" placeholder="{{__('site.write') . __('site.meta_description_'.$lang)}}" required data-validation-required-message="{{__('admin.this_field_is_required')}}" cols="30" rows="10">{{$seo->getTranslations('meta_description')[$lang]}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    @foreach (languages() as $lang)
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">{{__('site.meta_keywords_'.$lang) }}</label>
                                                <div class="controls">
                                                    <textarea name="meta_keywords[{{$lang}}]" class="form-control" placeholder="{{__('site.write') . __('site.meta_keywords_'.$lang)}}" required data-validation-required-message="{{__('admin.this_field_is_required')}}" cols="30" rows="10">{{$seo->getTranslations('meta_keywords')[$lang]}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach


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
    
   
    {{-- submit edit form script --}}
    @include('admin.shared.submitEditForm')
    {{-- submit edit form script --}}
    
@endsection