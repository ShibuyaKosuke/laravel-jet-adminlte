<div class="callout {{ $class }}">
    @isset($title)
        <h5>
            @isset($icon)
                <i class="icon fas fa-{{ $icon }}"></i>
            @endisset
            {{ $title }}
        </h5>
    @endisset
    {{ $slot }}
</div>
