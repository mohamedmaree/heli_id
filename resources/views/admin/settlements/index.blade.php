
@extends('admin.layout.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/extensions/sweetalert2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/index_page.css')}}">
@endsection

@section('content')

<x-admin.table 
    datefilter="true" 
    order="true" 
    :searchArray="[
        'amount' => [
            'input_type' => 'text' , 
            'input_name' => __('admin.the_amount') , 
        ] ,
        
    ]" 
>
    <x-slot name="tableContent">
        <div class="table_content_append card">

        </div>
    </x-slot>
</x-admin.table>
@include('admin.settlements.accept_modal')
@include('admin.settlements.cancel_modal')

    
@endsection

@section('js')

    <script src="{{asset('admin/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/js/scripts/extensions/sweet-alerts.js')}}"></script>

    {{-- delete all script --}}
        @include('admin.shared.deleteAll')
    {{-- delete all script --}}

    {{-- delete one user script --}}
        @include('admin.shared.deleteOne')
    {{-- delete one user script --}}

    {{-- Upload Image script --}}
    @include('admin.shared.addImage')
    {{-- Upload Image script --}}

    <script>
        $(document).on('click', '.accept-btn', function() {
            var id = $(this).data('id'),
                amount = $(this).data('amount')
            $('.settlement_id').val(id)
            $('#amount').val(amount)
        });

        $(document).on('click', '.cancel-btn', function() {
            var id = $(this).data('id')
            $('.settlement_id').val(id)
        });
    </script>

    {{-- submit add form script --}}
    <script>
        $(document).ready(function() {
            $(document).on('submit', '.store', function(e) {
                e.preventDefault();
                var url = $(this).attr('action')
                $.ajax({
                    url: url,
                    method: 'post',
                    data: new FormData($(this)[0]),
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        $(".submit_button").html(
                            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'
                        ).attr('disable', true)
                    },
                    success: function(response) {
                        $(".text-danger").remove()
                        $('.store input').removeClass('border-danger')
                        $(".submit_button").html("{{ __('admin.confirm') }}").attr(
                            'disable', false)
                        Swal.fire({
                            position: 'top-start',
                            type: 'success',
                            title: '{{ __('admin.settlement_request_completed_successfully') }}',
                            showConfirmButton: false,
                            timer: 1500,
                            confirmButtonClass: 'btn btn-primary',
                            buttonsStyling: false,
                        })

                        setTimeout(function() {
                            window.location.replace(response.url)
                        }, 1000);
                    },
                    error: function(xhr) {
                        $(".submit_button").html("{{ __('admin.confirm') }}").attr(
                            'disable', false)
                        $(".text-danger").remove()
                        $('.store input').removeClass('border-danger')

                        $.each(xhr.responseJSON.errors, function(key, value) {
                            $('.store input[name=' + key + ']').addClass('border-danger')
                            if (key == 'image')
                            {
                                $('.store .imageBlock').append(`<span class="mt-5 text-danger">${value}</span>`);
                            }else
                            {
                                $('.store input[name=' + key + ']').after(`<span class="mt-5 text-danger">${value}</span>`);
                            }
                            $('.store select[name=' + key + ']').after(
                                `<span class="mt-5 text-danger">${value}</span>`);
                        });
                    },
                });

            });
        });
    </script>
    {{-- submit add form script --}}

    {{-- delete one user script --}}
        @include('admin.shared.filter_js' , [ 'index_route' => url('admin/settlements')])
    {{-- delete one user script --}}
@endsection
