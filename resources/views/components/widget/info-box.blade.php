<div class="info-box bg-{{ $type ?? 'default' }}">
    <span class="info-box-icon bg-{{ $iconType ?? 'default' }}">
        <i class="fas fa-{{ $icon ?? 'circle' }}"></i>
    </span>
    <div class="info-box-content">
        <span class="info-box-text">{{ $title ?? 'Title undefined' }}</span>
        <span class="info-box-number">{{ $number ?? 0 }}
            <small>{{ $unit ?? '' }}</small>
        </span>
        @isset($percent)
            <div class="progress">
                <div class="progress-bar" style="width: {{ $percent ?? 0 }}%"></div>
            </div>
        @endisset
        @isset($description)
            <span class="progress-description">{{ $description ?? 'Description undefined' }}</span>
        @endisset
    </div>
</div>
