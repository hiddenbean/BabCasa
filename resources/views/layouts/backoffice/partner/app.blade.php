@extends('layouts.app')

@section('css')

@stop

@section('body')
<!-- BEGIN SIDEBPANEL-->
<nav class="page-sidebar" data-pages="sidebar"> 
  <!-- BEGIN SIDEBAR MENU HEADER-->
  <div class="sidebar-header">
    <span class="sidebar-logo-white">{{ config('app.name', 'KHBAR MDINTy') }}</span>
    <div class="sidebar-header-controls"> 
      <button type="button" class="btn btn-link d-lg-inline-block d-xlg-inline-block d-md-inline-block d-sm-none d-none" data-toggle-pin="sidebar"><i class="fa fs-12"></i>
      </button>
    </div>
  </div>
  <!-- END SIDEBAR MENU HEADER-->
  <!-- START SIDEBAR MENU -->
    @include('layouts.backoffice.partner.components.menu')
  <!-- END SIDEBAR MENU -->
</nav>
<!-- END SIDEBAR -->
<!-- END SIDEBPANEL-->
<!-- START PAGE-CONTAINER -->
<div class="page-container ">
  <!-- START HEADER -->
  @include('layouts.backoffice.partner.components.header')
  <!-- END HEADER -->
  <!-- START PAGE CONTENT WRAPPER -->
  <div class="page-content-wrapper ">

    <!-- START PAGE CONTENT -->
    <div class="content">
            @yield('content')
    </div>
    <!-- END PAGE CONTENT -->

    <!-- START FOOTER -->  
    @include('layouts.backoffice.partner.components.footer')
    <!-- END FOOTER -->  

  </div>
  <!-- END PAGE CONTENT WRAPPER -->
</div>
<!-- END PAGE CONTAINER -->
  
    
@stop

@section('script')
    
@stop



