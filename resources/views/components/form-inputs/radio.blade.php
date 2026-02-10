<div {{ $attributes->whereStartsWith('class')->merge(['class' => 'form-check']) }}>
  <input
    type="radio"
    class="form-check-input"
    name="{{ $name }}"
    id="{{ $id }}"
    value="{{ $value }}"
    @if ($checked && $attributes->whereDoesntStartWith('wire:model')) checked @endif
    {{ $attributes }}
  />
  @if ($label)
  <label class="form-check-label" for="{{ $id }}">{{ $label }}</label>
  @endif
</div>
