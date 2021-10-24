<aside class="{{ Arr::toCssClasses([
    'main-sidebar',
    JetAdminLte::backgroundColorSidebar(),
    'elevation-4',
    'sidebar-no-expand' => JetAdminLte::disableHoverOrFocusAutoExpand()
]) }}">

    <a href="{{ route('dashboard') }}" class="{{ Arr::toCssClasses([
        'brand-link',
        'text-sm' => JetAdminLte::smallText('brand')
    ]) }}">

        <x-jet-adminlte::widget.logo-image/>

        <span class="brand-text font-weight-light">
            {{ config('app.name') }}
        </span>

    </a>
    <div class="{{ Arr::toCssClasses([
        'sidebar',
        'text-sm' => JetAdminLte::smallText('sidebar-nav'),
    ]) }}">

        <x-jet-adminlte::widget.profile-sidebar/>

        <x-jet-adminlte::widget.search-sidebar/>

        <x-jet-adminlte::widget.sidebar-menu/>

    </div>
</aside>
