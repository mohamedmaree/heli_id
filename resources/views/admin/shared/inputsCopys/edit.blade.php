@extends('admin.layout.master')
{{-- extra css files --}}
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css-rtl/plugins/forms/validation/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/extensions/sweetalert2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/multipleFiles.css')}}">

    @foreach ($inputs as $input)
        @if($input['input'] == 'multiple_select')
            <link rel="stylesheet" type="text/css"
                href="{{asset('admin/app-assets/vendors/css/forms/select/select2.min.css')}}">
            @break
        @endif
    @endforeach

@endsection
{{-- extra css files --}}

@section('content')
<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                {{-- <div class="card-header">
                    <h4 class="card-title">{{__('admin.update') . ' ' . __('admin.copy')}}</h4>
                </div> --}}
                <div class="card-content">
                    <div class="card-body">
                        <form  method="POST" action="{{route('admin.copys.update' , ['id' => $item->id])}}" class="store form-horizontal" novalidate>
                            @csrf
                            @method('PUT')
              


                            <div class="form-body">
                                <div class="row">


                                    @include('admin.shared.inputs.editInputs')


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


    @foreach ($inputs as $input)
        @if($input['input'] == 'multiple_select')
            {{--  if find one multiple select call scripts  --}}
            <script src="{{asset('admin/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
            <script src="{{asset('admin/app-assets/js/scripts/forms/select/form-select2.js')}}"></script>


            {{--  if find one multiple loop at inputs and set script for every multiple select  --}}
            @foreach ($inputs as $name =>  $select)
                @if($select['input'] == 'multiple_select')
                    <script>
                        $(document).ready(function() {
                            $('.{{$name}}-multiple').select2({
                                placeholder : '{{isset($select['placeholder']) ? $select['placeholder'] : __('admin.choose') . ' ' . $select['text']}}',
                                dir: "{{app()->getLocale() == 'ar' ? 'rtl' : 'ltr'}}",
                            });
                        });
                    </script>
                @endif
            @endforeach
            
            {{--  stop if find one multiple select  --}}
            @break

        @endif
    @endforeach

    {{--  if the input have ckeditor  --}}
    @foreach ($inputs as $input)
        @if(isset($input['ckeditor']) && $input['ckeditor'] === true)
            {{--  if find one ckeditor call scripts  --}}
            <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

            {{--  if find one ckeditor loop at inputs and set script for every ckeditor  --}}
            @foreach ($inputs as $key => $editor)
                @if(isset($editor['ckeditor']) && $input['ckeditor'] === true)
                <script>
                    CKEDITOR.replace('{{$key}}');
                    CKEDITOR.replace('{{$key . '[ar]' }}');
                    CKEDITOR.replace('{{$key . '[en]' }}');
                </script>
                @endif
            @endforeach
            
            {{--  stop if find one ckeditr  --}}
            @break
        @endif
    @endforeach

    {{--  multible files  --}}
    @foreach ($inputs as $input)
        @if($input['input'] == 'files')
            @include('admin.shared.inputs.filesUploader')
            @include('admin.shared.inputs.deleteFile')
            @break
        @endif
    @endforeach

    {{--  map scripts  --}}
    @foreach ($inputs as $input)
        @if($input['input'] == 'map')
            @include('admin.shared.inputs.map' ,['lat' => $item['lat'] ,'lng' => $item['lng'] ,'draggable' => true])
            @break
        @endif
    @endforeach
    
@endsection