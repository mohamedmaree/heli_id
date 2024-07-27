@extends('admin.layout.master')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/css/extensions/sweetalert2.min.css') }}">
@endsection
@section('content')
    <section id="multiple-column-form">
        <div class="complaint match-height">
            <div class="col-12">
                <div class="card">
                    {{-- <div class="card-header">
                        <h4 class="card-title">{{ __('admin.the_resolution_of_complaining_or_proposal') }}</h4>
                    </div> --}}

                    <div class="card-content">
                        <div class="card-body">
                            <form>
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="row">

                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">{{ __('admin.user_name') }}</label>
                                                <div class="controls">
                                                    <input type="text" class="form-control"
                                                        value="{{ $complaint->user_name }}" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">{{ __('admin.phone') }}</label>
                                                <div class="controls">
                                                    <input type="text" class="form-control"
                                                        value="{{ $complaint->phone }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">{{ __('admin.email') }}</label>
                                                <div class="controls">
                                                    <input type="text" class="form-control"
                                                        value="{{ $complaint->email }}" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">{{ __('admin.complaining') }}</label>
                                                <div class="controls">
                                                    <textarea class="form-control" cols="30" complaints="10" disabled>{{ $complaint->complaint }}</textarea>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-12 d-flex justify-content-center mt-3">
                                            <a href="{{ url()->previous() }}" type="reset"
                                                class="btn btn-outline-warning mr-1 mb-1">{{ __('admin.back') }}</a>
                                            <a data-toggle="modal" data-target="#replay"
                                                class="btn btn-outline-primary mr-1 mb-1">{{ __('admin.replay') }}</a>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade text-left" id="replay" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary white">
                        <h5 class="modal-title" id="myModalLabel160">{{ __('admin.the_replay') }}</h5>
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.complaint.replay', ['id' => $complaint->id]) }}" method="POST"
                            enctype="multipart/form-data" class="notify-form">
                            @csrf
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label for="first-name-column">{{ __('admin.the_replay') }}</label>
                                    <div class="controls">
                                        <textarea name="replay" class="form-control" cols="30" complaints="10"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit"
                                    class="btn btn-primary send-notify-button">{{ __('admin.send') }}</button>
                                <button type="button" class="btn btn-primary"
                                    data-dismiss="modal">{{ __('admin.cancel') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{ asset('admin/app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('admin/app-assets/js/scripts/extensions/sweet-alerts.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(document).on('submit', '.notify-form', function(e) {
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
                        $(".send-notify-button").html(
                            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'
                            ).attr('disable', true)
                    },
                    success: function(response) {
                        $(".text-danger").remove()
                        $('.store input').removeClass('border-danger')
                        $(".send-notify-button").html("{{ __('admin.send') }}").attr('disable',
                            false)
                        Swal.fire({
                            position: 'top-start',
                            type: 'success',
                            title: '{{ __('admin.replay_successfullay')  }}',
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
                        $(".send-notify-button").html("{{ __('admin.send') }}").attr('disable',
                            false)
                        $(".text-danger").remove()
                        $('.store input').removeClass('border-danger')

                        $.each(xhr.responseJSON.errors, function(key, value) {
                            $('.store input[name=' + key + ']').addClass(
                                'border-danger')
                            $('.store input[name=' + key + ']').after(
                                `<span class="mt-5 text-danger">${value}</span>`);
                            $('.store select[name=' + key + ']').after(
                                `<span class="mt-5 text-danger">${value}</span>`);
                        });
                    },
                });

            });
        });
    </script>
@endsection
