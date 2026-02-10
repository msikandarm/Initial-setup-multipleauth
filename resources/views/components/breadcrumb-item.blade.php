@props(['url', 'label'])
<li {{ $attributes->merge(['class' => 'breadcrumb-item']) }}>
  @if (isset($url))
    <a href="{{ $url }}">{!! $label !!}</a>
  @else
    {!! $label !!}
  @endif
</li>