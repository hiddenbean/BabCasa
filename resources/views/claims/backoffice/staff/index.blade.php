@extends('layouts.backoffice.staff.full_hight')

@section('before_css')
<link href="{{ asset('plugins/bootstrap3-wysihtml5/bootstrap3-wysihtml5.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('plugins/jquery-menuclipper/jquery.menuclipper.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('plugins/bootstrap-tag/bootstrap-tagsinput.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <!-- START APP -->
          <!-- START SECONDARY SIDEBAR MENU-->
          <nav class="secondary-sidebar">
            <div class=" m-b-30 m-l-30 m-r-30 d-sm-none d-md-block d-lg-block d-xl-block">
              <a href="email_compose.html" class="btn btn-complete btn-block btn-compose">New ticket</a>
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
                  <span class="title"><i class="pg-folder"></i>Open tickets</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="title"><i class="pg-sent"></i>Closed tickets</span>
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
          <div class="inner-content full-height">
            <div class="split-view">
              <!-- START SPLIT LIST VIEW -->
              <div class="split-list">
                <a class="list-refresh" href="#"><i class="fa fa-refresh"></i></a>
                <div data-email="list" class=" boreded no-top-border">
                  <!-- START EMAIL LIST SORTED BY DATE -->
                  <div data-email="list" class="boreded no-top-border list-view"><h2 class="list-view-fake-header">Today April 23</h2>
                    <!-- START EMAIL LIST SORTED BY DATE -->
                    <!-- END EMAIL LIST SORTED BY DATE -->
                    <div class="list-view-wrapper" data-ios="false">
                        <div class="list-view-group-container">
                            <div class="list-view-group-header"><span>Today April 23</span></div>
                            <ul class="no-padding">
                                <li class="item padding-15" data-email-id="1">
                                    <div class="avatar thumbnail-wrapper d32 circular"> <img width="40" height="40" alt="" data-src-retina="assets/img/profiles/avatar2x.jpg"
                                            data-src="assets/img/profiles/avatar.jpg" src="assets/img/profiles/avatar2x.jpg"> </div>
                                    <div class="checkbox  no-margin p-l-10"> <input type="checkbox" value="1" id="emailcheckbox-0-0">
                                        <label for="emailcheckbox-0-0"></label> </div>
                                    <div class="inline m-l-15">
                                        <p class="name recipients no-margin hint-text small">David Nester,Jane Smith</p>
                                        <p class="subject subject no-margin">Pages - Multi-Purpose Admin Template Revolution Begins here!</p>
                                        <p class="body no-margin"> Dear Sir or Madam:I have recently ordered a new pair of soccer cleats
                                            (item #6542951) from your website on June 21. I received the order on June 26. Unfortunately,
                                            when I opened it, I saw that the cleats were used. The cleats had dirt all over it and there
                                            was a small tear in front of the part where the left toe would go. My order number is
                                            AF26168156.To resolve the problem, I would like you to credit my account for the amount charged
                                            for my cleats; I have already went out and bought a new pair of cleats at my local sporting
                                            goods store so sending another would result in me having two pairs of the same cleats.Than you
                                            for taking the time to read this letter. I have been a satisfied customer of your company for
                                            many years and this is the first time I have encountered a problem. If you need to contact me,
                                            you can reach me at (555) 555-5555.Sincerely,Signature </p>
                                    </div>
                                    <div class="datetime">5 Mins ago</div>
                                    <div class="clearfix"></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    </div><!-- END EMAIL LIST SORTED BY DATE -->
                </div>
            </div>
            <!-- END SPLIT LIST VIEW -->
            <!-- START SPLIT DETAILS -->
            <div data-email="opened" class="split-details">
                <div class="no-result">
                    <h1>No ticket has been selected</h1>
                </div>
                <div class="email-content-wrapper" style="display:none">
                    <div class="actions-wrapper menuclipper bg-master-lightest">
                        <ul class="actions menuclipper-menu no-margin p-l-20 ">
                            <li class="visible-sm-inline-block visible-xs-inline-block">
                                <a href="#" class="email-list-toggle"><i class="fa fa-angle-left"></i> All Inboxes</a>
                            </li>
                            <li class="no-padding "><a href="#" class="text-info">Reply</a>
                            </li>
                            <li class="no-padding "><a href="#">Reply all</a>
                            </li>
                            <li class="no-padding "><a href="#">Forward</a>
                            </li>
                            <li class="no-padding "><a href="#">Mark as read</a>
                            </li>
                            <li class="no-padding "><a href="#" class="text-danger">Delete</a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="email-content">
                        <div class="email-content-header">
                            <div class="subject m-t-20 m-b-20 semi-bold">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="thumbnail-wrapper d48 circular bordered">
                            <img width="40" height="40" alt="" data-src-retina="assets/img/profiles/avatar2x.jpg" data-src="assets/img/profiles/avatar.jpg" src="assets/img/profiles/avatar2x.jpg">
                        </div>
                        <div class="sender inline m-l-10">
                            <p class="name no-margin bold">
                            </p>
                            <p class="datetime no-margin"></p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="email-content-body m-t-20 p-b-20 b-b b-dashed b-grey">
                        </div>
                        <div class="wysiwyg5-wrapper b-a b-grey m-t-30">
                            <textarea class="email-reply" placeholder="Reply"></textarea>
                        </div>
                    </div>
                </div>
                <!-- END SPLIT DETAILS -->
                <!-- START COMPOSE BUTTON FOR TABS -->
                <div class="compose-wrapper d-md-none">
                    <a class="compose-email text-info pull-right m-r-10 m-t-10" href="email_compose.html"><i class="fa fa-pencil-square-o"></i></a>
                </div>
                <!-- END COMPOSE BUTTON -->
            </div>
        </div>
        <!-- END APP -->

@endsection

@section('after_script')
<script src="{{ asset('plugins/bootstrap3-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script src="{{ asset('plugins/jquery-menuclipper/jquery.menuclipper.js')}}"></script>
<script src="{{ asset('plugins/bootstrap-tag/bootstrap-tagsinput.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('pages/js/pages.email.js')}}" type="text/javascript"></script>

@endsection