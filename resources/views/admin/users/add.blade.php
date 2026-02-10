@extends('admin.layouts.app')

@section('content')
  <x-section-container column="col-xl-6 col-lg-7 col-md-8">
    <x-slot name="title">
      {{ $title }}
    </x-slot>

    <x-slot name="breadcrumbs">
      <x-breadcrumbs url="{{ route('admin.dashboard') }}">
        <x-breadcrumb-item url="{{ route('admin.users.index') }}" label="{{ $section_title }}" />
        <x-breadcrumb-item class="active" label="{{ $title }}" />
      </x-breadcrumbs>
    </x-slot>

    <x-slot name="buttons">
      <x-button-back href="{{ route('admin.users.index') }}" />
    </x-slot>

    <x-form action="{{ route('admin.users.store') }}" method="post">
      <x-form-group label="{{ __('Role') }}" inputId="role">
        <x-select name="role" required>
          <option value="">--{{ __('select') }}--</option>
          @foreach ($roles as $role)
            <option value="{{ $role->id }}">{{ $role->name }}</option>
          @endforeach
        </x-select>
      </x-form-group>

      <x-form-group label="{{ __('Name') }}" inputId="name">
        <x-input name="name" required />
      </x-form-group>

      <x-form-group label="{{ __('Username') }}" inputId="username">
        <x-input name="username" required />
      </x-form-group>

      <x-form-group label="{{ __('Email') }}" inputId="email">
        <x-input type="email" name="email" required />
      </x-form-group>

      <x-form-group label="{{ __('Password') }}" inputId="password">
        <x-input type="password" name="password" autocomplete="new-password" required />
      </x-form-group>

      <x-button-publish />
    </x-form>
  </x-section-container>
@endsection