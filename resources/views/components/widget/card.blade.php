<div class="card {{ $class ?? 'card-default' }} @isset($collapsed) collapsed-card @endisset ">
    @isset($header)
        <div class="card-header">
            {{ $header }}
            <div class="card-tools">
                @isset($tools)
                    {{ $tools }}
                @endisset
                @isset($collapsible)
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                @endisset
                @isset($removable)
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                @endisset
                @isset($expandable)
                    <button type="button" class="btn btn-tool" data-card-widget="maximize">
                        <i class="fas fa-expand"></i>
                    </button>
                @endisset
            </div>
        </div>
    @endisset

    <div class="{{ Arr::toCssClasses([
        'card-body',
        'p-0' => ($nopadding ?? false),
        'table-responsive' => ($responsive ?? false),
    ]) }}">
        {{ $slot }}
    </div>

    @isset($footer)
        <div class="card-footer">
            {{ $footer }}
        </div>
    @endisset
</div>
