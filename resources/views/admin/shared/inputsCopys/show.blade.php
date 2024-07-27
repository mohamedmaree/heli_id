@extends('admin.layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/multipleFiles.css') }}">

    @foreach ($inputs as $input)
        @if ($input['input'] == 'multiple_select')
            <link rel="stylesheet" type="text/css"
                href="{{ asset('admin/app-assets/vendors/css/forms/select/select2.min.css') }}">
        @break
    @endif
@endforeach
@endsection

@section('content')
<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                {{-- <div class="card-header">
                    <h4 class="card-title">{{ __('admin.view') . ' ' . __('admin.copy') }}</h4>
                </div> --}}
                <div class="card-content">
                    <div class="card-body">
                        <form class="show form-horizontal">

                            <div class="form-body">
                                <div class="row">

                                    @include('admin.shared.inputs.showInputs')

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

@foreach ($inputs as $input)
    @if ($input['input'] == 'multiple_select')
        {{-- if find one multiple select call scripts --}}
        <script src="{{ asset('admin/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
        <script src="{{ asset('admin/app-assets/js/scripts/forms/select/form-select2.js') }}"></script>


        {{-- if find one multiple loop at inputs and set script for every multiple select --}}
        @foreach ($inputs as $name => $select)
            @if ($select['input'] == 'multiple_select')
                <script>
                    $(document).ready(function() {
                        $('.{{ $name }}-multiple').select2({
                            placeholder: '{{ isset($select['placeholder']) ? $select['placeholder'] : __('admin.choose'). ' ' . $select['text'] }}',
                            dir: "{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}",
                        });
                    });
                </script>
            @endif
        @endforeach

        {{-- stop if find one multiple select --}}
    @break
@endif
@endforeach

{{-- map scripts --}}
@foreach ($inputs as $input)
@if ($input['input'] == 'map')
    @include('admin.shared.inputs.map', [
        'lat' => $item['lat'],
        'lng' => $item['lng'],
        'draggable' => false,
    ])
@break
@endif
@endforeach


{{-- if the input have ckeditor --}}
@foreach ($inputs as $input)
@if (isset($input['ckeditor']) && $input['ckeditor'] === true)
{{-- if find one ckeditor call scripts --}}
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

{{-- if find one ckeditor loop at inputs and set script for every ckeditor --}}
@foreach ($inputs as $key => $editor)
    @if (isset($editor['ckeditor']) && $input['ckeditor'] === true)
        <script>
            CKEDITOR.replace('{{ $key }}');
            CKEDITOR.replace('{{ $key . '[ar]' }}');
            CKEDITOR.replace('{{ $key . '[en]' }}');
        </script>
    @endif
@endforeach

{{-- stop if find one ckeditr --}}
@break
@endif
@endforeach
@endsection
