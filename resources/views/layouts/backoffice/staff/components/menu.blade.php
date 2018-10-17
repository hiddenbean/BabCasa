<div class="sidebar-menu">
    <!-- BEGIN SIDEBAR MENU ITEMS-->
    <ul class="menu-items">
    @if (auth()->guard('staff')->user()->can('read','dashboard'))
        <li class="m-t-30 ">
            <a href="{{ url('/') }}" class="detailed">
                <span class="title">Dashboard</span>
                <span class="details">15 New Updates</span>
            </a>
            <span class="bg-primary icon-thumbnail"><i class="pg-home"></i></span>
        </li>
        @endif
        <li>
            <a href="#">
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
        <li>
            <a href="#">
                <span class="title">Details</span>
                <span class="arrow"></span>
            </a>
            <span class="icon-thumbnail">
                <i class="fas fa-info-circle"></i>
            </span>
            <ul class="sub-menu">
                <li>
                    <a href="#">Add Detail</a>
                    <span class="icon-thumbnail"><i class="fas fa-plus"></i></span>
                </li>
                <li>
                    <a href="#">All Details</a>
                    <span class="icon-thumbnail"><i class="fa fa-list"></i></span>
                </li>
                <li>
                    <a href="#">Trash</a>
                    <span class="icon-thumbnail"><i class="fas fa-trash"></i></span>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">
                <span class="title">Attributes</span>
                <span class="arrow"></span>
            </a>
            <span class="icon-thumbnail">
                <i class="fas fa-bars"></i>
            </span>
            <ul class="sub-menu">
                <li>
                    <a href="#">Add Attribute</a>
                    <span class="icon-thumbnail"><i class="fas fa-plus"></i></span>
                </li>
                <li>
                    <a href="#">All Attributes</a>
                    <span class="icon-thumbnail"><i class="fa fa-list"></i></span>
                </li>
                <li>
                    <a href="#">Trash</a>
                    <span class="icon-thumbnail"><i class="fas fa-trash"></i></span>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">
                <span class="title">Tags</span>
                <span class="arrow"></span>
            </a>
            <span class="icon-thumbnail">
                <i class="fas fa-tags"></i>
            </span>
            <ul class="sub-menu">
                <li>
                    <a href="#">Add Tag</a>
                    <span class="icon-thumbnail"><i class="fas fa-plus"></i></span>
                </li>
                <li>
                    <a href="#">All Tags</a>
                    <span class="icon-thumbnail"><i class="fa fa-list"></i></span>
                </li>
                <li>
                    <a href="#">Trash</a>
                    <span class="icon-thumbnail"><i class="fas fa-trash"></i></span>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">
                <span class="title">Geolocations</span>
                <span class="arrow"></span>
            </a>
            <span class="icon-thumbnail">
                <i class="fas fa-map-marked-alt"></i>
            </span>
            <ul class="sub-menu">
                <li>
                    <a href="#">Countries</a>
                    <span class="icon-thumbnail"><i class="fa fa-flag"></i></span>
                </li>
                <li>
                    <a href="#">Currencies</a>
                    <span class="icon-thumbnail"><i class="fa fa-dollar"></i></span>
                </li>
                <li>
                    <a href="#">Languages</a>
                    <span class="icon-thumbnail"><i class="fas fa-language"></i></span>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">
                <span class="title">Clients Orders</span>
                <span class="arrow"></span>
            </a>
            <span class="icon-thumbnail">
                <i class="fas fa-clipboard-list"></i>
            </span>
            <ul class="sub-menu">
                <li>
                    <a href="#">New Orders</a>
                    <span class="icon-thumbnail"><i class="fas fa-plus"></i></span>
                </li>
                <li>
                    <a href="#">Orders in Progress</a>
                    <span class="icon-thumbnail"><i class="fas fa-clock"></i></span>
                </li>
                <li>
                    <a href="#">Finished Orders</a>
                    <span class="icon-thumbnail"><i class="fas fa-check"></i></span>
                </li>
                <li>
                    <a href="#">All Orders</a>
                    <span class="icon-thumbnail"><i class="fa fa-list"></i></span>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">
                <span class="title">Pro Orders</span>
                <span class="arrow"></span>
            </a>
            <span class="icon-thumbnail">
                <i class="fas fa-clipboard-list"></i>
            </span>
            <ul class="sub-menu">
                <li>
                    <a href="#">New Orders</a>
                    <span class="icon-thumbnail"><i class="fas fa-plus"></i></span>
                </li>
                <li>
                    <a href="#">Orders in Progress</a>
                    <span class="icon-thumbnail"><i class="fas fa-clock"></i></span>
                </li>
                <li>
                    <a href="#">Finished Orders</a>
                    <span class="icon-thumbnail"><i class="fas fa-check"></i></span>
                </li>
                <li>
                    <a href="#">All Orders</a>
                    <span class="icon-thumbnail"><i class="fa fa-list"></i></span>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">
                <span class="title">Markets</span>
                <span class="arrow"></span>
            </a>
            <span class="icon-thumbnail">
                <i class="fas fa-shopping-cart"></i>
            </span>
            <ul class="sub-menu">
                <li>
                    <a href="#">New Markets</a>
                    <span class="icon-thumbnail"><i class="fas fa-plus"></i></span>
                </li>
                <li>
                    <a href="#">Markets in Progress</a>
                    <span class="icon-thumbnail"><i class="fas fa-clock"></i></span>
                </li>
                <li>
                    <a href="#">Finished Markets</a>
                    <span class="icon-thumbnail"><i class="fas fa-check"></i></span>
                </li>
                <li>
                    <a href="#">All Markets</a>
                    <span class="icon-thumbnail"><i class="fa fa-list"></i></span>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">
                <span class="title">Financials</span>
                <span class="arrow"></span>
            </a>
            <span class="icon-thumbnail">
                <i class="fas fa-chart-line"></i>
            </span>
            <ul class="sub-menu">
                <li>
                    <a href="#">Bills</a>
                    <span class="icon-thumbnail"><i class="fas fa-file-invoice-dollar"></i></span>
                </li>
                <li>
                    <a href="#">Reports</a>
                    <span class="icon-thumbnail"><i class="fas fa-file-contract"></i></i></span>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">
                <span class="title">Staff</span>
                <span class="arrow"></span>
            </a>
            <span class="icon-thumbnail">
                <i class="fas fa-user-ninja"></i>
            </span>
            <ul class="sub-menu">
                <li>
                    <a href="#">Add Staff</a>
                    <span class="icon-thumbnail"><i class="fas fa-user-plus"></i></span>
                </li>
                <li>
                    <a href="#">Staff Accounts</a>
                    <span class="icon-thumbnail"><i class="fas fa-list-alt"></i></span>
                </li>
                <li>
                    <a href="#">Staff Profiles</a>
                    <span class="icon-thumbnail"><i class="fas fa-users-cog"></i></span>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">
                <span class="title">Affiliates</span>
                <span class="arrow"></span>
            </a>
            <span class="icon-thumbnail">
                <i class="fas fa-user-friends"></i>
            </span>
            <ul class="sub-menu">
                <li>
                    <a href="#">Add Affiliate</a>
                    <span class="icon-thumbnail"><i class="fas fa-user-plus"></i></span>
                </li>
                <li>
                    <a href="#">Affiliates Accounts</a>
                    <span class="icon-thumbnail"><i class="fas fa-list-alt"></i></span>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">
                <span class="title">Business Clients</span>
                <span class="arrow"></span>
            </a>
            <span class="icon-thumbnail">
                <i class="fas fa-user-tie"></i>
            </span>
            <ul class="sub-menu">
                <li>
                    <a href="#">Add Business Clients</a>
                    <span class="icon-thumbnail"><i class="fas fa-user-plus"></i></span>
                </li>
                <li>
                    <a href="#">BCs Accounts</a>
                    <span class="icon-thumbnail"><i class="fas fa-list-alt"></i></span>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">
                <span class="title">Clients</span>
            </a>
            <span class="icon-thumbnail">
                <i class="fa fa-users"></i>
            </span>
        </li>
        <li>
            <a href="#">
                <span class="title">Requests</span>
                <span class="arrow"></span>
            </a>
            <span class="icon-thumbnail">
                <i class="fas fa-question-circle"></i>
            </span>
            <ul class="sub-menu">
                <li>
                    <a href="#">Subscription Requests</a>
                    <span class="icon-thumbnail">
                        <i class="fas fa-user-plus"></i>
                    </span>
                </li>
                <li>
                    <a href="#">Update Requests</a>
                    <span class="icon-thumbnail">
                        <i class="fas fa-user-edit"></i>
                    </span>
                </li>
                <li>
                    <a href="#">Requests Reasons</a>
                    <span class="icon-thumbnail">
                        <i class="fas fa-exclamation-circle"></i>
                    </span>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">
                <span class="title">Settings</span>
                <span class="arrow"></span>
            </a>
            <span class="icon-thumbnail">
                <i class="fas fa-cogs"></i>
            </span>
            <ul class="sub-menu">
                <li>
                    <a href="#">Security</a>
                    <span class="icon-thumbnail">
                        <i class="fas fa-lock"></i>
                    </span>
                </li>
                <li>
                    <a href="#">Activity log</a>
                    <span class="icon-thumbnail">
                        <i class="fas fa-file-alt"></i>
                    </span>
                </li>
            </ul>
        </li>
    </ul>
    <div class="clearfix"></div>
</div>