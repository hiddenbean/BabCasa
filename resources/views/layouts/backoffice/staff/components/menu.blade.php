<div class="sidebar-menu">
    <!-- BEGIN SIDEBAR MENU ITEMS-->
    <ul class="menu-items">
    @if (auth()->guard('staff')->user()->can('read','dashboard'))
        <li class="m-t-30 ">
            <a href="{{ url('/') }}" class="detailed">
                <span class="title">Dashboard</span>
                <span class="details">15 New Updates</span>
            </a>
            <span class="icon-thumbnail"><i class="pg-home"></i></span>
        </li>
        @endif
        @if (auth()->guard('staff')->user()->can('read','category'))
        <li>
            <a href="javascript:;">
                <span class="title">Categories</span>
                <span class="arrow"></span>
            </a>
            <span class="icon-thumbnail">
                <i class="fas fa-boxes"></i>
            </span>
            <ul class="sub-menu">
                <li>
                    <a href="{{ url('categories/create') }}">Add Category</a>
                    <span class="icon-thumbnail"><i class="fas fa-plus"></i></span>
                </li>
                <li>
                    <a href="{{ url('categories') }}">All Categories</a>
                    <span class="icon-thumbnail"><i class="fa fa-list"></i></span>
                </li>
                <li>
                    <a href="{{ url('categories/trash') }}">Trash</a>
                    <span class="icon-thumbnail"><i class="fas fa-trash"></i></span>
                </li>
            </ul>
        </li>
        @endif
        @if (auth()->guard('staff')->user()->can('read','detail'))
        <li>
            <a href="javascript:;">
                <span class="title">Details</span>
                <span class="arrow"></span>
            </a>
            <span class="icon-thumbnail">
                <i class="fas fa-info-circle"></i>
            </span>
            <ul class="sub-menu">
                <li>
                    <a href="{{ url('details/create') }}">Add Detail</a>
                    <span class="icon-thumbnail"><i class="fas fa-plus"></i></span>
                </li>
                <li>
                    <a href="{{ url('details') }}">All Details</a>
                    <span class="icon-thumbnail"><i class="fa fa-list"></i></span>
                </li>
                <li>
                    <a href="{{ url('details/trash') }}">Trash</a>
                    <span class="icon-thumbnail"><i class="fas fa-trash"></i></span>
                </li>
            </ul>
        </li>
        @endif
        @if (auth()->guard('staff')->user()->can('read','dashboard'))
        <li>
            <a href="javascript:;">
                <span class="title">Attributes</span>
                <span class="arrow"></span>
            </a>
            <span class="icon-thumbnail">
                <i class="fas fa-bars"></i>
            </span>
            <ul class="sub-menu">
                <li>
                    <a href="{{ url('attributes/create') }}">Add Attribute</a>
                    <span class="icon-thumbnail"><i class="fas fa-plus"></i></span>
                </li>
                <li>
                    <a href="{{ url('attributes') }}">All Attributes</a>
                    <span class="icon-thumbnail"><i class="fa fa-list"></i></span>
                </li>
                <li>
                    <a href="{{ url('attributes/trash') }}">Trash</a>
                    <span class="icon-thumbnail"><i class="fas fa-trash"></i></span>
                </li>
            </ul>
        </li>
        @endif
        @if (auth()->guard('staff')->user()->can('read','tag'))
        <li>
            <a href="javascript:;">
                <span class="title">Tags</span>
                <span class="arrow"></span>
            </a>
            <span class="icon-thumbnail">
                <i class="fas fa-tags"></i>
            </span>
            <ul class="sub-menu">
                <li>
                    <a href="{{ url('tags/create') }}">Add Tag</a>
                    <span class="icon-thumbnail"><i class="fas fa-plus"></i></span>
                </li>
                <li>
                    <a href="{{ url('tags') }}">All Tags</a>
                    <span class="icon-thumbnail"><i class="fa fa-list"></i></span>
                </li>
                <li>
                    <a href="{{ url('tags/trash') }}">Trash</a>
                    <span class="icon-thumbnail"><i class="fas fa-trash"></i></span>
                </li>
            </ul>
        </li>
        @endif
        <li>
            <a href="javascript:;">
                <span class="title">Geolocations</span>
                <span class="arrow"></span>
            </a>
            <span class="icon-thumbnail">
                <i class="fas fa-map-marked-alt"></i>
            </span>
            <ul class="sub-menu">
                @if (auth()->guard('staff')->user()->can('read','country'))
                <li>
                    <a href="{{url('countries')}}">Countries</a>
                    <span class="icon-thumbnail"><i class="fa fa-flag"></i></span>
                </li>
                @endif
                @if (auth()->guard('staff')->user()->can('read','language'))
                <li>
                    <a href="{{url('languages')}}">Languages</a>
                    <span class="icon-thumbnail"><i class="fas fa-language"></i></span>
                </li>
                @endif
            </ul>
        </li>
        
        @if (auth()->guard('staff')->user()->can('read','order'))
        <li>
            <a href="javascript:;">
                <span class="title">Clients Orders</span>
                <span class="arrow"></span>
            </a>
            <span class="icon-thumbnail">
                <i class="fas fa-clipboard-list"></i>
            </span>
            <ul class="sub-menu">
                <li>
                    <a href="javascript:;">New Orders</a>
                    <span class="icon-thumbnail"><i class="fas fa-plus"></i></span>
                </li>
                <li>
                    <a href="javascript:;">Orders in Progress</a>
                    <span class="icon-thumbnail"><i class="fas fa-clock"></i></span>
                </li>
                <li>
                    <a href="javascript:;">Finished Orders</a>
                    <span class="icon-thumbnail"><i class="fas fa-check"></i></span>
                </li>
                <li>
                    <a href="javascript:;">All Orders</a>
                    <span class="icon-thumbnail"><i class="fa fa-list"></i></span>
                </li>
            </ul>
        </li>
        @endif
        @if (auth()->guard('staff')->user()->can('read','businesOrder'))
        <li>
            <a href="javascript:;">
                <span class="title">Businesses Orders</span>
                <span class="arrow"></span>
            </a>
            <span class="icon-thumbnail">
                <i class="fas fa-clipboard-list"></i>
            </span>
            <ul class="sub-menu">
                <li>
                    <a href="javascript:;">New Orders</a>
                    <span class="icon-thumbnail"><i class="fas fa-plus"></i></span>
                </li>
                <li>
                    <a href="javascript:;">Orders in Progress</a>
                    <span class="icon-thumbnail"><i class="fas fa-clock"></i></span>
                </li>
                <li>
                    <a href="javascript:;">Finished Orders</a>
                    <span class="icon-thumbnail"><i class="fas fa-check"></i></span>
                </li>
                <li>
                    <a href="javascript:;">All Orders</a>
                    <span class="icon-thumbnail"><i class="fa fa-list"></i></span>
                </li>
            </ul>
        </li>
        @endif
        @if (auth()->guard('staff')->user()->can('read','market'))
        <li>
            <a href="javascript:;">
                <span class="title">Markets</span>
                <span class="arrow"></span>
            </a>
            <span class="icon-thumbnail">
                <i class="fas fa-shopping-cart"></i>
            </span>
            <ul class="sub-menu">
                <li>
                    <a href="javascript:;">New Markets</a>
                    <span class="icon-thumbnail"><i class="fas fa-plus"></i></span>
                </li>
                <li>
                    <a href="javascript:;">Markets in Progress</a>
                    <span class="icon-thumbnail"><i class="fas fa-clock"></i></span>
                </li>
                <li>
                    <a href="javascript:;">Finished Markets</a>
                    <span class="icon-thumbnail"><i class="fas fa-check"></i></span>
                </li>
                <li>
                    <a href="javascript:;">All Markets</a>
                    <span class="icon-thumbnail"><i class="fa fa-list"></i></span>
                </li>
            </ul>
        </li>
        @endif
        @if (auth()->guard('staff')->user()->can('read','bill'))
        <li>
            <a href="javascript:;">
                <span class="title">Financials</span>
                <span class="arrow"></span>
            </a>
            <span class="icon-thumbnail">
                <i class="fas fa-chart-line"></i>
            </span>
            <ul class="sub-menu">
                <li>
                    <a href="javascript:;">Bills</a>
                    <span class="icon-thumbnail"><i class="fas fa-file-invoice-dollar"></i></span>
                </li>
                <li>
                    <a href="javascript:;">Reports</a>
                    <span class="icon-thumbnail"><i class="fas fa-file-contract"></i></i></span>
                </li>
            </ul>
        </li>
        @endif
        @if (auth()->guard('staff')->user()->can('read','staff'))
        <li>
            <a href="javascript:;">
                <span class="title">Staff</span>
                <span class="arrow"></span>
            </a>
            <span class="icon-thumbnail">
                <i class="fas fa-user-ninja"></i>
            </span>
            <ul class="sub-menu">
                <li>
                    <a href="{{ url('staff/create') }}">Add Staff Member</a>
                    <span class="icon-thumbnail"><i class="fas fa-user-plus"></i></span>
                </li>
                <li>
                    <a href="{{ url('staff') }}">Staff Accounts</a>
                    <span class="icon-thumbnail"><i class="fas fa-list-alt"></i></span>
                </li>
                <li>
                    <a href="{{ url('profiles') }}">Staff Profiles</a>
                    <span class="icon-thumbnail"><i class="fas fa-users-cog"></i></span>
                </li>
            </ul>
        </li>
        @endif
        @if (auth()->guard('staff')->user()->can('read','partner'))
        <li>
            <a href="javascript:;">
                <span class="title">Affiliates</span>
                <span class="arrow"></span>
            </a>
            <span class="icon-thumbnail">
                <i class="fas fa-user-friends"></i>
            </span>
            <ul class="sub-menu">
                <li>
                    <a href="{{ url('affiliates/create') }}">Add Affiliate</a>
                    <span class="icon-thumbnail"><i class="fas fa-user-plus"></i></span>
                </li>
                <li>
                    <a href="{{ url('affiliates') }}">Affiliates Accounts</a>
                    <span class="icon-thumbnail"><i class="fas fa-list-alt"></i></span>
                </li>
            </ul>
        </li>
        @endif
        @if (auth()->guard('staff')->user()->can('read','business'))
        <li>
            <a href="javascript:;">
                <span class="title">Businesses</span>
                <span class="arrow"></span>
            </a>
            <span class="icon-thumbnail">
                <i class="fas fa-user-tie"></i>
            </span>
            <ul class="sub-menu">
                <li>
                    <a href="{{ url('businesses/create') }}">Add Business</a>
                    <span class="icon-thumbnail"><i class="fas fa-user-plus"></i></span>
                </li>
                <li>
                    <a href="{{ url('businesses') }}">All Businesses</a>
                    <span class="icon-thumbnail"><i class="fas fa-list-alt"></i></span>
                </li>
            </ul>
        </li>
        @endif
        @if (auth()->guard('staff')->user()->can('read','client'))
        <li>
            <a href="javascript:;">
                <span class="title">Clients</span>
                <span class="arrow"></span>
            </a>
            <span class="icon-thumbnail">
                <i class="fas fa-users"></i>
            </span>
            <ul class="sub-menu">
                <li>
                    <a href="{{ url('clients') }}">Active Clients</a>
                    <span class="icon-thumbnail"><i class="fas fa-list-alt"></i></span>
                </li>
                <li>
                    <a href="{{ url('clients/unactive') }}">Unactive Clients</a>
                    <span class="icon-thumbnail"><i class="fas fa-bed"></i></span>
                </li>
            </ul>
        </li>
        @endif
        @if (auth()->guard('staff')->user()->can('read','request'))
        <li>
            <a href="javascript:;">
                <span class="title">Requests</span>
                <span class="arrow"></span>
            </a>
            <span class="icon-thumbnail">
                <i class="fas fa-question-circle"></i>
            </span>
            <ul class="sub-menu">
                <li>
                    <a href="{{ url('requests/subscriptions') }}">Subscriptions</a>
                    <span class="icon-thumbnail">
                        <i class="fas fa-user-plus"></i>
                    </span>
                </li>
                <li>
                    <a href="{{ url('requests/updates') }}">Updates</a>
                    <span class="icon-thumbnail">
                        <i class="fas fa-user-edit"></i>
                    </span>
                </li>
                @if (auth()->guard('staff')->user()->can('read','reason'))
                <li>
                    <a href="javascript:;"><span class="title">Requests Reasons</span>
                    <span class="arrow"></span></a>
                    <span class="icon-thumbnail">
                        <i class="fas fa-exclamation-circle"></i>
                    </span>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{ url('reasons/create') }}">Add reasons</a>
                            <span class="icon-thumbnail">
                                <i class="fas fa-plus"></i>
                            </span>
                        </li>
                        <li>
                            <a href="{{ url('reasons/') }}">All reasons</a>
                            <span class="icon-thumbnail">
                                <i class="fas fa-list"></i>
                            </span>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
        </li>
        @endif
        @if (auth()->guard('staff')->user()->can('read','claim'))
        <li>
            <a href="javascript:;">
                <span class="title">Support</span>
                <span class="arrow"></span></a>
            </a>
            <span class="icon-thumbnail">
                <i class="fas fa-life-ring"></i>
            </span>
            <ul class="sub-menu">
                <li>
                    <a href="{{ url('support/create') }}">Create ticket</a>
                    <span class="icon-thumbnail">
                        <i class="fas fa-user-plus"></i>
                    </span>
                </li>
                <li>
                    <a href="{{ url('support') }}">All tickets</a>
                    <span class="icon-thumbnail">
                        <i class="fas fa-user-edit"></i>
                    </span>
                </li>
                @if (auth()->guard('staff')->user()->can('read','reason'))
                <li>
                    <a href="javascript:;"><span class="title">Support subjects</span>
                    <span class="arrow"></span></a>
                    <span class="icon-thumbnail">
                        <i class="fas fa-exclamation-circle"></i>
                    </span>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{ url('subjects/create') }}">Add subjet</a>
                            <span class="icon-thumbnail">
                                <i class="fas fa-plus"></i>
                            </span>
                        </li>
                        <li>
                            <a href="{{ url('subjects/') }}">All subjets</a>
                            <span class="icon-thumbnail">
                                <i class="fas fa-list"></i>
                            </span>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
        </li>
        @endif
        <li>
            <a href="javascript:;">
                <span class="title">Settings</span>
                <span class="arrow"></span>
            </a>
            <span class="icon-thumbnail">
                <i class="fas fa-cogs"></i>
            </span>
            <ul class="sub-menu">
                <li>
                    <a href="{{ url('account') }}">Account</a>
                    <span class="icon-thumbnail">
                        <i class="fas fa-user-circle"></i>
                    </span>
                </li>
                <li>
                <a href="{{ url('security') }}">Security</a>
                    <span class="icon-thumbnail">
                        <i class="fas fa-lock"></i>
                    </span>
                </li>
                <li>
                    <a href="{{ url('logs') }}">Activity log</a>
                    <span class="icon-thumbnail">
                        <i class="fas fa-file-alt"></i>
                    </span>
                </li>
            </ul>
        </li>
    </ul>
    <div class="clearfix"></div>
</div>