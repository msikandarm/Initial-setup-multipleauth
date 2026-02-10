<div {{ $attributes->merge(['class' => 'mb-3']) }}>
  @if ($label && !empty($label))
    <x-form-label for="{{ $inputId }}">{{ $label }}</x-form-label>
  @endif

  {{ $slot }}
</div>
