<div class="form-group">
    <label for="{{ $id ?? $name }}">{{ $label }}</label>
    <input type="{{ $type ?? 'text' }}"
           id="{{ $id ?? $name }}"
           name="{{ $name }}"
           class="{{ $class ?? 'form-control' }} @error($name) is-invalid @enderror"
           value="{{ old($name, $value ?? null) }}"
    >
    @error($name)
    <span id="{{ $id ?? $name }}-error" class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>
