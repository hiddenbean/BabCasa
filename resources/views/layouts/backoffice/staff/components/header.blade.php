<div class="header ">
  <!-- START MOBILE SIDEBAR TOGGLE -->
  <a href="#" class="btn-link toggle-sidebar d-lg-none pg pg-menu" data-toggle="sidebar">
  </a>
  <!-- END MOBILE SIDEBAR TOGGLE -->
  <div class="">
    <div class="brand inline">
      <a href="{{ url('/') }}">
        <span class="sidebar-logo-black">
          <img src="{{ asset('img/logo.png') }}" alt="{{ config('app.name', 'BAB Casa') }}" height="30">
        </span>
      </a>
    </div>
    <!-- START NOTIFICATION LIST -->
    <ul class="d-lg-inline-block d-none notification-list no-margin d-lg-inline-block b-grey b-l b-r no-style p-l-30 p-r-20">
      <li class="p-r-10 inline">
        <div class="dropdown">
          <a href="javascript:;" id="notification-center" class="header-icon pg pg-world" data-toggle="dropdown">
            <span class="bubble"></span>
          </a>
          <!-- START Notification Dropdown -->
          <div class="dropdown-menu notification-toggle" role="menu" aria-labelledby="notification-center">
            <!-- START Notification -->
            <div class="notification-panel">
              <!-- START Notification Body-->
              <div class="notification-body scrollable">
                <!-- START Notification Item-->
                <div class="notification-item unread clearfix">
                  <!-- START Notification Item Right Side-->
                  <div class="option" data-toggle="tooltip" data-placement="left" title="mark as read">
                    <a href="#" class="mark"></a>
                  </div>
                  <!-- END Notification Item Right Side-->
                </div>
                <!-- START Notification Body-->
                <!-- START Notification Item-->
                <div class="notification-item  clearfix">
                  <div class="heading">
                    <a href="#" class="text-warning-dark pull-left">
                      <i class="fa fa-exclamation-triangle m-r-10"></i>
                      <span class="bold">Warning Notification</span>
                      <span class="fs-12 m-l-10">Buy Now</span>
                    </a>
                    <span class="pull-right time">yesterday</span>
                  </div>
                  <!-- START Notification Item Right Side-->
                  <div class="option">
                    <a href="#" class="mark"></a>
                  </div>
                  <!-- END Notification Item Right Side-->
                </div>
                <!-- END Notification Item-->
                <!-- START Notification Item-->
                <div class="notification-item unread clearfix">
                  <div class="heading">
                    <div class="thumbnail-wrapper d24 circular b-white m-r-5 b-a b-white m-t-10 m-r-10">
                      <img width="30" height="30" data-src-retina="{{ asset('img/profiles/2x.jpg') }}" data-src="{{ asset('img/profiles/2x.jpg') }}"
                        alt="" src="{{ asset('img/profiles/2.jpg') }}">
                    </div>
                    <a href="#" class="text-complete pull-left">
                      <span class="bold">Abde Rahman Quraishi</span>
                      <span class="fs-12 m-l-10">Owners</span>
                    </a>
                    <span class="pull-right time">11:00pm</span>
                  </div>
                  <!-- START Notification Item Right Side-->
                  <div class="option" data-toggle="tooltip" data-placement="left" title="mark as read">
                    <a href="#" class="mark"></a>
                  </div>
                  <!-- END Notification Item Right Side-->
                </div>
                <!-- END Notification Item-->
              </div>
              <!-- END Notification Body-->
              <!-- START Notification Footer-->
              <div class="notification-footer text-center">
                <a href="#" class="">Read all notifications</a>
                <a data-toggle="refresh" class="portlet-refresh text-black pull-right" href="#">
                  <i class="pg-refresh_new"></i>
                </a>
              </div>
              <!-- START Notification Footer-->
            </div>
            <!-- END Notification -->
          </div>
          <!-- END Notification Dropdown -->
        </div>
      </li>
    </ul>
    <!-- END NOTIFICATIONS LIST -->

  </div>
  <div class="d-flex align-items-center">
    <!-- START User Info-->
    <div class="pull-left p-r-10 fs-14 font-heading d-lg-block d-none">
      <span class="semi-bold">{{{ Auth::guard('staff')->user()->first_name.' '.Auth::guard('staff')->user()->last_name }}}</span>
    </div>
    <div class="dropdown pull-right d-lg-block d-none">
      <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="thumbnail-wrapper d32 circular inline">
          <img src="{{ Storage::url(Auth::guard('staff')->user()->picture->path) }}" alt="" data-src="{{ Storage::url( Auth::guard('staff')->user()->picture->path) }}"
            data-src-retina="{{ Storage::url( Auth::guard('staff')->user()->picture->path) }}" width="32" height="32">
            <span><i class="fa fa-lg fa-user text-secondary"></i></span>
        </span>
      </button>
      <div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
        <a href="{{ url('/profile')}}" class="dropdown-item">
          <i class="pg-settings_small"></i> Settings</a>  
        <a href="{{ url('/logout')}}" class="clearfix bg-master-lighter dropdown-item">
          <span class="pull-left">Logout</span>
          <span class="pull-right">
            <i class="pg-power"></i> 
          </span>
        </a>
      </div>
    </div>
    <!-- END User Info-->
  </div>
</div>