<!DOCTYPE html>
<head>
	<title>{{ $title }}</title>
</head>
<body>
  <style>
  @page {margin:0 0 20px 0;}
  h3 {font-size:16px;}
  .small_font {font-size:9px;}
  .big_font {font-size:11px; font-weight:bold;}
  table tr td {font-size:9px;}
  .row {overflow:hidden;}
  .col-6 {float:left; width:50%;}
  .right_col {float:right;}
  p {font-size:11px; font-family: Arial, Helvetica, sans-serif;}
  table {font-size:11px; font-family: Arial, Helvetica, sans-serif;border-bottom:1px solid #212121; border-right:1px solid #212121;}
  table tr td {border:1px solid #212121; border-bottom: 0; border-right:0;}
  .table_bg tr td {background:#f6f6f6;}
  .heading_table {font-size:18px; border:0; margin-bottom:0px;}
  .heading_table tr td {border:0; padding:15px;}

  .title_table {border:1px solid #333; border-bottom:0; border-left:0; border-right:0;}
  .title_table tr td {border:1px solid #333; border-top:0; border-left:0; font-size:13px;}
  .title_table tr td:last-child {border-left:0;}
  .blankspace_table {border-left:1px solid #333; border-bottom:0; border-left:0; border-right:0;}
  .blankspace_table tr {border:0;}
  .blankspace_table tr td {border:0; font-size:13px;}

  .pricing_table {border:1px solid #333; font-size:14px; border-left:0; border-right:0;}
  .pricing_table tr td {border:0; border-right:1px solid #333; font-size:13px;}
  .pricing_table tr td.br-0 {border-right:0;}
  .notes_box {font-size:10px; font-family: Arial, Helvetica, sans-serif; padding:10px;}

  .dimension_table {border:1px solid #333; border-left:0; border-right:0;}
  .dimension_table tr td {border:0; border-right:1px solid #333; border-bottom:1px solid #333;}
  .dimension_table tr td.br-0 {border-right:0;}
  .dimension_table tr td.bb-0 {border-bottom:0;}
</style>
@php
    $order_prefix = Constant::ORDER_PREFIX;
@endphp

  <table width="100%" border="0" cellspacing="0" cellpadding="5" class="heading_table">
    <tr>
      <td>
        <img src="{{public_path('assets/backend/image/logo.png')}}" alt="logo" style="width: 50%; margin-left: 50px;"><br/>
        <p>{!! setting()->get('address') !!}</p>
        <p>Tel: {{ setting()->get('phone_no') }}</p>
      </td>
    </tr>
  </table>
  <table width="100%" border="0" cellspacing="0" cellpadding="5" class="title_table">
    <tr>
      <td width="65%"><div class="small_font">Title</div>
        @if(!empty($customer->name) AND isset($customer->name))
        {{ $customer->name }}
        @endif
      </td>
      <td width="25%" style="border-right:0;"><div class="small_font">Number Of Item</div> {{ $quantity ?? '' }}</td>
    </tr>
  </table>
  <div  class="small_font" style="padding:5px 0px 0px 5px;">
    WareHouse NO:
     <div align="center" style="font-size:30px; font-family: sans-serif;">
         <strong>{{$order_prefix.$order->id }}</strong>
     </div>
   </div>

  <div class="small_font" style="text-align:center; padding: 5px 10px 5px 10px;"><img src="data:image/png;base64,{{DNS1D::getBarcodePNG( $order_prefix.$order->id, 'C39')}}" alt="barcode" />

</div>
<div  class="small_font" style="padding:5px 0px 0px 5px;">
    PO No:
    <div align="center" style="font-size:30px; font-family: sans-serif;">
        <strong>{{$order->purchase_number ?? ' '}}</strong>
    </div>
  </div>
   <div  class="small_font" style="padding:5px 0px 0px 5px;">
   Date Of Order:
     <div align="center" style="font-size:15px; font-family: sans-serif;">
         <strong>{{$order->created_at ?? ' '}}</strong>
     </div>
   </div>
   <div  class="small_font" style="padding:5px 0px 0px 5px;">
    Date of Shipped:
     <div align="center" style="font-size:15px; font-family: sans-serif;">
         <strong>{{$order->shipped_date ?? ' '}}</strong>
     </div>
   </div>
   <div  class="small_font" style="padding:5px 0px 0px 5px;">
    via:
     <div align="center" style="font-size:15px; font-family: sans-serif;">
         <strong>{{$order->type ?? ' '}}</strong>
     </div>
   </div>
  {{-- <div align="center" style="font-size:24px; font-family: sans-serif;">
    <strong>{{$order_prefix.$order->id}}</strong>

  </div> --}}

  {{-- <table width="100%" border="1px solid black" cellspacing="0" cellpadding="5" class="title_table" style="margin-top: 20px;">
    <tr>
        <th style="text-align: left;" class="small_font">Name</th>
        <th class="small_font"> Quantity</th>
        <th class="small_font">Cost Price</th>
    </tr>
    @for ($i= 0; $i < $order->number; $i++)
    <tr>
        <td >
            @foreach ($items as $item)
            {{ ($item->id == $items_val[$i]) ? $item->name : ' ' }}
          @endforeach
        </td>
        <td style="text-align: center;"> {{$quantity[$i] }}</td>
        <td style="text-align: center;" >
             @foreach ($items as $item)
            {{ ($item->id == $items_val[$i]) ? $item->cost_price : ' ' }}
              @endforeach
            </td>
      </tr>
    @endfor
    <tr>
        <td><strong>Total</strong></td>
        <td width="65%" colspan="2"><strong>{{$order->total}}</strong></td>
    </tr>
  </table> --}}
</body>
</html>
