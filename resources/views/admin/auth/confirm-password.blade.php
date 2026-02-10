@extends('admin.auth.layout')

@section('page_title')
  {{ __('Confirm Password') }} | {{ config('app.name') }}
@endsection

@section('content')
  <div class="card">
    <div class="card-body">
      <h4>{{ __('Confirm Password') }}</h4>
      <p>{{ __('This is a secure area of the application. Please confirm your password before continuing.') }}</p>
      <x-form action="{{ route('password.confirm') }}" method="post" id="confirm_form">
        <x-form-group label="{{ __('Password') }}" inputId="password">
          <x-input type="password" name="password" required />
        </x-form-group>
        <button type="submit" class="btn btn-primary btn_styled">{{ __('Confirm') }}</button>
      </x-form>
    </div>
  </div>
@endsection