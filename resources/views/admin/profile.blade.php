@extends('admin.layouts.app')

@section('content')
  <x-section-container column="col-xl-6 col-lg-7">
    <x-slot name="title">
      {{ $title }}
    </x-slot>

    <x-slot name="breadcrumbs">
      <x-breadcrumbs url="{{ route('admin.dashboard') }}">
        <x-breadcrumb-item class="active" label="{{ $title }}" />
      </x-breadcrumbs>
    </x-slot>

    <x-form action="{{ route('admin.profile.update') }}" method="put" customrules>
      <x-form-group label="{{ __('Name') }}" inputId="name">
        <x-input name="name" :value="auth()->user()->name" required />
      </x-form-group>

      <x-form-group label="{{ __('Username') }}" inputId="username">
        <x-input name="username" :value="auth()->user()->username" required />
      </x-form-group>

      <x-form-group label="{{ __('Email') }}" inputId="email">
        <x-input type="email" name="email" :value="auth()->user()->email" required />
      </x-form-group>

      <x-form-group label="{{ __('Password') }}" inputId="password">
        <x-input type="password" name="password" autocomplete="new-password" />
      </x-form-group>

      <x-form-group label="{{ __('Confirm Password') }}" inputId="password_confirmation">
        <x-input type="password" name="password_confirmation" autocomplete="new-password" />
      </x-form-group>

      <x-button-save-changes />
    </x-form>

    <x-slot name="anotherColumn">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-header">
            <h5>{{ __('Two Factor Authentication') }}</h5>
          </div>
          <livewire:two-factor-authentication-form />
        </div>
      </div>
    </x-slot>
  </x-section-container>
@endsection

@push('header')
  @livewireStyles
@endpush

@push('footer')
  @livewireScripts
  <script>
    $(document).ready(function(){
      $("#section_form").validate({
        rules: {
          password_confirmation: {
            equalTo: "#password"
          }
        }
      });
    });
  </script>
@endpush