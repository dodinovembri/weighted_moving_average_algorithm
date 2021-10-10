<!-- BEGIN: SideNav-->
<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light sidenav-active-square">
    <div class="brand-sidebar">
        <h1 class="logo-wrapper"><a class="brand-logo darken-1" href="{{ url('home') }}"><img class="hide-on-med-and-down" src="{{ asset('assets/app-assets/images/logo/materialize-logo-color.png') }}" alt="materialize logo" /><img class="show-on-medium-and-down hide-on-med-and-up" src="{{ asset('assets/app-assets/images/logo/materialize-logo.png') }}" alt="materialize logo" /><span class="logo-text hide-on-med-and-down">WMA</span></a><a class="navbar-toggler" href="#"><i class="material-icons">radio_button_checked</i></a></h1>
    </div>
    <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">
        <li class="navigation-header"><a class="navigation-header-text">Main</a><i class="navigation-header-icon material-icons">more_horiz</i>
        </li>
        <li class="bold"><a class="waves-effect waves-cyan {{ (Request::is('home')) ? 'active' : '' }}" href="{{ url('home') }}"><i class="material-icons">settings_input_svideo</i><span class="menu-title" data-i18n="Chat">Dashboard</span></a>
        </li>
        <li class="bold"><a class="waves-effect waves-cyan {{ (Request::is('prediction')) || (Request::is('prediction/filter')) ? 'active' : '' }}" href="{{ url('prediction') }}"><i class="material-icons">check</i><span class="menu-title" data-i18n="ToDo">WMA Prediction</span></a>
        </li>
        <li class="bold"><a class="waves-effect waves-cyan {{ (Request::is('sales')) ? 'active' : '' }}" href="{{ url('sales') }}"><i class="material-icons">format_list_bulleted</i><span class="menu-title" data-i18n="Kanban">Sales</span></a>
        </li>
        <li class="navigation-header"><a class="navigation-header-text">Master</a><i class="navigation-header-icon material-icons">more_horiz</i>
        </li>
        <li class="bold"><a class="waves-effect waves-cyan {{ (Request::is('user')) ? 'active' : '' }}" href="{{ url('user') }}"><i class="material-icons">account_circle</i><span class="menu-title" data-i18n="File Manager">Users</span></a>
        </li>
    </ul>
    <div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
</aside>
<!-- END: SideNav-->