<div class="modal fade" id="acceptModal" tabindex="-1" role="dialog" aria-labelledby="acceptModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('admin.Settlement_request')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="top:5px;left: 11px">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="store" enctype="multipart/form-data" action="{{route('admin.settlements.changeStatus')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" class="settlement_id" value="">
                    <input type="hidden" id="status" name="status" value="accepted">
                    <div class="form-group text-center imageBlock">
                        <label for="recipient-name" class="col-form-label">{{__('admin.receipt_photo')}}</label>
                        <div class="col-12">
                            <div class="imgMontg col-12 text-center">
                                <div class="dropBox">
                                    <div class="textCenter">
                                        <div class="imagesUploadBlock">
                                            <label class="uploadImg">
                                                <span><i class="feather icon-image"></i></span>
                                                <input type="file" accept="image/*" name="image"
                                                       class="imageUploader">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <label for="message-text" class="col-form-label">{{__('admin.settlement_amount')}}</label>
                        <input class="form-control text-center" id="amount" type="number" name="amount" value="">
                    </div>

                </div>
                <div class="modal-footer justify-content-center">
                    <button type="submit" class="btn btn-success submit_button">{{__('admin.confirm')}}</button>
                    <a class="btn btn-danger" data-dismiss="modal" style="text-decoration: none;color: white">{{__('admin.close')}}</a>
                </div>
            </form>
        </div>
    </div>
</div>