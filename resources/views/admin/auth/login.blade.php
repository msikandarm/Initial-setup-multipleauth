@extends('admin.auth.layout')

@section('page_title')
  {{ __('Login') }} | {{ config('app.name') }}
@endsection

@section('content')
  <div class="card">
    <div class="card-body">
      <x-alert type="success" message="{{ session('status') }}" />
      <x-form action="{{ route('login') }}" method="post" id="login_form">
        <x-form-group label="{{ __('Username/Email') }}" inputId="username">
          <x-input name="username" required />
        </x-form-group>
        <x-form-group label="{{ __('Password') }}" inputId="password">
          <x-input type="password" name="password" required />
        </x-form-group>
        <div class="row">
          <div class="col-sm-6 mb-4">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
              <label class="form-check-label" for="remember">{{ __('Remember me') }}</label>
            </div>
          </div>
          <div class="col-sm-6 d-none d-sm-block">
            <div class="forgot_password">
              <a href="{{ route('password.request') }}"><strong>{{ __('Forgot Password?') }}</strong></a>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary btn_styled">{{ __('Login') }}</button>
        <div class="py-3 d-block d-sm-none text-center">
          <a href="{{ route('password.request') }}"><strong>{{ __('Forgot Password?') }}</strong></a>
        </div>
      </x-form>
    </div>
  </div>
@endsection