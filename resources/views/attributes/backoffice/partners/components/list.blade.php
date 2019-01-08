@if($is_child) <div class="p-l-20 b-l">@endif
    <div class="row">
        <div class="col-md-12">
            <div class="form-group form-group-default form-group-default-select2">
                <label>Attribute</label>
                <select class="full-width attributes-ajax" name="attribute[]" data-init-plugin="select2">
                    <option value="colors">Colors</option>
                    <option value="sizes">Sizes</option>
                </select>
            </div>
        </div>
    </div>
    <div id="values_container">
        @include('attributes.backoffice.partners.components.value')
    </div>
        @include('attributes.backoffice.partners.components.add_value')
@if($is_child)</div>@endif
<script>
    $('.selected-attribute').html($('.attributes-ajax').val());
    $('input[name=attribute]').val($('.attributes-ajax').val());

    $('.attributes-ajax').select2().on('change', function() {
        $('.selected-attribute').html($(this).val());
        $('input[name=attribute]').val($(this).val());
    });
</script>