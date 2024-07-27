@extends('admin.layout.master')
@section('content')
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    {{-- <div class="card-header">
                        <h4 class="card-title">{{__('admin.show')}}</h4>
                    </div> --}}

                    <div class="card-content">
                        <div class="card-body">
                            <form>
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="row">

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">{{__('admin.Link')}}</label>
                                                <div class="controls">
                                                    <input type="text" class="form-control" value="{{$report->url}}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">{{__('admin.action_type')}}</label>
                                                <div class="controls">
                                                    <input type="text" class="form-control" value="{{$report->method}}" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">{{__('admin.ip')}}</label>
                                                <div class="controls">
                                                    <input type="text" class="form-control" value="{{$report->ip}}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">{{__('admin.browser')}}</label>
                                                <div class="controls">
                                                    <input type="text" class="form-control" value="{{$report->agent}}" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">{{__('admin.the_admin')}}</label>
                                                <div class="controls">
                                                    <input type="text" class="form-control" value="{{$report->admin->name}}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">{{__('admin.email')}}</label>
                                                <div class="controls">
                                                    <input type="text" class="form-control" value="{{$report->admin->email}}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">{{__('admin.subject_of_report')}}</label>
                                                <div class="controls">
                                                    <textarea class="form-control" cols="30" reports="10" disabled>{{$report->subject}}</textarea>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-12 d-flex justify-content-center mt-3">
                                            <a href="{{ url()->previous() }}" type="reset" class="btn btn-outline-warning mr-1 mb-1">{{__('admin.back')}}</a>
                                        </div>

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
