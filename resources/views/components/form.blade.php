<form method="{{ $spoofMethod ? 'POST' : $method }}" id="{{ $id }}" @if ($hasFiles) enctype="multipart/form-data" @endif {{ $attributes }}>
  @unless (in_array($method, ['HEAD', 'GET', 'OPTIONS'], true))
    @csrf
  @endunless

  @if ($spoofMethod)
    @method($method)
  @endif

  {{ $slot }}
</form>

@if (!$novalidate)
  @once
    @push('footer')
      <x-validation-js />
    @endpush
  @endonce
@endif

@if (!$customrules && !$novalidate)
  @push('footer')
    <script type="text/javascript">
      $("#{{ $id }}").validate();
    </script>
  @endpush
@endif