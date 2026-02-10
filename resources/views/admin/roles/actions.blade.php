<div class="text-center">
  @if (! $row->is_primary)
    <x-button-edit href="{{ route('admin.roles.edit', ['role' => $row]) }}" />
    <x-button-delete action="{{ route('admin.roles.destroy', ['role' => $row]) }}" />
  @endif
</div>