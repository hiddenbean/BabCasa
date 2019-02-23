<div class="value_container" id="{{ $name_container }}">
    <div class="row">
        <div class="col-md-12">
            <div class="b-b b-grey b-dashed m-t-5 m-b-10"></div>
        </div>
    </div>
    <div class="sub-container" id="">
        <div class="row">
            <div class="col-md-7">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-group-default">
                            <label><span class="selected-attribute">{{ $attribute }}</span> value</label>
                            <input type="text" class="form-control" name="attr_value[]">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-group-default">
                            <label>Unity price</label>
                            <input type="text" class="form-control" name="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-group-default">
                            <label>Stock</label>
                            <input type="text" class="form-control" name="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 p-l-0">
                <div class="form-group form-group-default">
                    <img src="{{ asset('img/img_placeholder.png') }}" id="image_preview_staff"
                        alt="" srcset="" width="169" style="margin-left: calc(50% - 85px);">
                    <label for="path_staff" class="choose_photo">
                        <span>
                            <i class="fa fa-image"></i> Click here to uploade picture</span>
                    </label>
                    <input type="file" id="path_staff" name="path" class="form-control hide">
                </div>
            </div>
        </div>
        <div class="row add-variantes" style="display:none">
            <div class="col-md-12 m-b-10">
                <form action="{{ url('attributes/list') }}" method="GET" class="ajax">
                    <input type="hidden" name="name_container" value="{{ $name_container }}">
                    <button type="submit" class="btn btn-cons">Add variantes to <span class="add-variantes-name">this value</span></button>
                    <input type="hidden" name="target_container" value="{{ str_random(40) }}">
                    <a 
                        href="javascript:;" 
                        data-toggle="tooltip" 
                        data-placement="bottom" 
                        data-html="true" 
                        trigger="click" 
                        title= "<p class='tooltip-text'>You can use this form to create a new category if you have the right permissions.<br>
                                If you have any difficulties please <a href='#'>contact the support</a></p>"> 
                        <i class="fas fa-question-circle"></i>
                    </a>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-right">
            <button class="btn btn-transparent btn-crons text-danger cancel-value"><i class="fas fa-times"></i> cancel</button>
        </div>
    </div>
</div>
<script>
    $('#{{ $name_container }} input[name="attr_value[]"]').on('change paste keyup', function() {
        if($(this).val() === "") {
            $('#{{ $name_container }}>.sub-container>.add-variantes').hide('fast');
        } else {
            $('#{{ $name_container }}>.sub-container>.add-variantes').show('fast');
            $('#{{ $name_container }}>.sub-container>.add-variantes-name').html($(this).val());
        }
    });
    @if(isset($target_container)) 
    $('#{{ $target_container }} .sub-container').attr('id', $('#{{ $name_container }} input[name="target_container"]').val());
    @else
    $('#{{ $name_container }} .sub-container').attr('id', $('#{{ $name_container }} input[name="target_container"]').val());
    @endif

    $(document).ready(function () {
        $("#path_staff").on("change", function () {
            var _this = this;
            var image_preview = $("#image_preview_staff");
            showImage(_this, image_preview);
        });

        function showImage(_this, image_preview) {
            var files = !!_this.files ? _this.files : [];
            if (!files.length || !window.FileReader) return;
            if (/^image/.test(files[0].type)) {
                var ReaderObj = new FileReader();
                ReaderObj.readAsDataURL(files[0]);
                ReaderObj.onloadend = function () {
                    image_preview.attr('src', this.result);
                }
            } else {
                alert("Please select an image");
            }
        } 
    });

    $('.cancel-value').click(function () {
        $(this).closest('.value_container').remove();
    });
</script>