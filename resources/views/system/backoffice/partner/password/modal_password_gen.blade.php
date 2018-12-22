<!-- Modal -->
<div class="modal fade slide-up disable-scroll" id="modalSlideUp" tabindex="-1" role="dialog" aria-labelledby="modalSlideUpLabel" aria-hidden="false">
    <div class="modal-dialog ">
        <div class="modal-content-wrapper">
        <div class="modal-content">
            <div class="modal-header clearfix text-left">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="pg-close fs-14"></i>
                </button>
                <h5>Generated <span class="semi-bold">Password</span></h5>
                <p class="p-b-10 hint-text">We recommend using the generated password, but feel free to change it to an easier one</p>
            </div>
            <form action="" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group">
                            <input type="text" name="password" class="form-control" value="{{ str_random(10) }}">
                                <div class="input-group-append">
                                    <span class="input-group-text"><a href="javascript:;"><i class="fas fa-copy"></i></a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end m-t-20">
                        <div class="col-md-6">
                            <button class="btn btn-block text-danger"><i class="fas fa-check"></i> Update my password</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>
<!-- /.modal-dialog -->