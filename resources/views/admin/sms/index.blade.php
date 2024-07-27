@extends('admin.layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/extensions/sweetalert2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/extensions/toastr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css-rtl/plugins/extensions/toastr.css')}}">
@endsection

@section('content')
<div class="card ">
    <div class="card-content">
        <div class="card-body">
            <div class="row">
               
                @foreach ($smss as $sms)
                    <div class="col-12 col-md-6">

                        <div class="one-sms d-flex justify-content-center align-items-baseline mb-1 " >
                            <span class="mr-1 ml-1" for="">{{$sms->name}}</span>
                            <input type="radio" {{$sms->active == 1 ? 'checked' : ''}} class="change-sms" name="id" id="{{$sms->id}}">
                        </div>

                        <form  method="POST" action="{{route('admin.sms.update' , ['id' => $sms->id])}}" class="update form-horizontal" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="form-body">
                                <div class="sms">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">{{__('admin.type_the_name_of_the_sender')}}</label>
                                            <div class="controls">
                                                <input type="text" value="{{$sms->sender_name}}" name="sender_name" class="form-control" placeholder="{{__('admin.type_the_name_of_the_sender')}}" required data-validation-required-message="{{__('admin.this_field_is_required')}}" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">{{__('admin.type_the_user_name')}}</label>
                                            <div class="controls">
                                                <input type="text" value="{{$sms->user_name}}" name="user_name" class="form-control" placeholder="{{__('admin.type_the_user_name')}}" required data-validation-required-message="{{__('admin.this_field_is_required')}}" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">{{__('admin.type_the_password')}}</label>
                                            <div class="controls">
                                                <input type="text" value="{{$sms->password}}" name="password" class="form-control" placeholder="{{__('admin.type_the_password')}}" required data-validation-required-message="{{__('admin.this_field_is_required')}}" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 d-flex justify-content-center mb-2">
                                        <button type="submit" class="submit_button btn btn-primary mr-1 mb-1 submit_button">{{__('admin.modernization')}}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{asset('admin/app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/js/scripts/extensions/sweet-alerts.js')}}"></script>
    <script>
        $(document).ready(function(){

            $(document).on('click','.change-sms',function(e){
                $.ajax({
                    url: '{{route("admin.sms.change")}}',
                    method: 'post',
                    data: {id : this.id },
                    dataType:'json',
                    success: (response) => {
                        toastr.success('{{__('admin.the_package_has_been_successfully_activated')}}')
                    },
                });
            });
            
            $(document).on('submit','.update',function(e){
                e.preventDefault();
                var url = $(this).attr('action')
                $.ajax({
                    url: url,
                    method: 'post',
                    data: new FormData($(this)[0]),
                    dataType:'json',
                    processData: false,
                    contentType: false,
                    beforeSend: () => {
                        $(this).find(".submit_button").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>').attr('disable',true)
                    },
                    success: (response) => {
                        $(".text-danger").remove()
                        $('.store input').removeClass('border-danger')
                        $(this).find(".submit_button").html("{{__('admin.modernization')}}").attr('disable',false)
                        Swal.fire({
                                    position: 'top-start',
                                    type: 'success',
                                    title: '{{__('admin.the_package_has_been_successfully_activated')}}',
                                    showConfirmButton: false,
                                    timer: 1500,
                                    confirmButtonClass: 'btn btn-primary',
                                    buttonsStyling: false,
                                })
                    },
                    error:  (xhr) =>{
                        $(".text-danger").remove()
                        $('.store input').removeClass('border-danger')
                        $(this).find(".submit_button").html("{{__('admin.modernization')}}").attr('disable',false)
                        $.each(xhr.responseJSON.errors, function(key,value) {
                            toastr.error(value)
                        });
                    },
                });

            });
        });
    </script>
@endsection
