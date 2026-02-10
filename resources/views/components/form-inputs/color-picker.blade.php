<div class="{{ $groupClass }}">
  {{ $prepend ?? '' }}
  <div id="cp2" class="input-group tf-color-picker" style="width: 150px">
    <input
      type="text"
      name="{{ $name }}"
      id="{{ $id }}"
      {{ $attributes->merge(['class' => 'form-control']) }}
      @if (!empty($value) && $attributes->whereDoesntStartWith('wire:model')) value="{{ $value }}" @endif
    />
    <span class="input-group-append">
      <span class="input-group-text colorpicker-input-addon"><i></i></span>
    </span>
  </div>
  {{ $append ?? '' }}
  <x-form-error name="{{ $name }}" />
</div>

@once
  @push('header')
    <link href="{{ asset('assets/backend') }}/css/bootstrap-colorpicker.css" rel="stylesheet" />
  @endpush
@endonce

@once
  @push('footer')
    <script type="text/javascript" src="{{ asset('assets/backend') }}/js/bootstrap-colorpicker.js"></script>
    <script>
      $('.tf-color-picker').colorpicker();
    </script>
  @endpush
@endonce