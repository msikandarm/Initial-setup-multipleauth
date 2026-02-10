<textarea name="{{ $name }}" id="{{ $id }}" {{ $attributes->merge(['class' => 'form-control']) }}>@if (!empty($value) && $attributes->whereDoesntStartWith('wire:model')){!! $value !!}@endif</textarea>
<x-form-error name="{{ $name }}" />
