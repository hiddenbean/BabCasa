@extends('layouts.backoffice.app') 

@section('body')
<!-- BEGIN SIDEBPANEL-->
<nav class="page-sidebar" data-pages="sidebar">
  <!-- BEGIN SIDEBAR MENU HEADER-->
  <div class="sidebar-header">
      <a href="{{ url('/') }}">
        <span class="sidebar-logo-white">
          <img src="{{ asset('img/logo_white.png') }}" alt="{{ config('app.name', 'BAB Casa') }}" height="30">
        </span>
      </a> 
    <div class="sidebar-header-controls">
      <button type="button" class="btn btn-link d-lg-inline-block d-xlg-inline-block d-md-inline-block d-sm-none d-none" data-toggle-pin="sidebar">
        <i class="fa fs-12"></i>
      </button>
    </div>
  </div>
  <!-- END SIDEBAR MENU HEADER-->
  <!-- START SIDEBAR MENU -->
  @include('layouts.backoffice.staff.components.menu')
  <!-- END SIDEBAR MENU -->
</nav>
<!-- END SIDEBAR -->
<!-- END SIDEBPANEL-->
<!-- START PAGE-CONTAINER -->
<div class="page-container ">
  <!-- START HEADER -->
  @include('layouts.backoffice.staff.components.header')
  <!-- END HEADER -->
  <!-- START PAGE CONTENT WRAPPER -->
  <div class="page-content-wrapper ">

  <!-- START PAGE CONTENT -->
  <div class="content">
    @yield('content')
  </div>
  <!-- END PAGE CONTENT -->

  <!-- START FOOTER -->
  @include('layouts.backoffice.staff.components.footer')
  <!-- END FOOTER -->

  </div>
  <!-- END PAGE CONTENT WRAPPER -->
</div>
<!-- END PAGE CONTAINER -->
@stop 