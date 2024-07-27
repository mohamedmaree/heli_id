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
                            <form >
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="row">

                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">{{__('admin.user_name')}}</label>
                                                <div class="controls">
                                                    <input type="text" class="form-control" value="{{$message->name}}" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">{{__('admin.phone')}}</label>
                                                <div class="controls">
                                                    <input type="text" class="form-control" value="{{$message->phone}}" disabled >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">{{__('admin.email')}}</label>
                                                <div class="controls">
                                                    <input type="text" class="form-control" value="{{$message->email}}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="first-name-column">{{__('admin.text_of_message')}}</label>
                                                <div class="controls">
                                                    <textarea class="form-control" cols="30" messages="10" disabled>{{$message->message}}</textarea>
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
