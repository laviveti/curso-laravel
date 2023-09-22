<div class="inputArea">
  <label for="{{ $name }}">{{ $label }}</label>
  <textarea id="{{ $name }}" name="{{ $name }}"
    placeholder="{{ $placeholder ?? null }} {{ !empty($required) ? 'required' : null }}"></textarea>
</div>
