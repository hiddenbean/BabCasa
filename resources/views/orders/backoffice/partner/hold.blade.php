@extends('orders.backoffice.index.app')

@section('breadcrumb')
    <!-- breadcrumb start -->
    <div class="container-fluid container-fixed-lg ">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">{{__('backoffice.partner.system.dashboard.table')}}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ url('/commandes') }}">{{__('backoffice.partner.layouts.menu.orders')}}</a>
                    </li>
                    <li class="breadcrumb-item active">
                        {{__('backoffice.partner.layouts.menu.waiting')}}
                    </li>
                    @yield('breadcrumb')
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->
@endsection

@section('table')
<div class="card card-transparent">
    <div class="card-header">
        <div class="card-title">{{__('backoffice.partner.orders.hold.orders_hold')}}</div>
        <div class="clearfix"></div>
    </div>
    <div class="card-block">
        <table id="tableWithSearch" class="table table-hover no-footer table-responsive-block" cellspacing="0" width="100%">
            <thead>
                <th style="width:10%" class="text-center"></th>
                <th style="width:10%" class="text-center"></th>
                <th style="width:5%">{{__('backoffice.partner.orders.all.id')}}</th>        
                <th style="width:50%" class="text-center">{{__('backoffice.partner.orders.all.order')}}</th>
                <th style="width:15%" class="text-center">{{__('backoffice.partner.orders.all.client')}}</th>
                <th style="width:10%" class="text-center">{{__('backoffice.partner.orders.all.date')}}</th>
            </thead>
    
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td class="v-align-middle text-center"><a href="{{ url('/commandes/'.$order->id.'/accepter') }}"><i class="fa fa-check"></i> {{__('backoffice.partner.orders.hold.accept')}}</a></td>
                        <td class="v-align-middle text-center"><a href="{{ url('/commandes/'.$order->id.'/rejeter') }}"><i class="fa fa-close"></i> {{__('backoffice.partner.orders.hold.reject')}}</a></td>
                        <td class="v-align-middle text-center"><a href="{{ url('/commandes/'.$order->id) }}">{{ $order->id }}</a></td>
                        <td class="v-align-middle"><a href="{{ url('/commandes/'.$order->id) }}"><strong>@foreach($order->goods as $good)(x{{ $good->pivot->quantity }}) {{ $good->name }}<br> @endforeach</strong></a></td>                    
                        <td class="v-align-middle text-center"><a href="{{ url('clients/'.$order->finaleClient->id) }}">{{ $order->finaleClient->first_name }} {{ $order->finaleClient->last_name }}</a></td>
                        <td class="v-align-middle text-center">
                            @if( strtotime(date('y-m-d H:i:s')) - strtotime($order->created_at) < 60)
                                <br> à l'instant
                            @elseif( strtotime(date('y-m-d H:i:s')) - strtotime($order->created_at) < 3600)
                                <br>Il y a {{  round((strtotime(date('y-m-d H:i:s')) - strtotime($order->created_at))/60) }} min
                            @elseif( strtotime(date('y-m-d H:i:s')) - strtotime($order->created_at) > 3600 && strtotime(date('y-m-d H:i:s')) - strtotime($order->created_at) < 86400 )
                                <br>Il y a {{  round((strtotime(date('y-m-d H:i:s')) - strtotime($order->created_at))/60/60) }} heurs
                            @else
                                <br>Le {{  date('y-m-d H:i:s', strtotime($order->created_at)) }}                    
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
    
@endsection

@section('table_javascript')

    <script>
        $(document).ready(function () {
            var table = $('#tableWithSearch');

            var settings = {
                "sDom": "<t><'row'<p i>>",
                "destroy": true,
                "scrollCollapse": true,
                "aoColumnDefs": [{
                    'bSortable': false,
                    'aTargets': [0,1]
                }],
                "order": [
                    [2, "desc"]
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
        });
    </script>

@endsection