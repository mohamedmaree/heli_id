@extends('admin.layout.master')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
@endsection
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
                                        <input type="file" accept="image/*" name="image"
                                            class="imageUploader">
                                    </label>
                                    <div class="uploadedBlock">
                                        <img src="{{$category->image}}">
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
                        <h4 class="card-title">{{__('admin.show')}}</h4>
                    </div> --}}
                    <div class="card-content">
                        <div class="card-body">
                                <div class="form-body">
                                    <div class="form-body">
                                        <div class="row">
                                            
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



                                                <div class="tab-content">
                                                    @foreach (languages() as $lang)
                                                        <div role="tabpanel" class="tab-pane fade @if($loop->first) show active @endif " id="first_{{$lang}}" aria-labelledby="first_{{$lang}}" aria-expanded="true">
                                                            <div class="col-md-12 col-12">
                                                                <div class="form-group">
                                                                    <label for="first-name-column">{{__('admin.name')}} {{ $lang }}</label>
                                                                    <div class="controls">
                                                                        <input type="text" value="{{$category->getTranslations('name')[$lang]??''}}" name="name[{{$lang}}]" class="form-control" placeholder="{{__('admin.write') . __('admin.name')}} {{ $lang }}" required data-validation-required-message="{{__('admin.this_field_is_required')}}" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>

                                                <div class="col-md-12 col-12">
                                                    <div class="form-group">
                                                        <label for="first-name-column">{{__('admin.select_main_section')}}</label>
                                                        <input type="hidden" name="parent_id" id="root_category" value="{{ $category->parent_id }}">
                                                        <div class="col-md-12 col-12" id="category_level">
                                                            <div id="jstree">
                                                                @include('admin.categories.edit_tree',['mainCategories' => $categories])
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            <div class="col-12 d-flex justify-content-center mt-3">
                                                <a href="{{ url()->previous() }}" type="reset"
                                                   class="btn btn-outline-warning mr-1 mb-1">{{__('admin.back')}}</a>
                                            </div>

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
<script type="text/javascript">
    $(function () {

        $('#jstree').jstree({
            checkbox : {
                // keep_selected_style : true,
                // two_state : false,
                three_state: false,
                // whole_node :false,
                // "cascade":"down",
            },
            plugins : [ "checkbox" ],
            core: {
                multiple: false,
            }
        });

        $('#jstree').on("changed.jstree", function (e, data) {
            $('#root_category').val(data.selected);
        });

    });
</script>
@endsection