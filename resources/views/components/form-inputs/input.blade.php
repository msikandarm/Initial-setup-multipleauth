<div class="{{ $groupClass }}">
  {{ $prepend ?? '' }}
  <input
    type="{{ $type }}"
    name="{{ $name }}"
    id="{{ $id }}"
    {{ $attributes->merge(['class' => 'form-control']) }}
    @if ($attributes->whereDoesntStartWith('wire:model')) value="{{ $value }}" @endif
  />
  {{ $append ?? '' }}
  <x-form-error name="{{ $name }}" />
</div>
