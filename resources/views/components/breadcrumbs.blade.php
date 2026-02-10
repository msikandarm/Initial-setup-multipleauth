@props(['url'])
<ol {{ $attributes->merge(['class' => 'breadcrumb']) }}>
  @if ($url)
    <x-breadcrumb-item url="{{ $url }}" label="{{ __('Dashboard') }}" />
  @endif
  {{ $slot }}
</ol>
