@if($is_child) <div class="p-l-20 b-l b-grey">@endif
    <div class="row">
        <div class="col-md-12">
            <div class="form-group form-group-default form-group-costume-select2 input-group">
                <div class="form-input-group">
                    <label class="fade">Attributes</label>
                    <select class="full-width attributes-ajax" name="attribute[]" data-init-plugin="select2">
                        <option value="colors">Colors</option>
                        <option value="sizes">Sizes</option>
                    </select>
                    </div>
                <div class="input-group-append ">
                    <span class="input-group-text">
                        <form action="{{ url('attributes/value') }}" method="GET" class="ajax">
                            <input type="hidden" name="name_container" value="{{ $name_container }}">
                            <button type="submit" class="btn btn-transparent">Add value</button>
                            <input type="hidden" name="attribute" value="">
                            <input type="hidden" name="target_container" value="{{ str_random(40) }}">
                        </form>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div id="values_container">
        @include('attributes.backoffice.partners.components.value')
    </div>
@if($is_child)</div>@endif
<script>
    $('.selected-attribute').html($('.attributes-ajax').val());
    $('input[name=attribute]').val($('.attributes-ajax').val());

    $('.attributes-ajax').select2().on('change', function() {
        $(this).closest('.selected-attribute').html($(this).val());
        $(this).closest('input[name=attribute]').val($(this).val());
    });
</script>