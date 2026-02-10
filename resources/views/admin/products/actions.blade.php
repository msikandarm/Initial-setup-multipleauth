<div class="text-center">
<x-button-pdf href="{{ route('admin.pdf.generate', ['pdf' => $row]) }}" />
  <x-button-edit href="{{ route('admin.products.edit', ['product' => $row]) }}" />
    @if (! $row->is_default)
  <x-button-delete action="{{ route('admin.products.destroy', ['product' => $row]) }}" />
    @endif
</div>
