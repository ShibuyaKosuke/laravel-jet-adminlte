<body class="{{ Arr::toCssClasses([
    'hold-transition',
    JetAdminLte::layoutStyle(),
    'text-sm' => JetAdminLte::smallText('body'),
    'sidebar-collapse' => JetAdminLte::sidebarCollapsed(),
    'layout-fixed' => JetAdminLte::sidebarFixed(),
    'sidebar-mini' => JetAdminLte::sidebarMini(),
    'sidebar-mini-md' => JetAdminLte::sidebarMiniMd(),
    'sidebar-mini-xs' => JetAdminLte::sidebarMiniXs(),
    'layout-navbar-fixed' => JetAdminLte::headerFixed(),
]) }}">

{{ $slot }}

</body>
