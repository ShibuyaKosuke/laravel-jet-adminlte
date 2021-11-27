<div class="form-group">
    <label for="{{ $id ?? $name }}"></label>
    <select id="{{ $id ?? $name }}" name="{{ $name }}" class="{{ $class ?? 'form-control' }} @error($name) is-invalid @enderror">
        <option value=""></option>
    </select>
    @error($name)
    <span id="{{ $id ?? $name }}-error" class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>
