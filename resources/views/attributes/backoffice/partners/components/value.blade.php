<div id="{{ $name_container }}">
    <div class="row">
        <div class="col-md-12">
            <div class="b-b b-grey b-dashed m-t-5 m-b-10"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group form-group-default">
                <label><span class="selected-attribute">{{ $attribute }}</span> value</label>
                <input type="text" class="form-control" name="attr_value[]">
            </div>
        </div>
    </div>
    <div class="sub-container" id="">
        <div class="row">
            <div class="col-md-6  p-r-5">
                <div class="form-group form-group-default">
                    <label>Unity price</label>
                    <input type="text" class="form-control" name="">
                </div>
            </div>
            <div class="col-md-6  p-l-5">
                <div class="form-group form-group-default">
                    <label>Stock</label>
                    <input type="text" class="form-control" name="">
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
</script>