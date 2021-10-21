<div class="small-box bg-{{ $type ?? 'info' }}">
    <div class="inner">
        <h3>{{ $number ?? 0 }}</h3>
        <p>{{ $title ?? 'title undefined' }}</p>
    </div>
    @isset($icon)
        <div class="icon">
            <i class="fa fa-{{ $icon ?? '' }}"></i>
        </div>
    @endisset
    @isset($href)
        <a href="{{ $href ?? '#' }}" class="small-box-footer">
            More info
            <i class="fas fa-arrow-circle-right"></i>
        </a>
    @endisset
</div>
