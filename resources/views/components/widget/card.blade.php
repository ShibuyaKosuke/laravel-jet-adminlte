<div class="card card-default {{ $class }}">
    @if(isset($header))
        <div class="card-header text-center">
            {{ $header }}
        </div>
    @endif

    <div class="card-body">
        {{ $slot }}
    </div>

    @if(isset($footer))
        <div class="card-footer">
            {{ $footer }}
        </div>
    @endif
</div>
