@extends('admin.auth.layout')

@section('page_title')
  {{ __('Reset Password') }} | {{ config('app.name') }}
@endsection

@section('content')
  <div class="card">
    <div class="card-body">
      <h4>{{ __('Reset Password') }}</h4>
      <p>{{ __('Enter your new password.') }}</p>
      <x-form action="{{ route('password.update') }}" method="post" id="reset_form" customrules>
        <input type="hidden" name="token" value="{{ request()->route('token') }}">
        <x-form-group label="{{ __('Email') }}" inputId="email">
          <x-input type="email" name="email" value="{{ old('email', request()->email) }}" required />
        </x-form-group>
        <x-form-group label="{{ __('Password') }}" inputId="password">
          <x-input type="password" name="password" autocomplete="new-password" required />
        </x-form-group>
        <x-form-group label="{{ __('Confirm Password') }}" inputId="password_confirmation">
          <x-input type="password" name="password_confirmation" autocomplete="new-password" />
        </x-form-group>
        <button type="submit" class="btn btn-primary btn_styled">{{ __('Reset Password') }}</button>
      </x-form>
    </div>
  </div>
@endsection

@push('footer')
  <script>
    $("#reset_form").validate({
      rules: {
        password_confirmation: {
          equalTo: "#password"
        }
      }
    });
  </script>
@endpush