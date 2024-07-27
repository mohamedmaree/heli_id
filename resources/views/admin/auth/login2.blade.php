<!DOCTYPE html>
<html class="loading" lang="ar" data-textdirection="rtl">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>{{__('site.login')}}</title>

        <!-- Favicon -->
        <link rel="apple-touch-icon" href="{{$data['fav_icon']}}">
        <link rel="shortcut icon" type="image/x-icon" href="{{$data['fav_icon']}}">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com"  />
        <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap" rel="stylesheet" />
        <!-- Icons -->
        <link rel="stylesheet" href="{{asset('admin/app-assets/vendors/fonts/fontawesome.css')}}" />
        <link rel="stylesheet" href="{{asset('admin/app-assets/vendors/fonts/flag-icons.css')}}" />
        <!-- Core CSS -->
        <link rel="stylesheet" href="{{asset('admin/app-assets/vendors/css/rtl/core.css')}}" />
        <link rel="stylesheet" href="{{asset('admin/app-assets/vendors/css/rtl/theme-default.css')}}" />
        <link rel="stylesheet" href="{{asset('admin/app-assets/css/demo.css')}}" />
        <!-- Vendors CSS -->
        <link rel="stylesheet" href="{{asset('admin/app-assets/vendors/libs/node-waves/node-waves.css')}}" />
        <link rel="stylesheet" href="{{asset('admin/app-assets/vendors/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
        <link rel="stylesheet" href="{{asset('admin/app-assets/vendors/libs/typeahead-js/typeahead.css')}}" />
        <!-- Vendor -->
        <link rel="stylesheet" href="{{asset('admin/app-assets/vendors/libs/form-validation/umd/styles/index.min.css')}}" />
        <!-- Page CSS -->
        <!-- Page -->
        <link rel="stylesheet" href="{{asset('admin/app-assets/vendors/css/pages/page-auth.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/extensions/toastr.css')}}">


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
<body>
    <!-- Content -->
    <div class="container-xxl ">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
          <!-- Login -->
          <div class="card" style="direction: {{ lang() == 'ar' ? 'rtl':'ltr' }};">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center mb-4 mt-2">
                <a href="#" class="app-brand-link gap-2">
                  <span class="app-brand-logo demo">
                    <img class="w-100" src="{{$data['logo']}}" alt="branding logo" style="max-height: 360px;">
                  </span>
                  <span class="app-brand-text demo text-body fw-bold ms-1">{{$data['name_'.lang()]}}</span>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-1 pt-2">{{__('site.hi')}} {{$data['name_'.lang()]}} 👋</h4>
              {{-- <p class="mb-4">Please sign-in to your account and start the adventure</p> --}}

              <form id="formAuthentication" class="mb-3" action="{{route('admin.login')}}"  method="POST">
                @csrf
                <div class="mb-3">
                  <label for="email" class="form-label">{{__('site.email')}}</label>
                  <input type="text"  class="form-control" id="email" name="email" placeholder="{{__('site.email')}}" autofocus />
                </div>
                <div class="mb-3 form-password-toggle">
                    <label class="form-label" for="password">{{__('site.password')}}</label>

                    <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />


                </div>
                <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember-me" />
                    <label class="form-check-label" for="remember-me">{{__('site.remember')}}</label>
                  </div>
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100 submit_button" type="submit">{{__('site.login')}}</button>
                </div>
                <div class="mb-3">
                  <a href="{{route('admin.forget-password')}}">
                  <small>{{ __('admin.forget_password') }}</small>
                </a>
                </div>
              </form>


              </div>
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    <!-- / Content -->
<script src="{{asset('admin/app-assets/vendors/libs/jquery/jquery.js')}}"></script>
<script src="{{asset('admin/app-assets/vendors/libs/popper/popper.js')}}"></script>
<script src="{{asset('admin/app-assets/vendors/js/bootstrap.js')}}"></script>
<script src="{{asset('admin/app-assets/vendors/libs/node-waves/node-waves.js')}}"></script>
<script src="{{asset('admin/app-assets/vendors/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
<script src="{{asset('admin/app-assets/vendors/libs/hammer/hammer.js')}}"></script>
<script src="{{asset('admin/app-assets/vendors/libs/typeahead-js/typeahead.js')}}"></script>
<script src="{{asset('admin/app-assets/vendors/js/menu.js')}}"></script>
<!-- endbuild -->
<!-- Vendors JS -->

<!-- Main JS -->

<!-- Page JS -->
{{-- <script src="{{asset('admin/app-assets/js/pages-auth.js')}}"></script> --}}
<script src="{{asset('admin/app-assets/vendors/js/extensions/toastr.min.js')}}"></script>


    <script>

        $(document).ready(function(){
            $(document).on('submit','#formAuthentication',function(e){
                e.preventDefault();
                var url = $(this).attr('action');
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
                            $('#formAuthentication input[name=password]').addClass('border-danger')
                            $('#formAuthentication input[name=password').after(`<span class="mt-5 text-danger">${response.message}</span>`);
                        }
                    },
                    error: function (xhr) {
                        $(".submit_button").html("{{ __('admin.login')}}").attr('disable',false)
                        $(".text-danger").remove()
                        $('#formAuthentication input').removeClass('border-danger')

                        $.each(xhr.responseJSON.errors, function(key,value) {
                            $('#formAuthentication input[name='+key+']').addClass('border-danger')
                            $('#formAuthentication input[name='+key+']').after(`<span class="mt-5 text-danger">${value}</span>`);
                        });
                    },
                });
            return false;
            });
        });

        toastr.options = {
            "closeButton": true,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showMethod": "slideDown",
             "hideMethod": "slideUp",
              timeOut: 2000 
        };
    </script>
</body>
<!-- END: Body-->

</html>
