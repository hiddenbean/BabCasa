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
            <a href="javascript:;">
                <span class="title">Products</span>
                <span class="arrow"></span>
            </a>
            <span class="icon-thumbnail">
                <i class="fas fa-box-open"></i>
            </span> 
            <ul class="sub-menu">
                <li>
                    <a href="{{ url('products/create') }}">Add Product</a>
                    <span class="icon-thumbnail"><i class="fas fa-plus"></i></span>
                </li>
                <li>
                    <a href="{{ url('products') }}">All Products</a>
                    <span class="icon-thumbnail"><i class="fa fa-list"></i></span>
                </li>
                <li>
                    <a href="{{ url('products/trash') }}">Trash</a>
                    <span class="icon-thumbnail"><i class="fas fa-trash"></i></span>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;">
                <span class="title">Orders</span>
                <span class="arrow"></span>
            </a>
            <span class="icon-thumbnail">
                    <i class="fa fa-shopping-basket"></i>
            </span>
            <ul class="sub-menu">
                <li>
                    <a href="{{ url('/orders') }}">All</a>
                    <span class="icon-thumbnail">Al</span> 
                </li> 
                <li>
                    <a href="{{ url('/orders') }}">Waiting</a>
                    <span class="icon-thumbnail">Wa</span>
                </li>
                <li>
                    <a href="{{ url('/orders') }}">In progress</a>
                    <span class="icon-thumbnail">Ip</span>
                </li>
                <li>
                    <a href="{{ url('/orders') }}">Completed</a>
                    <span class="icon-thumbnail">Co</span>
                </li>
                <li>
                    <a href="{{ url('/orders') }}">Canceled</a>
                    <span class="icon-thumbnail">Ca</span>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;">
                <span class="title">Discount</span>
                <span class="arrow"></span>
            </a>
            <span class="icon-thumbnail">
                    <i class="fa fa-tags"></i>
            </span>
            <ul class="sub-menu">
                <li>
                    <a href="{{ url('/discounts') }}">All</a>
                    <span class="icon-thumbnail">Al</span>
                </li>
                <li>
                    <a href="{{ url('/discounts/current') }}">Current</a>
                    <span class="icon-thumbnail">Cu</span>
                </li>
                <li>
                    <a href="{{ url('/discounts/next') }}">Next</a>
                    <span class="icon-thumbnail">Ne</span>
                </li>
                <li>
                    <a href="{{ url('/discounts/expired') }}">Expired</a>
                    <span class="icon-thumbnail">Ex</span>
                </li>
                <li>
                    <a href="{{ url('/discounts/create') }}">Create</a>
                    <span class="icon-thumbnail">Cr</span>
                </li>
            </ul>
        <li>
            <a href="javascript:;">
                <span class="title">Billing</span>
                <span class="arrow"></span>
            </a>
            <span class="icon-thumbnail">
                    <i class="fa fa-credit-card"></i>
            </span>
            <ul class="sub-menu">
                <li>
                    <a href="{{ url('/bills') }}">All</a>
                    <span class="icon-thumbnail">Al</span>
                </li>
                <li>
                    <a href="{{ url('/bills') }}">Monthly</a>
                    <span class="icon-thumbnail">Mo</span>
                </li>
                <li>
                    <a href="{{ url('/bills') }}">Annual</a>
                    <span class="icon-thumbnail">An</span>
                </li>
                <li>
                        <a href="{{ url('/bills') }}">Canceled</a>
                        <span class="icon-thumbnail">Ca</span>
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
                    <a href="{{ url('/support') }}">All</a>
                    <span class="icon-thumbnail">MT</span>
                </li> 
                 <li>
                        <a href="{{ url('/support/open') }}">Open</a>
                        <span class="icon-thumbnail">Op</span>
                    </li> 
                    <li>
                        <a href="{{ url('/support/closed') }}">close</a>
                        <span class="icon-thumbnail">Cl</span>
                    </li>  
            </ul>
        </li>
        <li>
                <a href="javascript:;">
                    <span class="title">Settings</span>
                    <span class="arrow"></span>
                </a>
                <span class="icon-thumbnail">
                        <i class="fa fa-cog"></i>
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
                    <li>
                        <a href="{{ url('/profile') }}">Manage my account</a>
                        <span class="icon-thumbnail">Ma</span>
                    </li>
                </ul>
            </li>
    </ul>
    <div class="clearfix"></div>
</div>