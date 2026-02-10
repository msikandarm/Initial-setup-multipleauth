@if ($status)
<x-badge type="success" label="{{ __('Active') }}" />
@else
<x-badge type="danger" label="{{ __('Inactive') }}" />
@endif