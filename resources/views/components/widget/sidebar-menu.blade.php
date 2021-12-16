<nav class="mt-2">
    @isset($web)
        {!! $web->asUl(['class' => Arr::toCssClasses([
            'nav',
            'nav-pills',
            'nav-sidebar',
            'flex-column',
            'nav-flat' => JetAdminLte::navFlatStyle(),
            'nav-compact' => JetAdminLte::navCompact(),
            'nav-child-indent' => JetAdminLte::navChildIndent(),
            'nav-collapse-hide-child' => JetAdminLte::navChildHideOnCollapse(),
            'nav-legacy' => JetAdminLte::navLegacyStyle(),
        ]), 'role' => 'menu', 'data-widget' => 'treeview']) !!}
    @endisset
</nav>
