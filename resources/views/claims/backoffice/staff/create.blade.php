@extends('layouts.backoffice.staff.full_hight')

@section('before_css')
<link href="{{ asset('plugins/bootstrap3-wysihtml5/bootstrap3-wysihtml5.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('plugins/jquery-menuclipper/jquery.menuclipper.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('plugins/bootstrap-tag/bootstrap-tagsinput.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('pages/css/editor.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css"/>

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
<!-- END SECONDARY SIDEBAR MENU -->
<div class="inner-content full-height">
        <!-- START COMPOSE EMAIL -->
        <div class="email-composer container-fluid">
            <div class="row">
                <div class="col-sm-12 no-padding">
                    <div class="wysiwyg5-wrapper email-toolbar-wrapper">
                    </div>
                    <form id="form-project" role="form" autocomplete="off">
                        <div class="form-group-attached">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-group form-group-default form-group-default-select2">
                                            <label>To</label>
                                            <select class=" full-width" data-init-plugin="select2">
                                                <optgroup label="Clients">
                                                    <option value="Jim">Jim</option>
                                                    <option value="John">John</option>
                                                    <option value="Lucy">Lucy</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-group form-group-default form-group-default-select2">
                                            <label>Subject</label>
                                            <select class=" full-width" data-init-plugin="select2">
                                                <option value="Jim">Jim</option>
                                                <option value="John">John</option>
                                                <option value="Lucy">Lucy</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default required">
                                        <label>Title</label>
                                        <input type="text" class="form-control" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="wysiwyg5-wrapper email-body-wrapper">
                        <textarea class="wysiwyg email-body" style="height:350px"></textarea>
                    </div>
                </div>
            </div>
            <div class="row p-b-20">
                <div class="col-sm-11">
                    <button class="btn btn-white btn-cons">Cancel</button>
                    <button class="btn btn-primary btn-cons">Send</button>
                </div>
            </div>
        </div>
        <!-- END COMPOSE EMAIL -->
    </div>
    <!-- app end -->

@endsection
@section('before_script')
<script src="{{ asset('plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>    
@endsection

@section('after_script')
<script src="{{ asset('plugins/bootstrap3-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script src="{{ asset('plugins/jquery-menuclipper/jquery.menuclipper.js')}}"></script>
<script src="{{ asset('plugins/bootstrap-tag/bootstrap-tagsinput.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('pages/js/pages.email.js')}}" type="text/javascript"></script>
@endsection

