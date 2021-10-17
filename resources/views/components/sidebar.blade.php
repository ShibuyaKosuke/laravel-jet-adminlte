<aside class="main-sidebar {{ JetAdminLte::backgroundColorSidebar() }} elevation-4
            @if(JetAdminLte::disableHoverOrFocusAutoExpand()) sidebar-no-expand @endif
    ">
    <a href="{{ route('dashboard') }}" class="brand-link @if(JetAdminLte::smallText('brand')) text-sm @endif">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>
    <div class="sidebar @if(JetAdminLte::smallText('sidebar-nav')) text-sm @endif">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column
            @if(JetAdminLte::navFlatStyle()) nav-flat @endif
            @if(JetAdminLte::navCompact()) nav-compact @endif
            @if(JetAdminLte::navChildIndent()) nav-child-indent @endif
            @if(JetAdminLte::navChildHideOnCollapse()) nav-collapse-hide-child @endif
            @if(JetAdminLte::navLegacyStyle()) nav-legacy @endif"
                data-widget="treeview"
                role="menu"
                data-accordion="false">

                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v1</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v2</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v3</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
