@extends('customer.layouts.app')

@section('content')
  <x-section-container column="col-xl-12">
    <x-slot name="title">
      {{ $title }}
    </x-slot>

    <x-slot name="breadcrumbs">
      <x-breadcrumbs url="{{ route('dashboard') }}">
        <x-breadcrumb-item class="active" label="{{ $title }}" />
      </x-breadcrumbs>
    </x-slot>

    <x-slot name="buttons">
      <x-button-back href="{{ route('orders.index') }}" />
    </x-slot>

    <livewire:customer.order-table />
  </x-section-container>
@endsection

@push('header')
  @livewireStyles
@endpush

@push('footer')
  @livewireScripts
  <x-alpine-js />
@endpush
