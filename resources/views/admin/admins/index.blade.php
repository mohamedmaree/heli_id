@extends('admin.layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/extensions/sweetalert2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/index_page.css')}}">
@endsection

@section('content')

<x-admin.table 
    datefilter="true" 
    order="true" 
    extrabuttons="true"
    addbutton="{{ route('admin.admins.create') }}" 
    deletebutton="{{ route('admin.admins.deleteAll') }}" 
    :searchArray="[
        'name' => [
            'input_type' => 'text' , 
            'input_name' => __('admin.name'), 
        ] ,
        'phone' => [
            'input_type' => 'text' , 
            'input_name' => __('admin.phone') , 
        ] ,
        'email' => [
            'input_type' => 'text' , 
            'input_name' => __('admin.email') , 
        ] ,
        
    ]" 
>

    <x-slot name="extrabuttonsdiv">
            {{-- <a class="btn bg-gradient-info mr-1 mb-1 waves-effect waves-light"  href="{{url(route('admin.master-export', 'Admin'))}}"><i  class="fa fa-file-excel-o"></i>
                {{ __('admin.export') }}</a> --}}
    </x-slot>
    <x-slot name="tableContent">
        <div class="table_content_append card">

        </div>
    </x-slot>
</x-admin.table>


    
@endsection

@section('js')

    <script src="{{asset('admin/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/js/scripts/extensions/sweet-alerts.js')}}"></script>
    @include('admin.shared.deleteAll')
    @include('admin.shared.deleteOne')
    @include('admin.shared.filter_js' , [ 'index_route' => url('admin/admins')])
    <script>
        $(document).ready(function(){
            $(document).on('click','.block_user',function(e){
                e.preventDefault();
                $.ajax({
                    url: '{{url("admin/admins/block")}}',
                    method: 'post',
                    data: { id : $(this).data('id')},
                    dataType:'json',
                    beforeSend: function(){
                        $(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>').attr('disable',true)
                    },
                    success: function(response){
                        Swal.fire({
                                    position: 'top-start',
                                    type: 'success',
                                    title: response.message,
                                    showConfirmButton: false,
                                    timer: 1500,
                                    confirmButtonClass: 'btn btn-primary',
                                    buttonsStyling: false,
                                })
                        setTimeout(function(){
                            window.location.reload()
                        }, 1000);
                    },
                });
    
            });
        });
    </script>
@endsection
