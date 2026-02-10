<div class="text-center">
  <x-button-edit href="{{ route('admin.users.edit', ['user' => $row]) }}" />
  <x-button-delete action="{{ route('admin.users.destroy', ['user' => $row]) }}" />
</div>