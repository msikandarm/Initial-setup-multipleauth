<div {{ $attributes->class($switchClasses()) }}>
  <input
    type="checkbox"
    name="{{ $name }}"
    id="{{ $name }}"
    value="yes"
    @if ($value === 'yes') checked @endif
    onchange="changeSwitchAction(this, '{{ $target }}')"
  />
  <label for="{{ $name }}">
    <i class="las la-check"></i>
    <i class="las la-times"></i>
  </label>
</div>
@once
  @push('footer')
    <script>
      function changeSwitchAction(cb, target) {
        if ($(cb).prev('input').is(':checked')) {
          $(`#${target}`).addClass('d-none');
          return;
        }

        $(`#${target}`).removeClass('d-none');
      }
    </script>
  @endpush
@endonce