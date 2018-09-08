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
                <span class="title">Paramètres</span>
                <span class="arrow"></span>
            </a>
            <span class="icon-thumbnail">
                <i class="pg-menu_lv"></i>
            </span>
            <ul class="sub-menu">
                <li>
                    <a href="{{ url('/security') }}">Sécurité</a>
                    <span class="icon-thumbnail">Se</span>
                </li>
                <li>
                    <a href="{{ url('/log') }}">Historique</a>
                    <span class="icon-thumbnail">Hi</span>
                </li>
                <li>
                    <a href="{{ url('/settings') }}">Gérer mon compte</a>
                    <span class="icon-thumbnail">GC</span>
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