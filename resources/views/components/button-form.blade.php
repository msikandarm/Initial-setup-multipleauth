@props(['action', 'label', 'method' => 'post'])
<x-form action="{{ $action }}" method="{{ $method }}" class="d-inline" novalidate>
  <button type="submit" {{ $attributes->whereStartsWith('class')->merge(['class' => 'btn']) }} {{ $attributes->whereDoesntStartWith('class') }}>{!! $label !!}</button>
</x-form>