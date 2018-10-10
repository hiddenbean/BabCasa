<div class="sidebar-menu">
    <!-- BEGIN SIDEBAR MENU ITEMS-->
    <ul class="menu-items">
    @if (auth()->guard('staff')->user()->can('read','dashboard'))
        <li class="m-t-30 ">
            <a href="{{ url('/') }}" class="detailed">
                <span class="title">Dashboard</span>
            </a>
            <span class="bg-primary icon-thumbnail"><i class="pg-home"></i></span>
        </li>
        @endif
         @if (auth()->guard('staff')->user()->can('read','staff'))
        <li>
            <a href="{{ url('/staff') }}">
                <span class="title">Staff</span>
            </a>
            <span class="icon-thumbnail">
                <i class="fa fa-users"></i>
            </span>
        </li>
        @endif
         @if (auth()->guard('staff')->user()->can('read','partner'))
        <li>
            <a href="{{ url('/partners') }}">
                <span class="title">Partner</span>
            </a>
            <span class="icon-thumbnail">
                <i class="fa fa-users"></i>
            </span>
        </li>
        @endif
        <li>
            <a href="javascript:;">
                <span class="title">Clients</span>
                <span class="arrow"></span>
            </a>
            <span class="icon-thumbnail">
                <i class="fa fa-user-circle"></i>
            </span>
            <ul class="sub-menu">
         @if (auth()->guard('staff')->user()->can('read','business_client'))
                <li>
                    <a href="{{ url('/clients/businesses') }}">Clients business</a>
                    <span class="icon-thumbnail">CB</span>
                </li>
        @endif
         @if (auth()->guard('staff')->user()->can('read','particularCostumer'))
                <li>
                    <a href="{{ url('/clients/particular') }}">Clients particular</a>
                    <span class="icon-thumbnail">CP</span>
                </li>
        @endif
            </ul>
        </li>
         @if (auth()->guard('staff')->user()->can('read','category'))
        <li>
            <a href="{{ url('/categories') }}">
                <span class="title">Categories</span>
            </a>
            <span class="icon-thumbnail">
                <i class="fa fa-copy"></i>
            </span>
        </li> 
        @endif
         @if (auth()->guard('staff')->user()->can('read','detail'))
        <li>
            <a href="{{ url('/details') }}">
                <span class="title">Details</span>
            </a>
            <span class="icon-thumbnail">
                <i class="fa fa-align-justify"></i>
            </span>
        </li>
        @endif
         @if (auth()->guard('staff')->user()->can('read','tag'))
        <li>
            <a href="{{ url('/tags') }}">
                <span class="title">Tags</span>
            </a>
            <span class="icon-thumbnail">
                <i class="fa fa-tag"></i>
            </span>
        </li>
        @endif
         @if (auth()->guard('staff')->user()->can('read','currency'))
        <li>
            <a href="{{ url('/currencies') }}">
                <span class="title">Currencies</span>
            </a>
            <span class="icon-thumbnail">
                <i class="fa fa-dollar"></i>
            </span>
        </li>
        @endif
         @if (auth()->guard('staff')->user()->can('read','reason'))
        <li>
            <a href="{{ url('/reasons') }}">
                <span class="title">Reasons</span>
            </a>
            <span class="icon-thumbnail">
                <i class="fa fa-file"></i>
            </span>
        </li>
        @endif
         @if (auth()->guard('staff')->user()->can('read','country'))
        <li>
            <a href="{{ url('/countries') }}">
                <span class="title">Countries</span>
            </a>
            <span class="icon-thumbnail">
                <i class="fa fa-globe"></i>
            </span>
        </li>
        @endif
         @if (auth()->guard('staff')->user()->can('read','claim'))
        <li>
                <a href="javascript:;">
                    <span class="title">support</span>
                    <span class="arrow"></span>
                </a>
                <span class="icon-thumbnail">
                    <i class="fa fa-question"></i>
                </span>
                <ul class="sub-menu">
                    <li>
                        <a href="{{ url('/claims') }}">My tickets</a>
                        <span class="icon-thumbnail">Cl</span>
                    </li> 
                </ul>
            </li>
        @endif
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
         @if (auth()->guard('staff')->user()->can('read','profile'))
                <li>
                    <a href="{{ url('/profiles') }}">Profiles</a>
                    <span class="icon-thumbnail">Pr</span>
                </li>
                @endif
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