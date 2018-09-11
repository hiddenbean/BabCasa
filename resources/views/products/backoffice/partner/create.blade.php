@extends('layouts.backoffice.partner.app')
@section('css_before')
<link href="{{ asset('plugins/bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet" type="text/css" media="screen">
<link href="{{ asset('plugins/jquery-dynatree/skin/ui.dynatree.css') }}" rel="stylesheet" type="text/css" media="screen" /> 
@stop
@section('content')
<!-- breadcrumb start -->
<div class="container-fluid container-fixed-lg ">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">Tableau de borad</a>
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
                    <form id="form-personal">
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
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Quantity</label>
                                        <input type="text" class="form-control error" name="quantity">
                                    </div>
                                </div>
                            </div>
                        <button class="btn btn-primary" type="submit">Save</button>
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

<script type="text/javascript">
    $(document).ready(function () {
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


    });

</script>


@stop