<body class="hold-transition sidebar-mini
@if(JetAdminLte::smallText('body')) text-sm @endif
@if(JetAdminLte::sidebarCollapsed()) sidebar-collapse @endif
@if(JetAdminLte::sidebarFixed()) layout-fixed @endif
@if(JetAdminLte::sidebarMini()) sidebar-mini @endif
@if(JetAdminLte::sidebarMiniMd()) sidebar-mini-md @endif
@if(JetAdminLte::sidebarMiniXs()) sidebar-mini-xs @endif
@if(JetAdminLte::headerFixed()) layout-navbar-fixed @endif">

{{ $slot }}

</body>
