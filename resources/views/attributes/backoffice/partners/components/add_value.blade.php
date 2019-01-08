<div class="row m-b-10">
    <div class="col-md-12">
        <div class="b-b b-grey m-b-10"></div>
        <form action="{{ url('attributes/value') }}" method="GET" class="ajax">
            <input type="hidden" name="name_container" value="{{ $name_container }}">
            <button type="submit" class="btn btn-cons">Add an other value to <span class="selected-attribute"></span></button>
            <input type="hidden" name="attribute" value="">
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