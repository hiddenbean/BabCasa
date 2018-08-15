@extends('layouts.backoffice.partner.app')

@section('css_before')
<link href="{{asset('plugins/jquery-datatable/media/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{asset('plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{asset('plugins/datatables-responsive/css/datatables.responsive.css') }}" rel="stylesheet" type="text/css" media="screen" /> 
@endsection

@section('content')
    <!-- breadcrumb start -->
    <div class="container-fluid container-fixed-lg ">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">Tableau de borad</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Support
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->
    <div class="container-fluid container-fixed-lg bg-white">
        <div class="card card-transparent">
            <div class="card-header">
                <div class="card-title">Liste des tickets</div>
                <div class="pull-right">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-md-6 text-right no-padding">
                                <a href="" class="btn btn-success btn-cons">Nouveau ticket</a>
                            </div>
                            <div class="col-md-6">
                                <input type="text" id="search-table" class="form-control pull-right" placeholder="Rechercher">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                
            </div>
            <div class="card-body">
                <table id="tableWithSearch" class="table table-hover no-footer table-responsive-block" cellspacing="0" width="100%">
                    <thead>
                        <th style="width:20%" class="text-center">Titre</th>
                        <th style="width:10%" class="text-center">Sujet</th>
                        <th style="width:10%" class="text-center">Date de création</th>
                        <th style="width:10%" class="text-center">Nombre messages</th>
                        <th style="width:10%" class="text-center">Etat</th>                
                    </thead>
            
                    <tbody> 
                        <tr class="order-progress"  >
                            <td class="v-align-middle"><a href=""><strong>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolor dolores, </strong></a></td>
                            <td class="v-align-middle text-center"><strong> Subject title </strong></td>                
                            <td class="v-align-middle text-center">15/08/2018 10:25:53</td>              
                            <td class="v-align-middle text-center">25</td> 
                            <td class="v-align-middle text-center"><strong> Ouvert </strong></td> 
                        </tr>
                        <tr  >
                            <td class="v-align-middle"><a href=""><strong>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolor dolores, </strong></a></td>
                            <td class="v-align-middle text-center"><strong> Subject title </strong></td>                
                            <td class="v-align-middle text-center">15/08/2018 10:25:53</td>              
                            <td class="v-align-middle text-center">25</td> 
                            <td class="v-align-middle text-center"><strong> Ouvert </strong></td> 
                        </tr>
                        <tr  >
                            <td class="v-align-middle"><a href=""><strong>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolor dolores, </strong></a></td>
                            <td class="v-align-middle text-center"><strong> Subject title </strong></td>                
                            <td class="v-align-middle text-center">15/08/2018 10:25:53</td>              
                            <td class="v-align-middle text-center">25</td> 
                            <td class="v-align-middle text-center"><strong> Ouvert </strong></td> 
                        </tr>
                        <tr  >
                            <td class="v-align-middle"><a href=""><strong>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolor dolores, </strong></a></td>
                            <td class="v-align-middle text-center"><strong> Subject title </strong></td>                
                            <td class="v-align-middle text-center">15/08/2018 10:25:53</td>              
                            <td class="v-align-middle text-center">25</td> 
                            <td class="v-align-middle text-center"><strong> Ouvert </strong></td> 
                        </tr>
                        <tr  >
                            <td class="v-align-middle"><a href=""><strong>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolor dolores, </strong></a></td>
                            <td class="v-align-middle text-center"><strong> Subject title </strong></td>                
                            <td class="v-align-middle text-center">15/08/2018 10:25:53</td>              
                            <td class="v-align-middle text-center">25</td> 
                            <td class="v-align-middle text-center"><strong> Ouvert </strong></td> 
                        </tr>
                        <tr  >
                            <td class="v-align-middle"><a href=""><strong>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolor dolores, </strong></a></td>
                            <td class="v-align-middle text-center"><strong> Subject title </strong></td>                
                            <td class="v-align-middle text-center">15/08/2018 10:25:53</td>              
                            <td class="v-align-middle text-center">25</td> 
                            <td class="v-align-middle text-center"><strong> Ouvert </strong></td> 
                        </tr>
                        <tr  >
                            <td class="v-align-middle"><a href=""><strong>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolor dolores, </strong></a></td>
                            <td class="v-align-middle text-center"><strong> Subject title </strong></td>                
                            <td class="v-align-middle text-center">15/08/2018 10:25:53</td>              
                            <td class="v-align-middle text-center">25</td> 
                            <td class="v-align-middle text-center"><strong> Ouvert </strong></td> 
                        </tr>
                        <tr  >
                            <td class="v-align-middle"><a href=""><strong>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolor dolores, </strong></a></td>
                            <td class="v-align-middle text-center"><strong> Subject title </strong></td>                
                            <td class="v-align-middle text-center">15/08/2018 10:25:53</td>              
                            <td class="v-align-middle text-center">25</td> 
                            <td class="v-align-middle text-center"><strong> Ouvert </strong></td> 
                        </tr>
                        <tr  >
                            <td class="v-align-middle"><a href=""><strong>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolor dolores, </strong></a></td>
                            <td class="v-align-middle text-center"><strong> Subject title </strong></td>                
                            <td class="v-align-middle text-center">15/08/2018 10:25:53</td>              
                            <td class="v-align-middle text-center">25</td> 
                            <td class="v-align-middle text-center"><strong> Ouvert </strong></td> 
                        </tr>
                        <tr  >
                            <td class="v-align-middle"><a href=""><strong>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolor dolores, </strong></a></td>
                            <td class="v-align-middle text-center"><strong> Subject title </strong></td>                
                            <td class="v-align-middle text-center">15/08/2018 10:25:53</td>              
                            <td class="v-align-middle text-center">25</td> 
                            <td class="v-align-middle text-center"><strong> Ouvert </strong></td> 
                        </tr>
                        <tr  >
                            <td class="v-align-middle"><a href=""><strong>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolor dolores, </strong></a></td>
                            <td class="v-align-middle text-center"><strong> Subject title </strong></td>                
                            <td class="v-align-middle text-center">15/08/2018 10:25:53</td>              
                            <td class="v-align-middle text-center">25</td> 
                            <td class="v-align-middle text-center"><strong> Ouvert </strong></td> 
                        </tr>
                       
                    </tbody>
                </table>
            </div>
        </div> 
    </div>
    
@endsection

@section('script')
        <script src="{{asset('plugins/jquery-datatable/media/js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('plugins/jquery-datatable/media/js/dataTables.bootstrap.js')}}" type="text/javascript"></script>
        <script src="{{asset('plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js')}}" type="text/javascript"></script>
        <script type="text/javascript" src="{{asset('plugins/datatables-responsive/js/datatables.responsive.js')}}"></script>
        <script type="text/javascript" src="{{asset('plugins/datatables-responsive/js/lodash.min.js')}}"></script>

        <script>
        $(document).ready(function () {
            $('.order-progress td').css('background-color', '#cff5f2');

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
                "iDisplayLength": 10
            };

            table.dataTable(settings);

            // search box for table
            $('#search-table').keyup(function() {
                table.fnFilter($(this).val());
            });
        });
    </script>

@endsection