<div class="modal fade text-left" id="notify" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel160">{{__('admin.Send_notification')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-12">
                    <ul class="nav nav-tabs  mb-3">
                        @foreach (languages() as $lang)
                            <li class="nav-item">
                                <a class="nav-link @if($loop->first) active @endif"  data-toggle="pill" href="#first_{{$lang}}" aria-expanded="true">{{  __('admin.data') }} {{ $lang }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div> 
                <form action="{{$route}}" method="POST" enctype="multipart/form-data" class="notify-form">
                    @csrf
                    <input type="hidden" name="id" class="notify_id">
                    <input type="hidden" name="notify" class="notify" value="notify">
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
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary send-notify-button" >{{__('admin.send')}}</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">{{__('admin.cancel')}}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<div class="modal fade text-left" id="mail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h5 class="modal-title" id="myModalLabel160">{{__('admin.Send_email')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"> 
                <form action="{{$route}}" method="POST" enctype="multipart/form-data" class="notify-form">
                    @csrf
                    <input type="hidden" name="id" class="notify_id">
                    <input type="hidden" name="notify" class="email" value="email">
                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label for="first-name-column">{{__('admin.the_written_text_of_the_email')}}</label>
                            <div class="controls">
                                <textarea name="message" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary send-notify-button" >{{__('admin.send')}}</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">{{__('admin.cancel')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade text-left" id="sms" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h5 class="modal-title" id="myModalLabel160">{{__('admin.send_sms')}}</h5>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"> 
                <form action="{{$route}}" method="POST" enctype="multipart/form-data" class="notify-form">
                    @csrf
                    <input type="hidden" name="id" class="notify_id">
                    <input type="hidden" name="notify" value="sms" class="sms">
                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label for="first-name-column">{{__('admin.the_written_text_of_the_sms')}}</label>
                            <div class="controls">
                                <textarea name="body" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary send-notify-button" >{{__('admin.send')}}</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">{{__('admin.cancel')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>