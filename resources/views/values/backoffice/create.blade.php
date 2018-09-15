@if($block != "root") <div class="p-l-15 b-l b-dashed"> @endif
    <h5><strong> {{  $parent." ".$name }}s </strong></h5>
    <div class='row m-b-5'>
        <div class='col-md-12'>
            <a class="ajax" href="{{ url('products/add_value?block='.$block.'&name='.$name.'&parent='.$parent) }}">Add an other {{ $name }}</a>
        </div>
    </div> 
    <div class='row'>
        <div class="col-md-12">
            <div class="form-group form-group-default">
                <label>{{ $name }} value</label>
                <input type="text" class="form-control value_{{ $name }}" name="value">
            </div>
            <label class="error-bag" for="value_text">
            </label>
        </div>
    </div>
    <div id={{  "block_".$block  }}>
        <div class='row'>
            <div class="col-md-3">
                <div class="form-group form-group-default">
                    <label>Price</label>
                    <input type="text" class="form-control" name="price">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group form-group-default">
                    <label>Quantity</label>
                    <input type="text" class="form-control" name="quantity">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group form-group-default">
                    <label>Picture</label>
                    <input type="file" class="form-control" name="picture[]">
                </div>
            </div>
        </div>
        <div class="row">
            <form id="form" action="{{ url('products/select_attr') }}" method="get" class="ajax">
                <div class="col-md-12">
                    <a class="m-b-5 add_value" href="#" >It have option</a>
                </div>
                <input type="hidden" name="value_text" id="value_text">
                <input type="hidden" name="parent" id="parent" value="{{ $parent }}">
                <input type="hidden" name="block" value='block_{{ $block }}'>
            </form>
        </div>
    </div> 
@if($block != "root")</div>@endif



<script>
    $('.add_value').on('click', function(e) {
        e.preventDefault();
        var value = $('.value_{{ $name }}').val();
        $('.value_{{ $name }}').attr("disabled", true);
        $('#value_text').val(value);
        $(this).submit();
    })
</script>