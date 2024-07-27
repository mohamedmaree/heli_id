@extends('admin.layout.master')
{{-- extra css files --}}
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css-rtl/plugins/forms/validation/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/extensions/sweetalert2.min.css')}}">
    <style>
        .uploadedBlock{
            margin: 5px !important;
        }
        .clickAdd{
            display: inline-block;
            width: 140px;
            height: 140px;
            line-height: 110px;
            text-align: center;
            position: relative;
            border-radius: 15px;
            margin: 5px;
            border: 3px dotted #e4e4e4;
            width: 140px;
            height: 140px;
            margin: 20px;
            border-radius: 28px;
        }        
        .delete-image{
            position: absolute;
            z-index: 9999999;
            left: 36%;
            top: 42%;
            background: bottom;
            font-size: 26px;
            border: aquamarine;
        }
        </style>
@endsection
{{-- extra css files --}}

@section('content')
<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                {{-- <div class="card-header">
                    <h4 class="card-title">{{__('admin.update') . ' ' . __('admin.portfolio')}}</h4>
                </div> --}}
                <div class="card-content">
                    <div class="card-body">
                        <form  method="POST" action="{{route('admin.portfolios.update' , ['id' => $portfolio->id])}}" class="store form-horizontal" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="form-body">
                                <div class="row">
                                    
                                    {{-- to create languages tabs uncomment that --}}
                                    <div class="col-12">
                                        <div class="col-12">
                                            <ul class="nav nav-tabs  mb-3">
                                                    @foreach (languages() as $lang)
                                                        <li class="nav-item">
                                                            <a class="nav-link @if($loop->first) active @endif"  data-toggle="pill" href="#first_{{$lang}}" aria-expanded="true">{{  __('admin.data') }} {{ $lang }}</a>
                                                        </li>
                                                    @endforeach
                                            </ul>
                                        </div> 

                                        <div class="imgMontg col-12 text-center">

                                            <div class="dropBox d-flex">
                                                @foreach ($portfolio->images as $image)
                                                    <div class="textCenter">
                                                        <div class="imagesUploadBlock">
                                                            <label class="uploadImg">
                                                                <span><i class="feather icon-image"></i></span>
                                                                <input type="file" accept="image/*" name="images[]" class="imageUploader">
                                                            </label>
                                                            <div class="uploadedBlock">
                                                                <img src="{{$image->image}}" class="im">
                                                                <button class="delete-image" data-id="{{$image->id}}" ><i class="feather icon-trash text-danger"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
    
                                            <button class="clickAdd">
                                                <span>
                                                    <i class="feather icon-plus"></i>
                                                </span>
                                            </button>
                                            
                                        </div>

                                        <div class="tab-content">
                                                @foreach (languages() as $lang)
                                                    <div role="tabpanel" class="tab-pane fade @if($loop->first) show active @endif " id="first_{{$lang}}" aria-labelledby="first_{{$lang}}" aria-expanded="true">
                                                        <div class="col-md-12 col-12">
                                                            <div class="form-group">
                                                                <label for="first-name-column">{{__('admin.client')}} {{ $lang }}</label>
                                                                <div class="controls">
                                                                    <input type="text" value="{{$portfolio->getTranslations('client')[$lang]??''}}" name="client[{{$lang}}]" class="form-control" placeholder="{{__('admin.write') . __('admin.client')}} {{ $lang }}" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-name">{{__('admin.description')}} {{ $lang }}</label>
                                                                    <textarea class="form-control" name="description[{{$lang}}]" id="" cols="30" rows="10"  placeholder="{{__('admin.write') . __('admin.description')}} {{ $lang }}">{{$portfolio->getTranslations('description')[$lang]??''}}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                @endforeach
                                            </div>
                                        
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">{{__('admin.date')}}</label>
                                                <div class="controls">
                                                    <input type="date" name="date" value="{{$portfolio->date}}" class="form-control" placeholder="{{__('admin.date')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">{{__('admin.url')}}</label>
                                                <div class="controls">
                                                    <input type="url" name="url" value="{{$portfolio->url}}" class="form-control" placeholder="{{__('admin.url')}}" >
                                                </div>
                                            </div>
                                        </div>
                               
                                       
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">{{__('admin.portfoliocategories')}}</label>
                                                <div class="controls">
                                                    <select name="portfolio_category_id" class="select2 form-control" required data-validation-required-message="{{__('admin.this_field_is_required')}}" >
                                                        <option value>{{__('admin.portfoliocategories')}}</option>
                                                        @foreach ($categories as $category)
                                                            <option {{$category->id == $portfolio->portfolio_category_id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    {{--  to create languages tabs uncomment that --}}
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
    <script>
        $(document).on('click', '.delete-image', function(e) {
            e.preventDefault();
            var image_id = $(this).data('id');
            var url = '{{ route('admin.portfolios.delete.image') }}';
            if (confirm('Are you sure to delete this image')) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: url,
                    method: 'POST',
                    data: {
                        image_id: image_id
                    },
                    dataType: 'json',
                    success: (msg) => {
                        if (msg.msg == 'success') {
                            $(this).parents('.textCenter').remove()
                            Swal.fire({
                                position: 'top-start',
                                type: 'success',
                                title: '{{ __('تم حذف المحدد بنجاح') }}',
                                showConfirmButton: false,
                                timer: 1500,
                                confirmButtonClass: 'btn btn-primary',
                                buttonsStyling: false,

                            })
                        }
                    }
                });
            }
        })    
</script>  
@endsection