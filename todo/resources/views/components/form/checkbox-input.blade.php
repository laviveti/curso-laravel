<div class="inputArea">
  <label for="{{ $name }}">
    {{ $label ?? null }}
  </label>
  <input
    type="checkbox"
    id="{{ $name }}"
    name="{{ $name }}"
    {{ !empty($required) ? 'required' : null }}
    {{ $checked ? 'checked' : null }}
    value="1"
  />
</div>
