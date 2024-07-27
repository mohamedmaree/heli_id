@extends('admin.layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css-rtl/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/extensions/sweetalert2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css-rtl/pages/app-email.css')}}">
@endsection
    
@section('content')
<div class="card ">
    <div class="card-content">
        <div class="card-body">

            <div class="email-app-list-wrapper">
                <div class="email-app-list">
                    {{-- header content --}}
                        @if (auth('admin')->user()->notifications->count() > 0)

                            <div class="app-action d-flex justify-content-between mb-2">
                                <div class="action-left">
                                    <div class="vs-checkbox-con selectAll">
                                        <input type="checkbox">
                                        <span class="vs-checkbox">
                                            <span class="vs-checkbox--check">
                                                <i class="vs-icon feather icon-minus"></i>
                                            </span>
                                        </span>
                                        <span>{{__('admin.select_all')}}</span>
                                    </div>
                                </div>
                                <div class="action-right">
                                    <ul class="list-inline m-0">
                                        <li class="list-inline-item mail-delete delete_all_button"><span class="action-icon"><i class="feather icon-trash"></i></span></li>
                                    </ul>
                                </div>
                            </div>
                        @endif
                    {{-- header content --}}

                    <div class="email-user-list list-group ps ps--active-y">
                        <ul class="users-list-wrapper media-list">
                            @foreach (auth('admin')->user()->notifications as $notification)
                                <li class="media mail-read">
                                    <div class="media-left pr-50">
                                        
                                        <div class="user-action">

                                            <div class="vs-checkbox-con checkSingle" >
                                                <input type="checkbox" id="{{$notification->id}}" >
                                                <span class="vs-checkbox">
                                                    <span class="vs-checkbox--check">
                                                        <i class="vs-icon feather icon-minus"></i>
                                                    </span>
                                                </span>
                                            </div>
                                        
                                        </div>
                                    </div>
                                    
                                <div class="media-body">
                                        <div class="user-details">
                                            <div class="mail-items">
                                                {{-- <h5 class="list-group-item-heading text-bold-600 mb-25">{{$notification->sender['name']}}</h5> --}}
                                                <span class="list-group-item-text text-truncate">{{$notification->title}}</span>
                                            </div>
                                            <div class="mail-meta-item">
                                                <span class="float-right">
                                                    <span class="mail-date">{{$notification->created_at->diffForHumans()}}</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="mail-message">
                                            <p class="list-group-item-text truncate mb-0">{{$notification->body}}</p>
                                        </div>
                                    </div>
                                </li>
                                <hr>
                            @endforeach
                            <div class="no-data">
                                <img  src="{{asset('admin/app-assets/images/pages/404.png')}}" alt="">
                                <span class="mt-2" style="font-family: cairo">{{__('admin.there_is_no_data_at_the_moment')}}</span>
                            </div>
                        </ul>
                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 438px; left: 944px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 135px;"></div></div></div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection


@section('js')
    <script src="{{asset('admin/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/js/scripts/extensions/sweet-alerts.js')}}"></script>
    <script src="{{asset('admin/app-assets/js/scripts/pages/app-email.js')}}"></script>

    <script>
        $(document).on('change' , '.selectAll input', function () {
            if(this.checked){
                    $(".checkSingle input").each(function(index, element){
                        $(this).prop('checked', true)
                    })
                }else{
                    $(".checkSingle input").each(function(){
                        $(this).prop('checked', false)
                    })
                }
        });
        $(document).on('change' , '.checkSingle input', function () {
            if(! this.checked){
                $('.selectAll input').prop('checked', false)
            }else{
                var isAllChecked = 0;
                $(".checkSingle input").each(function(){
                    if(!this.checked)
                        isAllChecked = 1;
                })
                if(isAllChecked == 0){ $('.selectAll input').prop("checked", true); }
            }
        });
    </script>
    @if (auth('admin')->user()->notifications->count() > 0)
        <script>
            $('.no-data').fadeOut()
        </script>
    @endif
    <script>
        $('.delete_all_button').on('click', function (e) {
            e.preventDefault()
            Swal.fire({
                title: "{{__('هل تريد الاستمرار ؟')}}",
                text: "{{__('هل انت متأكد انك تريد استكمال عملية حذف المحدد')}}",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '{{ __('admin.confirm')}}',
                confirmButtonClass: 'btn btn-primary',
                cancelButtonText: '{{ __('admin.cancel')}}',
                cancelButtonClass: 'btn btn-danger ml-1',
                buttonsStyling: false,
                }).then( (result) => {
                if (result.value) {
                    var usersIds = [];
                    $('.checkSingle input:checked').each(function () {
                        var id = $(this).attr('id');
                        usersIds.push({
                            id: id,
                        });
                    });

                    var requestData = JSON.stringify(usersIds);
                    if (usersIds.length > 0) {
                        e.preventDefault();
                        $.ajax({
                            type: "POST",
                            url: '{{route("admin.admins.notifications.delete")}}',
                            data: {data : requestData},
                            
                            success: function( msg ) {
                                Swal.fire(
                                {
                                    position: 'top-start',
                                    type: 'success',
                                    title: '{{__('admin.the_selected_has_been_successfully_deleted')}}',
                                    showConfirmButton: false,
                                    timer: 1500,
                                    confirmButtonClass: 'btn btn-primary',
                                    buttonsStyling: false,
                                })

                                
                                $('.checkSingle input:checked').each(function () {
                                    $(this).parents('.mail-read').next('hr').remove().fadeOut()
                                    $(this).parents('.mail-read').remove().fadeOut()
                                });

                                if ($(".checkSingle input").length  == 0 ) {
                                    $('.no-data').fadeIn()
                                    $('.app-action').remove()
                                }
                            }
                        });
                    }
                }
            })
        });
    </script>
@endsection

