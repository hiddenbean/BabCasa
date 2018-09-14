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
                        {{__('backoffice.partner.layouts.menu.completed')}}
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
            <div class="card-title">{{__('backoffice.partner.orders.finish.list_orders_completed')}}</div>
            <div class="clearfix"></div>
        </div>
        <div class="card-block">
            <table id="tableWithSearch" class="table table-hover no-footer table-responsive-block" cellspacing="0" width="100%">
                <thead>
                    <th style="width:5%">{{__('backoffice.partner.orders.all.id')}}</th>
                    <th style="width:50%" class="text-center">{{__('backoffice.partner.orders.all.order')}}</th>
                    <th style="width:15%" class="text-center">{{__('backoffice.partner.orders.all.client')}}</th>
                    <th style="width:15%" class="text-center">{{__('backoffice.partner.orders.aboard.order_date')}}</th>
                    <th style="width:15%" class="text-center">{{__('backoffice.partner.orders.finish.date_termination')}}</th>
                </thead>
        
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td class="v-align-middle text-center"><a href="{{ url('/commandes/'.$order->id) }}">{{ $order->id }}</a></td>
                            <td class="v-align-middle"><a href="{{ url('/commandes/'.$order->id) }}"><strong>@foreach($order->goods as $good)(x{{ $good->pivot->quantity }}) {{ $good->name }}<br> @endforeach</strong></a></td>                    
                        <td class="v-align-middle text-center"><a href="{{ url('clients/'.$order->finaleClient->id) }}">{{ $order->finaleClient->first_name }} {{ $order->finaleClient->last_name }}</a></td>
                            <td class="v-align-middle text-center">{{$order->created_at}}</td>
                            <td class="v-align-middle text-center">{{ $order->delivered_at }}</td>
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
        });
    </script>

@endsection