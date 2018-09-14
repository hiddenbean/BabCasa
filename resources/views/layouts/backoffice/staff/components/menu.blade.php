<div class="sidebar-menu">
    <!-- BEGIN SIDEBAR MENU ITEMS-->
    <ul class="menu-items"> 
        <li class="m-t-30 ">
            <a href="{{ url('/') }}" class="detailed">
                <span class="title">Dashboard</span> 
            </a>
            <span class="bg-primary icon-thumbnail"><i class="pg-home"></i></span>
        </li>  
        <li>
            <a href="{{ url('/staff') }}">
                <span class="title">Staff</span>
            </a>
            <span class="icon-thumbnail">
                <i class="fa fa-users"></i>
            </span> 
        </li>
        <li>
            <a href="{{ url('/partner') }}">
                <span class="title">Partner</span>
            </a>
            <span class="icon-thumbnail">
                <i class="fa fa-users"></i>
            </span> 
        </li> 
        <li>
            <a href="javascript:;">
                <span class="title">Clients</span>
                <span class="arrow"></span>
            </a>
            <span class="icon-thumbnail">
                <i class="fa fa-user-circle"></i>
            </span>
            <ul class="sub-menu">
                <li>
                    <a href="{{ url('/clients/business') }}">Clients business</a>
                    <span class="icon-thumbnail">CB</span>
                </li>
                <li>
                    <a href="{{ url('/clients/particular') }}">Clients particular</a>
                    <span class="icon-thumbnail">CP</span>
                </li> 
            </ul>
        </li>
        <li>
            <a href="{{ url('/categories') }}">
                <span class="title">Categories</span>
            </a>
            <span class="icon-thumbnail">
                <i class="fa fa-users"></i>
            </span> 
        </li>
        <li>
            <a href="{{ url('/claims') }}">
                <span class="title">Claims</span>
            </a>
            <span class="icon-thumbnail">
                <i class="fa fa-file"></i>
            </span> 
        </li> 
        <li>
            <a href="{{ url('/details') }}">
                <span class="title">Details</span>
            </a>
            <span class="icon-thumbnail">
                <i class="fa fa-align-justify"></i>
            </span> 
        </li>
        <li>
            <a href="{{ url('/currencies') }}">
                <span class="title">Currencies</span>
            </a>
            <span class="icon-thumbnail">
                <i class="fa fa-align-justify"></i>
            </span> 
        </li>
        <li>
            <a href="{{ url('/reasons') }}">
                <span class="title">Reasons</span>
            </a>
            <span class="icon-thumbnail">
                <i class="fa fa-align-justify"></i>
            </span> 
        </li>
        <li>
            <a href="{{ url('/countries') }}">
                <span class="title">Countries</span>
            </a>
            <span class="icon-thumbnail">
                <i class="fa fa-align-justify"></i>
            </span> 
        </li>
        <li>
            <a href="{{ url('/code_countries') }}">
                <span class="title">Code countries</span>
            </a>
            <span class="icon-thumbnail">
                <i class="fa fa-align-justify"></i>
            </span> 
        </li>
        <li>
            <a href="{{ url('/profile') }}">
                <span class="title">Account</span>
            </a>
            <span class="icon-thumbnail">
                <i class="fa fa-user"></i>
            </span> 
        </li>
        <li>
            <a href="javascript:;">
                <span class="title">Settings</span>
                <span class="arrow"></span>
            </a>
            <span class="icon-thumbnail">
                <i class="fa fa-cogs"></i>
            </span>
            <ul class="sub-menu"> 
                <li>
                    <a href="{{ url('/security') }}">Security</a>
                    <span class="icon-thumbnail">Se</span>
                </li>
                <li>
                    <a href="{{ url('/log') }}">Log</a>
                    <span class="icon-thumbnail">Lo</span>
                </li>
            </ul>
        </li> 
    </ul>
    <div class="clearfix"></div>
</div>