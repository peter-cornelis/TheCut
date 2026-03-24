@props(['id','label','type'])
<div class="form-field">
    <label for="{{ $id }}" class="label">
        {{ $label }}
        <span>
            @error($id)
                {{ $message }}
            @else
                &ast;
            @enderror
        </span>
    </label>
    <input type="{{ $type }}" id="{{ $id }}" class="input">
</div>
