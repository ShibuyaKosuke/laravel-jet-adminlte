<nav class="mt-2">
    <ul class="{{ Arr::toCssClasses([
        'nav',
        'nav-pills',
        'nav-sidebar',
        'flex-column',
        'nav-flat' => JetAdminLte::navFlatStyle(),
        'nav-compact' => JetAdminLte::navCompact(),
        'nav-child-indent' => JetAdminLte::navChildIndent(),
        'nav-collapse-hide-child' => JetAdminLte::navChildHideOnCollapse(),
        'nav-legacy' => JetAdminLte::navLegacyStyle(),
    ]) }}"
        data-widget="treeview"
        role="menu"
        data-accordion="false">

        @foreach(JetAdminLte::sidebarMenu() as $menu)
            @if(in_array('SEPARATOR', $menu, true))
                <li class="nav-header">EXAMPLES</li>
            @else
                <li class="nav-item">
                    <a href="@isset($menu['route']){{ route($menu['route']) }}@endif"
                       class="nav-link @if(Route::currentRouteName() === $menu['route']) active @endif"
                    >
                        <i class="nav-icon fas fa-{{ $menu['icon'] ?? null }}"></i>
                        <p>
                            {{ $menu['label'] ?? null }}
                            @if(false)<i class="right fas fa-angle-left"></i>@endif
                        </p>
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
</nav>