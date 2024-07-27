<div class="modal fade text-left" id="import-file" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h5 class="modal-title" id="myModalLabel160">{{__('admin.importfile')}}</h5>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"> 
                <form action="{{$route}}" method="POST" enctype="multipart/form-data" class="import-file-form">
                    @csrf

                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            {{-- <label for="first-name-column">{{__('admin.importfile')}}</label> --}}
                            <div class="controls">
                                        <div class="imgMontg col-12 text-center">
                                            <div class="dropBox">
                                                <div class="textCenter">
                                                    <div class="imagesUploadBlock">
                                                        <label class="uploadImg">
                                                            <span><i class="feather icon-file"></i></span>
                                                            <input type="file" name="file" class="imageUploader" required accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary send-import-file-button" >{{ __('admin.upload') }}</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">{{ __('admin.close') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
