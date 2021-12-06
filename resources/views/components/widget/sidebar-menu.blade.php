<nav class="mt-2">

    {!! $default->asUl(['class' => Arr::toCssClasses([
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
            @if(array_key_exists('SEPARATOR', $menu))
                <li class="nav-header">{{ $menu['SEPARATOR'] }}</li>
            @elseif(Route::has($menu['route']))
                <li class="nav-item">
                    <a href="@isset($menu['route']){{ route($menu['route']) }}@endif"
                       class="nav-link @if(Route::currentRouteName() === $menu['route']) active @endif"
                    >
                        <i class="nav-icon {{ $menu['icon'] ?? null }}"></i>
                        <p>
                            {{ JetAdminLte::title($menu['route']) }}
                            @if(false)<i class="right fas fa-angle-left"></i>@endif
                        </p>
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
</nav>
