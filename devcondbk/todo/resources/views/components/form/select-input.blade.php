<div class="inputArea">
  <label for="{{ $name }}">{{ $label ?? null }}</label>
  <select
    id="{{ $name }}"
    name="{{ $name }}"
    {{ !empty($required) ? 'required' : null }}
  >
    <option
      value=""
      selected
      disabled
    >
      Selecione uma opção
    </option>
    {{ $slot }}
  </select>
</div>
