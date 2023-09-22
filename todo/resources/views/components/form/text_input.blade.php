@props(['name', 'label', 'placeholder', 'required'])

<div class="inputArea">
    <label for="{{ $name }}">{{ $label ?? null }}</label>
    <input type="text" id="{{ $name }}" name="{{ $name }}" placeholder="{{ $placeholder ?? null }}"
        {{ $required ? 'required' : null }} />
</div>
