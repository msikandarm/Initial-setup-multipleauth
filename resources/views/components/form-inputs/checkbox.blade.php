<div {{ $attributes->whereStartsWith('class')->merge(['class' => 'form-check']) }}>
  <input
    type="checkbox"
    class="form-check-input"
    name="{{ $name }}"
    id="{{ $id }}"
    value="{{ $value }}"
    {{ $attributes }}
    @if ($checked && $attributes->whereDoesntStartWith('wire:model')) checked @endif
  />
  @if ($label)
    <label class="form-check-label" for="{{ $id }}">{{ $label }}</label>
  @endif
</div>
