<div class="form-group">
    @isset($label)
        <label for="{{ $id ?? $name }}">{{ $label }}</label>
    @endisset
    <input type="{{ $type ?? 'text' }}"
           id="{{ $id ?? $name }}"
           name="{{ $name }}"
           class="{{ $class ?? 'form-control' }} @error($name) is-invalid @enderror"
           value="{{ old($name, $value ?? null) }}"
           @isset($placeholder) placeholder="{{ $placeholder }}" @endisset
    >
    @error($name)
    <span id="{{ $id ?? $name }}-error" class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>
