@props(['type' => 'primary', 'label' => ''])
<span {{ $attributes->merge(['class' => 'text-white badge badge-' . $type]) }}>{!! $label !!}</span>
