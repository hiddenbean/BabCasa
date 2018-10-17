@extends('layouts.backoffice.staff.app')


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
                    <a href="{{ url('/partners') }}">Partner</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{url('partners/'.$partner->name)}}">{{$partner->company_name}}</a>
                </li>
                <li class="breadcrumb-item active">
                    Orders
                </li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb end -->
<!-- START SECONDARY SIDEBAR -->
<nav class="secondary-sidebar"> 
        <p class="menu-title">Sttings</p>
        <ul class="main-menu"> 
         <li >
                <a href="{{url('partners/'.$partner->name)}}">
                <span class="title"><i class="pg-folder"></i>Partner Information</span>
                </a> 
            </li>
             <li>
                <a href="{{url('partners/'.$partner->name.'/statuses')}}">
                <span class="title"><i class="pg-folder"></i>Statuses history</span>
                </a> 
            </li>
            <li>
                <a href="{{url('partners/'.$partner->name.'/products')}}">
                <span class="title"><i class="pg-folder"></i>products</span>
                </a> 
            </li>
            <li class="active">
                <a href="#">
                    <span class="title"><i class="pg-sent"></i>orders</span>
                </a>
            </li> 
            <li>
                <a href="{{url('partners/'.$partner->name.'/discounts')}}">
                    <span class="title"><i class="pg-sent"></i>discounts</span>
                </a>
            </li> 
            <li>
                <a href="{{url('partners/'.$partner->name.'/bills')}}">
                    <span class="title"><i class="pg-sent"></i>bills</span>
                </a>
            </li> 
        </ul> 
    </nav>
<!-- END SECONDARY SIDEBAR  -->
    <div class="inner-content full-height padding-20">
        <table id="tableWithSearch" class="table table-hover no-footer table-responsive-block" cellspacing="0" width="100%">
            <thead>
                <th style="width:5%">id</th>
                <th style="width:50%" class="text-center">order</th>
                <th style="width:15%" class="text-center">client</th>
                <th style="width:15%" class="text-center">date</th>
                <th style="width:15%" class="text-center">statu</th>                
            </thead>
    
            <tbody>
              
                    <tr class="selected">
                        <td class="v-align-middle text-center"><a href="#">1</a></td>
                        <td class="v-align-middle"><a href="#"><strong>Order 1</strong></a></td>                    
                        <td class="v-align-middle text-center"><a href="#">hossin el ghazeli</a></td>
                        <td class="v-align-middle text-center">18-05-14</td>
                        <td class="v-align-middle text-center"><a href="#">waiting</a></td>
                    </tr>
                    <tr class="order-progress">
                        <td class="v-align-middle text-center"><a href="#">2</a></td>
                        <td class="v-align-middle"><a href="#"><strong>Order 2</strong></a></td>                    
                        <td class="v-align-middle text-center"><a href="#">ayoub moumin</a></td>
                        <td class="v-align-middle text-center">18-05-10</td>
                        <td class="v-align-middle text-center"><a href="#">in progress</a></td>
                    </tr>
                    <tr class="">
                        <td class="v-align-middle text-center"><a href="#">3</a></td>
                        <td class="v-align-middle"><a href="#"><strong>Order 3</strong></a></td>                    
                        <td class="v-align-middle text-center"><a href="#">rachid daim</a></td>
                        <td class="v-align-middle text-center">18-05-12</td>
                        <td class="v-align-middle text-center"><a href="#">completed</a></td>
                    </tr>
                    <tr class="order-revok">
                        <td class="v-align-middle text-center"><a href="#">4</a></td>
                        <td class="v-align-middle"><a href="#"><strong>Order 4</strong></a></td>                    
                        <td class="v-align-middle text-center"><a href="#">omar lmatchi</a></td>
                        <td class="v-align-middle text-center">18-05-25</td>
                        <td class="v-align-middle text-center"><a href="#">canceled</a></td>
                    </tr>
            </tbody>
        </table>
    </div>
</div>
<div id="result"></div>
@endsection

@section('table_javascript')

    <script>
        $(document).ready(function () {
            $('.order-progress td').css('background-color', '#cff5f2');

            $('.order-revok td').css('background-color', '#fddddd');

            var table = $('#tableWithSearch');

            var settings = {
                "sDom": "<t><'row'<p i>>",
                "destroy": true,
                "scrollCollapse": true,
                "order": [
                    [0, "desc"]
                ],
                "oLanguage": {
                    "sProcessing":     "Traitement en cours...",
                    "sSearch":         "Rechercher&nbsp;:",
                    "sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
                    "sInfo":           "Affichage de l'&eacute;l&eacute;ment <b>_START_ &agrave; _END_</b> sur <b>_TOTAL_ &eacute;l&eacute;ments</b>",
                    "sInfoEmpty":      "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
                    "sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                    "sInfoPostFix":    "",
                    "sLoadingRecords": "Chargement en cours...",
                    "sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
                    "sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
                    "oPaginate": {
                        "sFirst":      "Premier",
                        "sPrevious":   "Pr&eacute;c&eacute;dent",
                        "sNext":       "Suivant",
                        "sLast":       "Dernier"
                    },
                    "oAria": {
                        "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                        "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
                    }
                },
                "iDisplayLength": 10,
            };
            table.dataTable(settings);
        });
    </script>
    
   

@endsection