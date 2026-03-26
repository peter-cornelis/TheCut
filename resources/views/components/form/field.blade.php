@props(['id','label','type','autocomplete' => null])
<div class="form-field">
    <label for="{{ $id }}" class="label">
        {{ $label }}
        <span class="">
            @error($id)
                 - {{ $message }}
            @else
                &ast;
            @enderror
        </span>
    </label>
    <input type="{{ $type }}" id="{{ $id }}" name="{{ $id }}" class="input" @if($autocomplete) autocomplete="{{ $autocomplete }}" @endif>
</div>
