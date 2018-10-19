@extends('layouts.backoffice.staff.app')
@section('before_css')
    <link href="{{asset('plugins/jquery-datatable/media/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/datatables-responsive/css/datatables.responsive.css') }}" rel="stylesheet" type="text/css" media="screen" /> 
    <link href="{{ asset('plugins/bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet" type="text/css" media="screen">
    <link href="{{ asset('plugins/switchery/css/switchery.min.css') }}" rel="stylesheet" type="text/css" media="screen" />
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
<<<<<<< HEAD
                    <a href="{{ url('/categories') }}">Attributes</a>
                </li>
                <li class="breadcrumb-item active">
                    ID : 1
=======
                    <a href="{{ url('/attributes') }}">attribute</a>
                </li>
                <li class="breadcrumb-item active">
                    ID : {{$attribute->id}}
>>>>>>> 7d67b7a45fedea0bff4e57ef3dcd901cfeccfdd2
                </li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb end -->

<div class="container-fluid container-fixed-lg">
    <div class="row">
        <div class="col-md-9">
            <div class="card ">
                <div class="card-header">
                    <div class="card-title">
<<<<<<< HEAD
                        Attribute id : 1 
=======
                        attribute id : {{$attribute->id}}
>>>>>>> 7d67b7a45fedea0bff4e57ef3dcd901cfeccfdd2
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
<<<<<<< HEAD
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>
                                        Name
                                    </h5>
                                    <p>
                                        Test
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>
                                        Description
                                    </h5>
                                    <p>
                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus dignissimos quam ipsam, cum assumenda unde hic, quos et fuga quo tenetur, fugiat in nostrum dolore dolorem rerum earum odio dolores?
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>  
                                        Categories using this attribute 
                                    </h5>
                                    <p>
                                        <a href="#" class="btn btn-tag btn-tag-light btn-tag-rounded m-r-5">Attr 1</a>
                                        <a href="#" class="btn btn-tag btn-tag-light btn-tag-rounded m-r-5">Attr 2</a>
                                        <a href="#" class="btn btn-tag btn-tag-light btn-tag-rounded m-r-5">Attr 3</a>
                                        <a href="#" class="btn btn-tag btn-tag-light btn-tag-rounded m-r-5">Attr 4</a>
                                    </p>
                                </div>
                            </div>
=======
                        <div class="col-md-12">
                            <h5>
                                Name
                            </h5>
                            <p>
                                @if($attribute->attributeLang->first()->reference==' '){{$attribute->attributeLangNotEmpty->first()->reference}} @else {{$attribute->attributeLang->first()->reference }}@endif
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h5>Type </h5> {{$attribute->type}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h5>
                                description
                            </h5>
                            <p>
                                @if($attribute->attributeLang->first()->description==' '){{$attribute->attributeLangNotEmpty->first()->description}} @else {{$attribute->attributeLang->first()->description }}@endif
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h5>
                                Categories using this attribute
                            </h5>
                            <p>
                             @foreach($attribute->categories as $category)
                            <a href="{{url('categories/'.$category->id)}}" class="btn btn-tag btn-tag-light btn-tag-rounded m-r-5">{{$category->categoryLang->first()->reference}}</a>
                            @endforeach
                                
                            </p>
>>>>>>> 7d67b7a45fedea0bff4e57ef3dcd901cfeccfdd2
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                Publish
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
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
<<<<<<< HEAD
                                    Status : <strong>Publish</strong>, <strong>Removed</strong>
=======
                                    Status : <strong>@if($attribute->deleted_at == NULL) Publish @else Removed @endif</strong>
>>>>>>> 7d67b7a45fedea0bff4e57ef3dcd901cfeccfdd2
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
<<<<<<< HEAD
                                    Creation date : <strong>10/18/2018 18:46:11</strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    Last update : <strong>10/18/2018 18:48:40</strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    Remove date : <strong>10/18/2018 18:49:22</strong>
                                </div>
                            </div>
                            <div class="row b-t b-dashed b-grey m-t-20 p-t-20">
                                <div class="col-md-6">
                                    <button class="btn btn-block "><i class="fas fa-pen"></i> <strong>Edit</strong></button>                                    
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-block btn-transparent-danger"><i class="fas fa-times"></i> <strong>Remove</strong></button>
                                </div>
=======
                                    Creation date : <strong>{{$attribute->created_at}}</strong>
                                </div>
                            </div>
                            @if($attribute->updated_at != NULL)
                            <div class="row">
                                <div class="col-md-12">
                                    Last update : <strong>{{$attribute->updated_at}}</strong>
                                </div>
                            </div>
                            @endif
                            @if($attribute->deleted_at != NULL)
                            <div class="row">
                                <div class="col-md-12">
                                    Remove date : <strong>{{$attribute->deleted_at}}</strong>
                                </div>
                            </div>
                            @endif
                            <div class="row b-t b-dashed b-grey m-t-20 p-t-20">
                                <div class="col-md-6">
                                    <a href="{{url('attributes/'.$attribute->id.'/edit')}}" class="btn btn-block "><i class="fas fa-pen"></i> <strong>Edit</strong></a>                                    
                                </div>

                                <div class="col-md-6">
                                @if($attribute->deleted_at == NULL)
                                    <a  href="{{route('delete.attribute',['attribute'=>$attribute->id])}}" data-method="delete"  data-token="{{csrf_token()}}" data-confirm="Are you sure?" class="btn btn-block btn-transparent-danger"><i class="fas fa-times"></i> <strong>Remove</strong></a>
                                @else
                                      <form action="{{url('attributes/'.$attribute->id.'/restore')}}" method="POST">
                                        {{ csrf_field() }}
                                        <button class="btn btn-block btn-transparent-danger" type="submit"><i class="fas fa-undo-alt"></i> <strong>Restore</strong></button>
                                        </form>
                                @endif
                                 </div>
>>>>>>> 7d67b7a45fedea0bff4e57ef3dcd901cfeccfdd2
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                Category translations
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
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
<<<<<<< HEAD
                                    Available in : <strong><a href="#">English</a></strong>, <strong><a href="#">Français</a></strong>  
                                </div>
                            </div>
                            <div class="row b-t b-dashed b-grey m-t-20 p-t-20">
                                <div class="col-md-12">
                                    <a class="btn btn-transparent"><i class="fas fa-plus"></i> <strong>Add an other translation</strong></a>                                    
                                </div>
                            </div>
=======
                                    Available in : 
                                     @foreach($attribute->attributeLangs as $attributeLang)
                                        @if($attributeLang->reference != " ")
                                            <strong><a href="#">{{$attributeLang->lang->name}}</a></strong> ,
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="row b-t b-dashed b-grey m-t-20 p-t-20">
                                <div class="col-md-12">
                                    <a href="{{url('attributes/'.$attribute->id.'/translations')}}" class="btn btn-transparent"><i class="fas fa-plus"></i> <strong>Add an other translation</strong></a>                                    
                                </div>
                            </div>
>>>>>>> 7d67b7a45fedea0bff4e57ef3dcd901cfeccfdd2
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @include('products.backoffice.staff.componments.table')
</div>
@endsection

@section('after_script')
    <script src="{{asset('plugins/jquery-datatable/media/js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/jquery-datatable/media/js/dataTables.bootstrap.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('plugins/datatables-responsive/js/datatables.responsive.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/datatables-responsive/js/lodash.min.js')}}"></script>

    <script>
    $(document).ready(function () {
        

        var table = $('#tableWithSearch');

        var settings = {
            "sDom": "<t><'row'<p i>>",
            "destroy": true,  
            "scrollCollapse": true,
            "order": [
                    [0, "desc"]
                ],
            "iDisplayLength": 10
        };

        table.dataTable(settings);

        // search box for table
        $('#search-table').keyup(function() {
            table.fnFilter($(this).val());
        });

            $('#tableWithSearch input[type=checkbox]').click(function() {
            if ($(this).is(':checked')) {
                $(this).closest('tr').addClass('selected');
                console.log($(this).closest('tr').html());

            } else {
                $(this).closest('tr').removeClass('selected');
            }

        });
    });
    </script>
@endsection
        