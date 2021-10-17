<div class="card {{ $class ?? 'card-default' }}">
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
