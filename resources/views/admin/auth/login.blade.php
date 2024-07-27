<!-- fixed-Loader --><!doctype html>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>{{__('site.login')}}</title>
    <link rel="apple-touch-icon" href="{{asset('storage/images/settings/fav_icon.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('storage/images/settings/fav_icon.png')}}">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/vendors-rtl.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css-rtl/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css-rtl/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css-rtl/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css-rtl/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css-rtl/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css-rtl/themes/semi-dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css-rtl/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css-rtl/pages/authentication.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css-rtl/custom-rtl.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/style-rtl.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/extensions/toastr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css-rtl/plugins/extensions/toastr.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <style>
     .app-content{
        background-image:  url("{{$data['login_background']}}") ;
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
     }   
    </style>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<body  class="vertical-layout vertical-menu-modern 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-body">
            <section class="row flexbox-container">
                <div class="col-xl-12 d-flex justify-content-center">
                    <div class="card bg-authentication rounded-0 mb-0 w-75">
                        <div class="row m-0" style="background: black">
                            <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                                <img class="w-100" src="{{$data['logo']}}" alt="branding logo" style="max-height: 360px;">
                            </div>
                            <div class="col-lg-6 col-12 p-0">
                                <div class="card rounded-0 mb-0 px-2">
                                    <div class="card-header pb-1">
                                        <div class="card-title">
                                            <h4 class="mb-0">{{__('site.login')}}</h4>
                                        </div>
                                    </div>
                                    <p class="px-2">{{__('site.hi')}} {{$data['name_'.lang()]}}</p>
                                    <div class="card-content mb-4">
                                        <div class="card-body pt-1">
                                            <form class="form-horizontal"  action="{{route('admin.login')}}" method="post">
                                                @csrf
                                                <!-- <input type="hidden" name="device_id" id="device_id" /> -->
                                                <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                    <input type="email" class="form-control"  placeholder="{{__('site.email')}}" name="email" required>
                                                    <div class="form-control-position">
                                                        <i class="feather icon-mail"></i>
                                                    </div>
                                                    <label for="phone">{{__('site.email')}}</label>
                                                </fieldset>

                                                <fieldset class="form-label-group position-relative has-icon-left">
                                                    <input type="password" class="form-control" name="password" placeholder="{{__('site.password')}}" required>
                                                    <div class="form-control-position">
                                                        <i class="feather icon-lock"></i>
                                                    </div>
                                                    <label for="user-password">{{__('site.password')}}</label>
                                                </fieldset>
                                                <div class="form-group d-flex justify-content-between align-items-center">
                                                    <div class="text-left">
                                                        <fieldset class="checkbox">
                                                            <div class="vs-checkbox-con vs-checkbox-primary">
                                                                <input type="checkbox">
                                                                <span class="vs-checkbox">
                                                                    <span class="vs-checkbox--check">
                                                                        <i class="vs-icon feather icon-check"></i>
                                                                    </span>
                                                                </span>
                                                                <span class="">{{__('site.remember')}}</span>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary float-right btn-inline submit_button">{{__('site.login')}}</button>
                                            </form>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>
<!-- END: Content-->

    <script src="{{asset('admin/app-assets/vendors/js/vendors.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{asset('admin/app-assets/js/core/app.js')}}"></script>
    <script src="{{asset('admin/app-assets/js/scripts/components.js')}}"></script>
    <script src="{{asset('admin/app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/js/all.min.js"></script>
    <script>
        toastr.options = {
            "closeButton": true,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showMethod": "slideDown",
             "hideMethod": "slideUp",
              timeOut: 2000 
        };
        $(document).ready(function(){
            $(document).on('submit','.form-horizontal',function(e){
                e.preventDefault();
                var url = $(this).attr('action')
                $.ajax({
                    url: url,
                    method: 'post',
                    data: new FormData($(this)[0]),
                    dataType:'json',
                    processData: false,
                    contentType: false,
                    beforeSend: function(){
                        $(".submit_button").html('<i class="fas fa-spinner"></i>').attr('disables',true);
                    },
                    success: function(response){
                        $(".text-danger").remove()
                        $('.form-horizontal input').removeClass('border-danger')
                        if (response.status == 'login'){
                            toastr.success(response.message)
                            setTimeout(function(){
                                window.location.replace(response.url)
                            }, 1000);
                        }else{
                            $(".submit_button").html(`<i class="ft-unlock"></i> {{ __('admin.login') }}`).attr('disable',false)
                            $('.form-horizontal input[name=password]').addClass('border-danger')
                            $('.form-horizontal input[name=password').after(`<span class="mt-5 text-danger">${response.message}</span>`);
                        }
                    },
                    error: function (xhr) {
                        $(".submit_button").html("{{ __('admin.login')}}").attr('disable',false)
                        $(".text-danger").remove()
                        $('.form-horizontal input').removeClass('border-danger')

                        $.each(xhr.responseJSON.errors, function(key,value) {
                            $('.form-horizontal input[name='+key+']').addClass('border-danger')
                            $('.form-horizontal input[name='+key+']').after(`<span class="mt-5 text-danger">${value}</span>`);
                        });
                    },
                });

            });
        });
    </script>
    @include('components.firebase')
</body>
<!-- END: Body-->

</html>
