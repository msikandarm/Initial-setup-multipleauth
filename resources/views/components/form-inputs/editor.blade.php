<textarea name="{{ $name }}" id="{{ $id }}" {{ $attributes->merge(['class' => 'editor']) }}>@if (!empty($value) && $attributes->whereDoesntStartWith('wire:model')) {!! $value !!} @endif</textarea>
<x-form-error name="{{ $name }}" />
@once
  @push('footer')
    <x-tinymce-js />
  @endpush
@endonce