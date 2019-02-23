@extends('layouts.backoffice.partner.app')

@section('before_css')
<link type="text/css" rel="stylesheet" href="{{ asset('plugins/summernote/css/summernote.css') }}">
<link type="text/css" rel="stylesheet" href=" {{asset('plugins/dropzone/css/dropzone.css') }}">
<link media="screen" type="text/css" rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
@endsection

@section('breadcrumb')
    <!-- breadcrumb start -->
    <div class="container-fluid container-fixed-lg ">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">DASHBOARD</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ url('products') }}">Products</a>
                    </li>
                    <li class="breadcrumb-item active">
                        ADD
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-transparent">
                <div class="card-header p-l-0 p-r-0">
                    <div class="card-title">
                        Add a new product
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
                    </div>
                </div>
                <div class="card-body p-l-0 p-r-0">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>
                                Product infos
                            </h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Product name</label>
                                <input type="text" class="form-control" name="product_name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>SKU</label>
                                <input type="text" class="form-control" name="product_sku">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default form-group-default-select2">
                                <label>Product condition</label>
                                <select class="full-width" data-init-plugin="select2" name="product_condition">
                                    <option value="new">New</option>
                                    <option value="oem">OEM</option>
                                    <option value="nob">New Open Box</option>
                                    <option value="g3p">Generic - 3rd Party</option>
                                    <option value="refurbished">Refurbished & Factory Refurbished</option>
                                    <option value="used_ln">Used - Like New</option>
                                    <option value="used_vg">Used - Very Good</option>
                                    <option value="used_g">Used - Good</option>
                                    <option value="used">Used - Acceptable</option>
                                    <option value="as_is">"As Is"</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-default">
                                <div class="card-header">
                                    <div class="card-title">
                                        Product pictures
                                    </div>
                                </div>
                                <div class="card-body no-padding no-scoll">
                                    <form action="/file-upload" class="dropzone no-margin">
                                        <div class="fallback">
                                            <input name="product_main_pictures[]" type="file" multiple />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Stock and Variations</h3>
                        </div>
                    </div>
                    <div id="variations_container_ajax">
                        <div class="row">
                            <div class="col-md-6  p-r-5">
                                <div class="form-group form-group-default">
                                    <label>Unity price</label>
                                    <input type="text" class="form-control" name="reference">
                                </div>
                            </div>
                            <div class="col-md-6  p-l-5">
                                <div class="form-group form-group-default">
                                    <label>Stock</label>
                                    <input type="text" class="form-control" name="reference">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 m-b-15">
                                <form action="{{ url('attributes/list') }}" class="ajax">
                                    <input type="hidden" name="name_container" value="{{ str_random(40) }}">
                                    <button type="submit" class="btn btn-cons">
                                        Or, add variantes 
                                    </button>
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
                        <div class="col-md-12">
                            <h3>Product details</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default form-group-default-select2">
                                <label>categorie(s)</label>
                                <select class=" full-width" data-init-plugin="select2" multiple>
                                    <option value="Jim">Jim</option>
                                    <option value="John">John</option>
                                    <option value="Lucy">Lucy</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default form-group-default-select2">
                                <label>Tag(s)</label>
                                <select class=" full-width" data-init-plugin="select2" multiple>
                                    <option value="Jim">Jim</option>
                                    <option value="John">John</option>
                                    <option value="Lucy">Lucy</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Product Short description</label>
                                <textarea class="form-control" name="reference"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="summernote" class="upper-title p-t-5 p-b-5 p-l-10">Product HTML description</label>
                            <div class="summernote-wrapper bg-white">
                                <textarea id="summernote"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 product-preview-container">
            @include('products.backoffice.partners.components.product_preview')
        </div>
    </div>
@endsection

@section('before_script')
    <script type="text/javascript" src="{{ asset('plugins/classie/classie.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/multiselect/js/multiselect.min.js') }}"></script>   
    <script src="{{ asset('plugins/dropzone/dropzone.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>    
    <script type="text/javascript" src="{{ asset('plugins/summernote/js/summernote.min.js') }}"></script>
@endsection

@section('after_script')
    <script>
        $('#summernote').summernote({height: 250});

        function productPreviewWidth () {
            x = $(".product-preview-container").width()
            $(".product-preview").css('width', x)
        }

        $(window).resize(function() {
            productPreviewWidth()
        });

        $(window).scroll(function() {
            if($(window).scrollTop() >= 58) {
                productPreviewWidth();
                $(".product-preview").css({
                    'position':'fixed',
                    'top' : '74px'
                });
            }
            else {
                productPreviewWidth();
                $(".product-preview").css({
                    'position':'relative',
                    'top' : '0'
                });
            }
        });



        /** live preview js **/
        // product name
        $('input[name=product_name]').on('change', function() {
            $('#product_name_preview').html($('input[name=product_name]').val());
        });

        // product sku
        $('input[name=product_sku').on('change', function() {
            $('#product_sku_preview').html($('input[name=product_sku]').val());
        });

        // product condition
        $('select[name=product_condition]').on('change', function() {
            $('#product_condition_preview').html($('select[name=product_condition] option:selected').text());
        });
    </script>
@endsection