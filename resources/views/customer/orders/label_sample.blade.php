<div class="text-center">
    @if ($row->status == Constant::ORDER_STATUS_DELIVERED)
      <x-button-label href="{{ route('pdf.generate', ['id' => $row]) }}" />
    @endif
    <x-button-view href="{{ route('order.view', ['order' => $row]) }}" />
  </div>
