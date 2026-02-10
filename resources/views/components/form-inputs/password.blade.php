<div class="position-relative" x-data="{showPassword: false}">
  <input
    :type="showPassword ? 'text' : 'password'"
    name="{{ $name }}"
    id="{{ $id }}"
    {{ $attributes->merge(['class' => 'form-control']) }}
    value="{{ $value }}"
  />
  <div class="field_icon">
    <a href="javascript:;" x-on:click="showPassword = !showPassword">
      <i x-show="!showPassword" class="las la-eye-slash"></i>
      <i x-show="showPassword" class="las la-eye"></i>
    </a>
  </div>
  <x-form-error name="{{ $name }}" />
</div>

@once
  @push('footer')
    <x-alpine-js />
  @endpush
@endonce
