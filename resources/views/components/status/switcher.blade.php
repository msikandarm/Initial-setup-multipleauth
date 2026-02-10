<div {{ $attributes->class($switchClasses) }}>
  <input
    type="checkbox"
    name="{{ $name }}"
    id="{{ $name }}_{{ $id }}"
    value="{{ $value }}"
    data-name="{{ $name }}"
    data-model="{{ $model }}"
    data-id="{{ $id }}"
    @if ($value) checked @endif
    @if ($disabled) disabled @endif
    onchange="updateStatus(this)"
  />
  <label for="{{ $name }}_{{ $id }}">
    <i class="las la-check"></i>
    <i class="las la-times"></i>
  </label>
</div>

@once
  @push('footer')
    <script type="text/javascript">
      function updateStatus(cb) {
        let id = $(cb).data('id');
        let name = $(cb).data('name');
        let model = $(cb).data('model');
        let status = 0;

        if ($(cb).prop('checked')) {
          status = 1;
        }

        $.ajax({
          type: "post",
          url: "{{ $url }}",
          data: {
            id: id,
            field_name: name,
            value: status,
            model: model,
            _token: '{{ csrf_token() }}'
          },
          dataType: 'json'
        });
      }
    </script>
  @endpush
@endonce