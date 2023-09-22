<div class="inputArea">
    <label for="{{ $name }}">{{ $label ?? null }}</label>
    <input type="{{ !empty($type) ? $type : 'text' }}" id="{{ $name }}" name="{{ $name }}"
        placeholder="{{ $placeholder ?? null }}" {{ !empty($required) ? 'required' : null }} />
</div>
