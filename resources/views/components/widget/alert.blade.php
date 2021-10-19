<div class="alert {{ $class }}
@isset($dismissible) alert-dismissible @endisset"
>
    @isset($dismissible)
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    @endisset
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
