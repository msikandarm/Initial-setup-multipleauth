@props(['action', 'title' => 'record'])
<x-form action="{{ $action }}" method="delete" class="d-inline" novalidate>
  <button type="submit" {{ $attributes->merge(['class' => 'btn btn-outline-danger btn-sm mb-1']) }} onclick="return window.confirm('{{ __('Are you sure you want to delete :title', ['title' => addslashes($title).'?']) }}');">{{ __('Delete') }}</button>
</x-form>