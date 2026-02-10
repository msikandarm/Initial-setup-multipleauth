@error($name)
  <{{ $tag }} {{ $attributes->merge(['class' => 'invalid-feedback d-block']) }} role="alert">
    <strong>{{ $message }}</strong>
  </{{ $tag }}>
@enderror
