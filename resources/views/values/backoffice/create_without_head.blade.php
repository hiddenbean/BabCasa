@if($block != "root") <div class="p-l-15 b-l b-dashed"> @endif 
<div class='row m-t-2'>
    <div class="col-md-12">
        <div class="form-group form-group-default">
            <label>{{ $name }} value</label>
            <input type="text" class="form-control" name="value">
        </div>
    </div>
</div>
<div id={{  "block_".$name  }}>
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
        <div class="col-md-12">
            <a class="ajax m-b-5" href="{{ url('products/select_attr?block=block_'.$name) }}">It have option</a>
        </div>
    </div>
</div> 
@if($block != "root")</div>@endif
    