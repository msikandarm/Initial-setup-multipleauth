@php
  $name = $column->getField();
@endphp
<x-status-switcher
  id="{{ $row->id }}"
  name="{{ $name }}"
  value="{{ $row[$name] }}"
  model="{{ class_basename($row) }}"
  url="{{ route('admin.status.update') }}"
/>