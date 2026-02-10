<div class="text-center">
  <x-button-edit href="{{ route('admin.pages.edit', ['page' => $row]) }}" />

  @if (! $row->is_default)
    <x-button-delete action="{{ route('admin.pages.destroy', ['page' => $row]) }}" />
  @endif
</div>