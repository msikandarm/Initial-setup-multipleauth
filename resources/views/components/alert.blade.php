@props(['type' => 'primary', 'dismissible' => 'no', 'message'])
@if ($message)
<div {{ $attributes->merge(['class' => 'alert-dismissible fade show alert alert-' . $type]) }} role="alert">
  {!! $message !!}
  @if ($dismissible === 'yes')
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  @endif
</div>
@endif