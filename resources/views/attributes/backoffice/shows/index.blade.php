<div class="row attr_select_block">
    <div class="col-md-12">
        <div class="form-group form-group-default"> 
            <label class="">Attributes</label>
            <select class="form-control attr" name="attr" >
                <option value="">Attributes</option>
                <option value="1">Color</option>
                <option value="2">Storage</option>
                <option value="3">Dispaly</option>
            </select>
        </div>
    </div>
</div>

<form id="form" action="{{ url('products/add_attr?block='.$block) }}" method="post" class="ajax">
    <input type="hidden" name="id" class="id">
</form>

<script>
    $('.attr').on('change', function() {
        var id = $(this).children('option:selected').val();  
        $('.id').val(id);  
        $('#form').submit();
    })
</script>
