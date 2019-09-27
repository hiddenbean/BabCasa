@extends('layouts.backoffice.partner.app')
@section('css_before')
<link href="{{ asset('plugins/bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet" type="text/css" media="screen">
<link href="{{ asset('plugins/jquery-dynatree/skin/ui.dynatree.css') }}" rel="stylesheet" type="text/css" media="screen" /> 
    <link href="{{ asset('plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" media="screen" />
@stop
@section('content')
<!-- breadcrumb start -->
<div class="container-fluid container-fixed-lg ">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">DASHBOARD</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ url('/products') }}">products</a>
                </li>
                <li class="breadcrumb-item active">
                    Create
                </li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb end -->

<div class="container-fluid container-fixed-lg">
    <div class="card ">
        <div class="card-header">
            <h4 class="m-t-0 m-b-0"> <strong>Create new product</strong> </h4>
            <label class='error' >
            @if($errors->count()>0)
                You have {{$errors->count()}} ERROR(S) !!
            @endif
            </label>
        </div>
        <div class="card-body">
            <div class="row"> 
                <div class="col-md-4 tree-right">
                    <div id="default-tree" class="m-b-20">
                        <ul id="treeData" class="hidden"> 
                            <li id="id4" class="folder expanded">Document with some children (expanded on init)
                            <ul>
                                <li id="id4.1" class="expanded">Sub-item 4.1 (active and focus on init)
                                <ul>
                                    <li id="id4.1.1">Sub-item 4.1.1</li>
                                    <li id="id4.1.2">Sub-item 4.1.2</li>
                                </ul>
                                </li>
                            </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <form method="POST" action="{{url('store')}}" enctype="multipart/form-data" id="form-personal">
                     {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Reference</label>
                                        <input type="text" class="form-control" name="reference" placeholder="Reference">
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default required has-error">
                                        <label>Short description</label>
                                        <textarea type="text" class="form-control error" name="short_description"></textarea>
                                    </div><label class="error" for="short_description">This field is required.</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Description</label>
                                        <textarea type="text" class="form-control error" name="description" rows="15"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>categories</label>
                                        <select class="full-width select2-hidden-accessible" name="categories[]" data-init-plugin="select2" multiple="" tabindex="-1" aria-hidden="true">
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" >{{$category->categoryLang()->reference}}</option>
                                            @endforeach
                                        
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group form-group-default">
                                        <div class="image_preview text-center">
                                            <img src="{{ asset('img/img_placeholder.png') }}" id="image_preview_product"
                                                alt="" srcset="" height="150">
                                        </div>
                                        <label for="path_product" class="choose_photo">
                                            <span>
                                                <i class="fa fa-image"></i> Choisir une photo</span>
                                        </label>
                                        <input type="file" id="path_product" name="path" class="form-control hide"
                                            multiple="">
                                    </div>
                                </div>
                            </div>
                            <div id="root">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default input-group">
                                            <div class="form-input-group">
                                                <label>Price</label>
                                                <input type="text" class="form-control" placeholder="Price" id="datepicker-component2">
                                            </div>
                                            <div class="input-group-append ">
                                                <span class="input-group-text"><i class="currency">$</i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6" class="attr_block">
                                        <div class="form-group form-group-default">
                                            <label>Quantity</label>
                                            <input type="text" class="form-control error" name="quantity">
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-b-15">
                                    <div class="col-md-12"> 
                                        <a class="ajax m-b-5" href="{{ url('products/select_attr?block=root') }}">It have option</a>  
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary m-t-15" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('plugins/classie/classie.js') }}"></script>
    <script src="{{ asset('plugins/jquery-dynatree/jquery.dynatree.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/select2/js/select2.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script type="text/javascript">
    $(document).ready(function () {

        /*var data = [
            {attr:'2', value: "16" }, 
                {attr:'1',value: "- Gray" },
                    { attr:'3', value: "- - 4.7", currency_id: '1', price: '10', quantity: '10',picture: '1' }, 
                    { attr:'3',value: "- - 5.5", currency_id: '1', price: '10',quantity: '15',picture: '2' },
                {attr:'1', value: "- Silver" }, 
                    { attr:'3', value: "- - 4.7" ,currency_id: '1', price: '10',quantity: '6',picture: '3' }, 
                    {  attr:'3',value: "- - 5.5" ,currency_id: '1', price: '11.5',quantity: '20',picture: '4' },
            {attr:'2', value: "32" },
                {attr:'1',value: "- Gray" },
                    { attr:'3', value: "- - 4.7" ,currency_id: '1', price: '10.5',quantity: '27',picture: '5' }, 
                    { attr:'3',value: "- - 5.5"  ,currency_id: '1', price: '9.5',quantity: '34',picture: '6'},
                {attr:'1', value: "- Silver" }, 
                    { attr:'3', value: "- - 4.7" ,currency_id: '1', price: '12',quantity: '74',picture: '7' }, 
                    { attr:'3',value: "- - 5.5"  ,currency_id: '1', price: '8.5',quantity: '32',picture: '8'},
            {attr:'2', value: "64"  ,currency_id: '1', price: '7',quantity: '56',picture: '9'},
        ];*/
 
        
       /* $('.add_attriutes').on('click', function(e){
            e.preventDefault();
            var html = `
                    <div class="row attr_select_block">
                        <div class="col-md-12">
                            <div class="form-group form-group-default"> 
                                <label class="">Attriutes</label>
                                <select class="form-control" id='attr' name="attr" >
                                    <option value="">Attriutes</option>
                                    <option value="1">Color</option>
                                    <option value="2">Storage</option>
                                    <option value="3">Dispaly</option>
                                </select>
                            </div>
                        </div>
                    </div>`;
            
            $('.attr_block').html(html);

        });  

        var data =[];
        $('.attr_block').delegate('#attr','change', function(){ 
            var option_text = $(this).children('option:selected').text();  
            var option_value = $(this).children('option:selected').val();  
            $("<strong>"+option_text+"</strong>" ).insertBefore( ".attr_block" );
            data.push({attr:option_value});

            var html = `<div class='row'>
                            <div class='col-md-12'>
                                <a href="javascript:;">Add an other `+option_text+`</a>
                            </div>
                        </div>
                        <div class='row m-t-15'>
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>`+option_text+` value</label>
                                    <input type="text" class="form-control" name="value">
                                </div>
                                </div> 
                            </div>
                        </div>
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
                            <div class="col-md-3 text-right">
                                <strong><a href='#' class='add_detail'>Add detail</a></strong>
                                <a href='#' class='btn btn-primary save_detail'>Save</a>
                            </div>
                        </div>
                        <a class="add_attriutes" href="javascript:;">It have option</a>`;

        $('.attr_block').append(html);
        $('.attr_select_block').remove();
            console.log(data);
        });  


 */











        var treeData = [{
            title: "item1 with key and tooltip",
            tooltip: "Look, a tool tip!"
        }, {
            title: "item2: selected on init",
            select: true
        }, {
            title: "Folder",
            isFolder: true,
            key: "id3",
            children: [{
                title: "Sub-item 3.1",
                children: [{
                    title: "Sub-item 3.1.1",
                    key: "id3.1.1"
                }, {
                    title: "Sub-item 3.1.2",
                    key: "id3.1.2"
                }]
            }, {
                title: "Sub-item 3.2",
                children: [{
                    title: "Sub-item 3.2.1",
                    key: "id3.2.1"
                }, {
                    title: "Sub-item 3.2.2",
                    key: "id3.2.2"
                }]
            }]
        }, {
            title: "Document with some children (expanded on init)",
            key: "id4",
            expand: true,
            children: [{
                title: "Sub-item 4.1 (active on init)",
                activate: true,
                children: [{
                    title: "Sub-item 4.1.1",
                    key: "id4.1.1"
                }, {
                    title: "Sub-item 4.1.2",
                    key: "id4.1.2"
                }]
            }, {
                title: "Sub-item 4.2 (selected on init)",
                select: true,
                children: [{
                    title: "Sub-item 4.2.1",
                    key: "id4.2.1"
                }, {
                    title: "Sub-item 4.2.2",
                    key: "id4.2.2"
                }]
            }, {
                title: "Sub-item 4.3 (hideCheckbox)",
                hideCheckbox: true
            }, {
                title: "Sub-item 4.4 (unselectable)",
                unselectable: true
            }]
        }];

        $("#default-tree").dynatree({
            fx: {
                height: "toggle",
                duration: 200
            } //Slide down animation
        });
        $("#drag-tree").dynatree({
            fx: {
                height: "toggle",
                duration: 200
            }, //Slide down animation
        });

        $("#check-tree").dynatree({
            checkbox: true,
            selectMode: 2,
            children: treeData,
            onSelect: function (select, node) {
                // Display list of selected nodes
                var selNodes = node.tree.getSelectedNodes();
                // convert to title/key array
                var selKeys = $.map(selNodes, function (node) {
                    return "[" + node.data.key + "]: '" + node.data.title + "'";
                });
                $("#echoSelection2").text(selKeys.join(", "));
            },
            onClick: function (node, event) {
                // We should not toggle, if target was "checkbox", because this
                // would result in double-toggle (i.e. no toggle)
                if (node.getEventTargetType(event) == "title")
                    node.toggleSelect();
            },
            onKeydown: function (node, event) {
                if (event.which == 32) {
                    node.toggleSelect();
                    return false;
                }
            },
            // The following options are only required, if we have more than one tree on one page:
            cookieId: "dynatree-Cb2",
            idPrefix: "dynatree-Cb2-"
        });


        /* Image preview */
        $("#path_product").on("change", function () {
            var _this = this;
            var image_preview = $("#image_preview_product");
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
                alert("Upload an image");
            }
        }
    });

</script>


@stop