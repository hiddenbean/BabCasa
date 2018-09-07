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
            <a href="{{ url('/profile') }}">
                <span class="title">Account</span>
            </a>
            <span class="icon-thumbnail">
                <i class="fa fa-user"></i>
            </span> 
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
            <a href="{{ url('/staff') }}">
                <span class="title">Staff</span>
            </a>
            <span class="icon-thumbnail">
                <i class="fa fa-users"></i>
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
                    <a href="{{ url('/') }}">Newsletter suscription</a>
                    <span class="icon-thumbnail">NS</span>
                </li>
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
        <li>
            <a href="javascript:;">
                <span class="title">Support</span>
                <span class="arrow"></span>
            </a>
            <span class="icon-thumbnail">
                <i class="fa fa-exclamation-circle"></i>
            </span>
            <ul class="sub-menu">
                <li>
                    <a href="{{ url('/') }}">Mes tickets</a>
                    <span class="icon-thumbnail">MT</span>
                </li> 
                <li>
                    <a href="{{ url('/') }}">Créer</a>
                    <span class="icon-thumbnail">Cr</span>
                </li> 
            </ul>
        </li>
    </ul>
    <div class="clearfix"></div>
</div>