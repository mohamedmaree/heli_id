@extends('admin.layout.master')
@section('css')
<link rel="stylesheet" type="text/css"
    href="{{asset('admin/app-assets/css-rtl/plugins/forms/validation/form-validation.css')}}">

<style>
    .permissionCard {
        border: 0;
        margin-bottom: 13px;
    }

    .role-title {
        background: #5d54d4;
        padding: 12px;
        border-radius: 7px;
        /* margin-bottom: 10px; */
    }

    .list-unstyled {
        padding: 10px;
        height: 300px;
        /* scroll-behavior: smooth; */
        overflow: auto;
    }

    .selectP {
        margin-right: 10px;
        margin-top: 11px;
    }

    .title_lable {
        color: #4762dd;
    }
</style>
@endsection
@section('content')
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                {{-- <div class="card-header">
                    <h4 class="card-title">{{__('admin.add')}}</h4>
                </div> --}}
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{route('admin.roles.store')}}" method="post" novalidate>
                            @csrf
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

                                    <div class="container mt-2">
                                        <div style="display: flex; flex-direction: row-reverse; align-items: center">
                                            <p class="selectP">{{__('admin.select_all')}}</p>
                                            <input type="checkbox" id="checkedAll">
                                        </div>
                                    </div>
                                    <div class="tab-content">
                                        @foreach (languages() as $lang)
                                            <div role="tabpanel" class="tab-pane fade @if($loop->first) show active @endif " id="first_{{$lang}}" aria-labelledby="first_{{$lang}}" aria-expanded="true">
                                                <div class="col-md-12 col-12">
                                                    <div class="form-group">
                                                        <label for="first-name-column">{{__('admin.name')}} {{ $lang }}</label>
                                                        <div class="controls">
                                                            <input type="text" name="name[{{$lang}}]" class="form-control" placeholder="{{__('admin.write') . __('admin.name')}} {{ $lang }}" required data-validation-required-message="{{__('admin.this_field_is_required')}}" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="container mt-2">
                                        <div class="row">
                                            {!! $html !!}
                                        </div>
                                    </div>

                                </div>
                                    <div class="col-12 d-flex justify-content-center mt-3">
                                        <button type="submit"
                                            class="btn btn-primary mr-1 mb-1 submit_button">{{__('admin.add')}}</button>
                                        <a href="{{ url()->previous() }}" type="reset"
                                            class="btn btn-outline-warning mr-1 mb-1">{{__('admin.back')}}</a>
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
<script>
    $(function () {
            // $('.roles-parent').change(function () {
            //     var childClass = '.' + $(this).attr('id');
            //     if (this.checked) {
            //         $(childClass).prop("checked", true);
            //     } else {
            //         $(childClass).prop("checked", false);
            //     }
            // });

            $('.roles-parent').change(function (e) {
                var id =  $(this).attr('id');
                if (!this.checked) {
                    var count = 0 
                    $("."+id).each(function() {
                        if (this.checked) {
                            count = count + 1 
                        }
                    });

                    if (count > 0 ) {
                        $('#'+id).prop('checked' , true)
                    }else{
                        $('#'+id).prop('checked' , false)
                    }
                }
            });
            $('.checkChilds').change(function () {
                var childClass =  $(this).data('parent');
                if (this.checked) {
                    $('.' +childClass).prop("checked", true);
                    $('#' +childClass).prop("checked", true);
                } else {
                    $('.' +childClass).prop("checked", false);
                    $('#' +childClass).prop("checked", false);
                }
            });

            $('.childs').change(function () {
                var parent =  $(this).data('parent');
                if (this.checked) {
                    $('#' +parent).prop("checked", true);
                    var count = 0 
                    $("."+parent).each(function() {
                        if (! this.checked) {
                            count = count + 1 
                        }
                    });
                    if (count > 0 ) {
                        $('.checkChilds_'+parent).prop('checked' , false)
                    }else{
                        $('.checkChilds_'+parent).prop('checked' , true)
                    }
                }else{
                    $('.checkChilds_'+parent).prop('checked' , false)
                }
            });
        });


        $("#checkedAll").change(function () {
            if (this.checked) {
                $("input[type=checkbox]").each(function () {
                    this.checked = true
                })
            } else {
                $("input[type=checkbox]").each(function () {
                    this.checked = false;
                })
            }
        });
</script>
@endsection