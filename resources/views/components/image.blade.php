@props(['file', 'thumbnail'])
@if ($file)
<img src="{{ asset($thumbnail) }}" alt="" width="60">
@endif