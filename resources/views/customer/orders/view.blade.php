@extends('customer.layouts.app')

@section('content')
  <x-section-container column="col-xl-6 col-lg-7 col-md-8">
    <x-slot name="title">
      {{ $title }}
    </x-slot>

    <x-slot name="breadcrumbs">
      <x-breadcrumbs url="{{ route('dashboard') }}">
        <x-breadcrumb-item url="{{ route('orders.index') }}" label="{{ $section_title }}" />
        <x-breadcrumb-item class="active" label="{{ $title }}" />
      </x-breadcrumbs>
    </x-slot>

    <x-slot name="buttons">
      <x-button-back href="{{ route('orders.index') }}" />
    </x-slot>

        <x-form-group label="{{ __('Customer') }}" inputId="customer">
            <x-select name="customer_id" class="select2" disabled>
              <option value="">--{{ __('select') }}--</option>
              @foreach ($customers as $customer)
                <option value="{{ $customer->id }}" @selected($customer->id == $row->customer_id)>{{ $customer->name }}</option>
              @endforeach
            </x-select>
          </x-form-group>

          <x-form-group label="{{ __('P.O Number') }}" inputId="purchase_number">
            <x-input  name="purchase_number" :value="$row->purchase_number" disabled />
          </x-form-group>

          <x-form-group label="{{ __('Status ') }}" inputId="status">
            <x-select name="status"  disabled>
              <option value="{{Constant::ORDER_STATUS_PENDING}}" @selected(Constant::ORDER_STATUS_PENDING == $row->status)>{{Constant::ORDER_STATUS_PENDING}}</option>
              <option value="{{Constant::ORDER_STATUS_SHIPPED}}" @selected(Constant::ORDER_STATUS_SHIPPED == $row->status)>{{Constant::ORDER_STATUS_SHIPPED}}</option>
              <option value="{{Constant::ORDER_STATUS_DELIVERED}}" @selected(Constant::ORDER_STATUS_DELIVERED == $row->status)>{{Constant::ORDER_STATUS_DELIVERED}}</option>
            </x-select>
          </x-form-group>

          <x-form-group label="{{ __('Type ') }}" inputId="type">
            <x-select name="type"  disabled>
              <option value="{{Constant::ORDER_TYPE_AIR}}" @selected(Constant::ORDER_TYPE_AIR == $row->type)>{{Constant::ORDER_TYPE_AIR}}</option>
              <option value="{{Constant::ORDER_TYPE_OCEAN}}" @selected(Constant::ORDER_TYPE_OCEAN == $row->type)>{{Constant::ORDER_TYPE_OCEAN}}</option>
            </x-select>
          </x-form-group>

          <x-form-group label="{{ __('Shipping Price') }}" inputId="purchase_number">
            <x-input  name="purchase_number" :value="$row->shipping_price" disabled />
          </x-form-group>

          <x-form-group label="{{ __('Number of Items') }}" inputId="item">
            <x-select id="item_number" name="number" disabled>
                <option value="">--{{ __('select') }}--</option>
                @for($i=1; $i <= 100; $i++)
                  <option value="{{ $i }}" @selected($i == $row->number) >{{ $i }}</option>
                @endfor
              </x-select>
          </x-form-group>

              <div class="row">
                <div class="row" id="label_hide_show" >
                    <div class="col-sm-4"><x-form-group label="{{ __('Item ') }}" > </x-form-group></div>
              <div class="col-sm-4"><x-form-group label="{{ __('Quantity ') }}" inputId="quantity"> </x-form-group></div>
              <div class="col-sm-4"><x-form-group label="{{ __('Vendor ') }}" inputId="vendor"> </x-form-group></div>
                </div>
                @foreach ($orderdetails as $key => $detail)
                <div class="row">
                    <div class="col-sm-4">
                        <x-select name="item_id[]" class="mb-3 itemselect"  disabled>
                            <option value="">--{{ __('select') }}--</option>
                            @foreach ($items as $item)
                            <option value="{{ $item->id }}" price="{{$item->sale_price}}" {{ ($item->id == $detail->item_id) ? 'selected' : '' }}>{{ $item->name }}  ({{ format_price($item->sale_price) }})</option>
                            @endforeach
                        </x-select>
                    </div>
                    <div class="col-sm-4">

                     <x-input  name="quantity[]" class="mb-3 quantity" :value="$detail->quantity" disabled />

                    </div>
                    <div class="col-sm-4 ">
                        <span class="vendor">{{getVendor($detail->item_id)}}</span>
                      </div>
                </div>
                @endforeach
              </div>
              <div class="row">
                <div class="col-sm-12" >
                   <div class="row" id="item_fields">

                   </div>
                </div>
              </div>
              <div class="row">
                <h1 style="width: 130px">Total : </h1> <h3 style="width: 200px;display: flex;
                flex-direction: column-reverse;"  name="total_price" id="total_price"  > {{$row->total ?? ' '}}</h3>
                <x-input type="hidden" name="total_price" id="total_price_new"  />
                </div>
  </x-section-container>
@endsection
