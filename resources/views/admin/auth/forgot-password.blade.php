@extends('admin.auth.layout')

@section('page_title')
  {{ __('Forgot Password') }} | {{ config('app.name') }}
@endsection

@section('content')
  <div class="card">
    <div class="card-body">
      <x-alert type="success" message="{{ session('status') }}" />
      <h4>{{ __('Forgot Password') }}</h4>
      <p>{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}</p>
      <x-form action="{{ route('password.email') }}" method="post" id="forgot_form">
        <x-form-group label="{{ __('Email') }}" inputId="email">
          <x-input type="email" name="email" required />
        </x-form-group>
        <button type="submit" class="btn btn-primary btn_styled">{{ __('Send Password Reset Link') }}</button>
        <div class="py-3 text-center">
          <a href="{{ route('login') }}"><strong>{{ __('Click here to login') }}</strong></a>
        </div>
      </x-form>
    </div>
  </div>
@endsection