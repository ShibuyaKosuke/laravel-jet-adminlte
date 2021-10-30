@unless ($breadcrumbs->isEmpty())
    <ol class="breadcrumb float-sm-right">
        @foreach ($breadcrumbs as $breadcrumb)
            @if (!is_null($breadcrumb->url) && !$loop->last)
                <li class="breadcrumb-item">
                    <a href="{{ $breadcrumb->url }}">
                        {{ JetAdminLte::title($breadcrumb->title) }}
                    </a>
                </li>
            @else
                <li class="breadcrumb-item active">
                    {{ JetAdminLte::title($breadcrumb->title) }}
                </li>
            @endif
        @endforeach
    </ol>
@endunless
