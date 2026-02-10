<div class="text-center">
  <x-button-edit href="{{ route('admin.categories.edit', ['category' => $row]) }}" />
    @if (! $row->is_default)
  <x-button-delete action="{{ route('admin.categories.destroy', ['category' => $row]) }}" />
    @endif
</div>
