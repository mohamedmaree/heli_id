@extends('admin.layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css-rtl/plugins/forms/validation/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/extensions/sweetalert2.min.css')}}">
@endsection
  
@section('content')
<section class="users-edit">
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                {{-- <ul class="nav nav-tabs mb-3" role="tablist"> --}}
                    {{-- <li class="nav-item">
                        <a class="nav-link d-flex align-items-center active" id="notify-tab" data-toggle="tab" href="#notify" aria-controls="notify" role="tab" aria-selected="true">
                            <i class="feather icon-bell mr-25"></i><span class="d-none d-sm-block">{{__('admin.send_notification')}}</span>
                        </a>
                    </li> --}}
                    {{-- <li class="nav-item">
                        <a class="nav-link d-flex align-items-center" id="sms-tab" data-toggle="tab" href="#sms" aria-controls="sms" role="tab" aria-selected="false">
                            <i class="feather icon-phone mr-25"></i><span class="d-none d-sm-block">{{__('admin.send_sms')}}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center" id="email-tab" data-toggle="tab" href="#email" aria-controls="email" role="tab" aria-selected="false">
                            <i class="feather icon-mail mr-25"></i><span class="d-none d-sm-block">{{__('admin.send_email')}}</span>
                        </a>
                    </li> --}}
                {{-- </ul> --}}
                <div class="tab-content">
                    <div class="col-12">
                        <ul class="nav nav-tabs  mb-3">
                            @foreach (languages() as $lang)
                                <li class="nav-item">
                                    <a class="nav-link @if($loop->first) active @endif"  data-toggle="pill" href="#first_{{$lang}}" aria-expanded="true">{{  __('admin.data') }} {{ $lang }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div> 

                    <div class="tab-pane active" id="notify" aria-labelledby="notify-tab" role="tabpanel">
                        <form action="{{route('admin.notifications.send')}}" method="POST" enctype="multipart/form-data" class="notify-form" novalidate>
                            @csrf
                            <input type="hidden" name="type" value="notify">
                            <div class="row">
                                
                                <div class="col-12">
                                <div class="tab-content">
                                @foreach (languages() as $lang)
                                <div role="tabpanel" class="tab-pane fade @if($loop->first) show active @endif " id="first_{{$lang}}" aria-labelledby="first_{{$lang}}" aria-expanded="true">

                                    <div class="col-md-12 col-6">
                                        <div class="form-group">
                                            <label for="first-name-column">{{__('admin.the_title')}} {{ $lang }}</label>
                                            <div class="controls">
                                                <input type="text" name="title[{{ $lang }}]" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">{{__('admin.the_message')}} {{ $lang }}</label>
                                            <div class="controls">
                                                <textarea name="body[{{ $lang }}]" class="form-control" cols="30" rows="10" ></textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                @endforeach
                            </div>
                        </div>

                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">{{__('admin.send_to')}}</label>
                                        <div class="controls">
                                            <select name="user_type" required data-validation-required-message="{{__('admin.this_field_is_required')}}" class="select2 form-control" >
                                                <option value>{{__('admin.Select_the_senders_category')}}</option>
                                                <option  value="admins">{{__('admin.admins')}}</option>
                                                <option  value="all_users">{{__('admin.all_users')}}</option>
                                                <option  value="active_users">{{__('admin.active_users')}}</option>
                                                <option  value="not_active_users">{{__('admin.dis_active_users')}}</option>
                                                <option  value="blocked_users">{{__('admin.Prohibited_users')}}</option>
                                                <option  value="not_blocked_users">{{__('admin.Unspoken_users')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div> 
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary send-notify-button" >{{__('admin.send')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane " id="sms" aria-labelledby="sms-tab" role="tabpanel">
                        <form action="{{route('admin.notifications.send')}}" method="POST" enctype="multipart/form-data" class="notify-form" novalidate >
                            @csrf
                            <input type="hidden" name="type" value="sms">
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">{{__('admin.text_of_message')}}</label>
                                        <div class="controls">
                                            <textarea name="body" class="form-control" cols="30" rows="10" required data-validation-required-message="{{__('admin.this_field_is_required')}}" ></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">{{__('admin.send_to')}}</label>
                                        <div class="controls">
                                            <select name="user_type" class="select2 form-control" required data-validation-required-message="{{__('admin.this_field_is_required')}}" >
                                                <option value>{{__('admin.Select_the_senders_category')}}</option>
                                                <option  value="admins">{{__('admin.admins')}}</option>
                                                <option  value="all_users">{{__('admin.all_users')}}</option>
                                                <option  value="active_users">{{__('admin.active_users')}}</option>
                                                <option  value="not_active_users">{{__('admin.dis_active_users')}}</option>
                                                <option  value="blocked_users">{{__('admin.Prohibited_users')}}</option>
                                                <option  value="not_blocked_users">{{__('admin.Unspoken_users')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div> 
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary send-notify-button" >{{__('admin.send')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane " id="email" aria-labelledby="email-tab" role="tabpanel">
                        <form action="{{route('admin.notifications.send')}}" method="POST" enctype="multipart/form-data" class="notify-form" novalidate >
                            @csrf
                            <input type="hidden" name="type" value="email">
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">{{__('admin.email_content')}}</label>
                                        <div class="controls">
                                            <textarea name="body" class="form-control" cols="30" rows="10" required data-validation-required-message="{{__('admin.this_field_is_required')}}"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">{{__('admin.send_to')}}</label>
                                        <div class="controls">
                                            <select name="user_type" class="select2 form-control" required data-validation-required-message="{{__('admin.this_field_is_required')}}" >
                                                <option value>{{__('admin.Select_the_senders_category')}}</option>
                                                <option  value="admins">{{__('admin.admins')}}</option>
                                                <option  value="all_users">{{__('admin.all_users')}}</option>
                                                <option  value="active_users">{{__('admin.active_users')}}</option>
                                                <option  value="not_active_users">{{__('admin.dis_active_users')}}</option>
                                                <option  value="blocked_users">{{__('admin.Prohibited_users')}}</option>
                                                <option  value="not_blocked_users">{{__('admin.Unspoken_users')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div> 
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary send-notify-button" >{{__('admin.send')}}</button>
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

<script src="{{asset('admin/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
<script src="{{asset('admin/app-assets/js/scripts/extensions/sweet-alerts.js')}}"></script>
<script src="{{asset('admin/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"></script>
<script src="{{asset('admin/app-assets/js/scripts/forms/validation/form-validation.js')}}"></script>
<script>
    $(document).ready(function(){
        $(document).on('submit','.notify-form',function(e){
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
                    $(".send-notify-button").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>').attr('disable',true)
                },
                success: (response)=>{
                    $(".text-danger").remove()
                    $('.store input').removeClass('border-danger')
                    $(".send-notify-button").html("{{__('admin.send')}}").attr('disable',false)
                    Swal.fire({
                                position: 'top-start',
                                type: 'success',
                                title: '{{__('admin.send_successfully')}}',
                                showConfirmButton: false,
                                timer: 1500,
                                confirmButtonClass: 'btn btn-primary',
                                buttonsStyling: false,
                            })
                    $(this).trigger("reset")
                },
                error: function (xhr) {
                    $(".send-notify-button").html("{{__('admin.send')}}").attr('disable',false)
                    $(".text-danger").remove()
                    $('.store input').removeClass('border-danger')

                    $.each(xhr.responseJSON.errors, function(key,value) {
                        $('.store input[name='+key+']').addClass('border-danger')
                        $('.store input[name='+key+']').after(`<span class="mt-5 text-danger">${value}</span>`);
                        $('.store select[name='+key+']').after(`<span class="mt-5 text-danger">${value}</span>`);
                    });
                },
            });

        });
    });
</script>
@endsection