<div {{ $attributes->whereStartsWith('class')->class($switchClasses()) }}>
  <input
    type="checkbox"
    name="{{ $name }}"
    id="{{ $name }}"
    value="yes"
    @if ($value === 'yes' && $attributes->whereDoesntStartWith('x-model')) checked @endif
    {{ $attributes }}
  />
  <label for="{{ $name }}">
    <i class="las la-check"></i>
    <i class="las la-times"></i>
  </label>
</div>
