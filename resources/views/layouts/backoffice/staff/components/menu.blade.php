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
                    <a href="#">Add category</a>
                    <span class="icon-thumbnail"><i class="fas fa-plus"></i></span>
                </li>
                <li>
                    <a href="#">All categories</a>
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
                <span class="title">Catalog</span>
                <span class="arrow"></span>
            </a>
            <span class="icon-thumbnail">
                <i class="pg-contact_book"></i>
            </span>
            <ul class="sub-menu">
                <li>
                    <a href="#">Categories</a>
                    <span class="icon-thumbnail"><i class="fas fa-boxes"></i></span>
                </li>
                <li>
                    <a href="#">Tags</a>
                    <span class="icon-thumbnail"><i class="fa fa-tag"></i></span>
                </li>
                <li>
                    <a href="#">Details</a>
                    <span class="icon-thumbnail"><i class="fas fa-info-circle"></i></span>
                </li>
                <li>
                    <a href="#">Attributes</a>
                    <span class="icon-thumbnail"><i class="fas fa-tags"></i></span>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">
                <span class="title">Geolocation</span>
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
            </ul>
        </li>
        <li>
            <a href="#">
                <span class="title">Marketing</span>
                <span class="arrow"></span>
            </a>
            <span class="icon-thumbnail">
                <i class="fas fa-warehouse"></i></span>
            <ul class="sub-menu">
                <li>
                    <a href="#">Orders</a>
                    <span class="icon-thumbnail"><i class="fas fa-clipboard-list"></i></span>
                </li>
                <li>
                    <a href="#">Markets</a>
                    <span class="icon-thumbnail"><i class="fas fa-shopping-cart"></i></span>
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
                    <a href="#">New staff</a>
                    <span class="icon-thumbnail"><i class="fas fa-user-plus"></i></span>
                </li>
                <li>
                    <a href="#">Accounts</a>
                    <span class="icon-thumbnail"><i class="fas fa-list-alt"></i></span>
                </li>
                <li>
                    <a href="#">Profiles</a>
                    <span class="icon-thumbnail"><i class="fas fa-users-cog"></i></span>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">
                <span class="title">Business</span>
                <span class="arrow"></span>
            </a>
            <span class="icon-thumbnail">
                <i class="fas fa-briefcase"></i>
            </span>
            <ul class="sub-menu">
                <li>
                    <a href="#">Affiliates</a>
                    <span class="icon-thumbnail">
                        <i class="fas fa-user-friends"></i>
                    </span>
                </li>
                <li>
                    <a href="#">Business Clients</a>
                    <span class="icon-thumbnail">
                        <i class="fas fa-user-tie"></i>
                    </span>
                </li>
                <li>
                    <a href="#">Reasons</a>
                    <span class="icon-thumbnail"><i class="fas fa-question-circle"></i></span>
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