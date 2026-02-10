@props(['title', 'tag' => 'a'])
<{{ $tag }} {{ $attributes->merge(['class' => 'btn']) }}>{{ $title }}</{{ $tag }}>