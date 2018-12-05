@extends('layouts.backoffice.staff.full_hight')

@section('before_css')
<link href="{{ asset('plugins/bootstrap3-wysihtml5/bootstrap3-wysihtml5.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('plugins/jquery-menuclipper/jquery.menuclipper.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('plugins/bootstrap-tag/bootstrap-tagsinput.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('pages/css/editor.css')}}" rel="stylesheet" type="text/css" />

@endsection

@section('content')
    <!-- START APP -->
          <!-- START SECONDARY SIDEBAR MENU-->
          <nav class="secondary-sidebar">
            <div class=" m-b-30 m-l-30 m-r-30 d-sm-none d-md-block d-lg-block d-xl-block">
              <a href="email_compose.html" class="btn btn-primary btn-block uppercase">New ticket</a>
            </div>
            <p class="menu-title">BROWSE</p>
            <ul class="main-menu">
              <li class="active">
                <a href="#">
                  <span class="title"><i class="pg-inbox"></i>All tickets</span>
                  <span class="badge pull-right">5</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="title"><i class="fas fa-folder-open"></i>Open tickets</span>
                </a>
              </li>
              <li>
                <a href="#">
                    <span class="title"><i class="fas fa-folder-minus"></i>Closed tickets</span>
                </a>
              </li>
            </ul>
            <p class="menu-title m-t-20 all-caps">Subjects</p>
            <ul class="sub-menu no-padding">
              <li>
                <a href="#">
                  <span class="title">Subjects1</span>
                  <span class="badge pull-right">5</span>
                </a>
              </li>
            </ul>
          </nav>
          <!-- END SECONDARY SIDEBAR MENU -->

          <!-- app -->
          <div class="inner-content full-height">
            @include('claims.backoffice.staff.body')*
          </div>
          <!-- app end -->

@endsection

@section('after_script')
<script src="{{ asset('plugins/bootstrap3-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script src="{{ asset('plugins/jquery-menuclipper/jquery.menuclipper.js')}}"></script>
<script src="{{ asset('plugins/bootstrap-tag/bootstrap-tagsinput.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('pages/js/pages.email.js')}}" type="text/javascript"></script>

@endsection