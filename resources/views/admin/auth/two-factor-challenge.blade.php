@extends('admin.auth.layout')

@section('page_title')
  {{ __('Two Factor Authentication') }} | {{ config('app.name') }}
@endsection

@section('content')
  <div class="card">
    <div class="card-body" x-data="{recovery: {{ $errors->has('recovery_code') ? 'true' : 'false' }}}">
      @error('recovery_code')
        <x-alert type="danger" message="{{ $message }}" />
      @enderror

      @error('code')
        <x-alert type="danger" message="{{ $message }}" />
      @enderror
      <p class="text-muted" x-show="! recovery">
        {{ __('Please confirm access to your account by entering the authentication code provided by your authenticator application.') }}
      </p>
      <p class="text-muted" x-show="recovery">
        {{ __('Please confirm access to your account by entering one of your emergency recovery codes.') }}
      </p>
      <x-form action="{{ route('two-factor.login') }}" method="post" id="two_factor_form">
        <div class="mb-3" x-show="! recovery">
          <input type="text" name="code" id="code" class="form-control" placeholder="{{ __('Code') }}" inputmode="numeric" x-ref="code" autocomplete="one-time-code" required>
        </div>
        <div class="mb-3" x-show="recovery">
          <input type="text" name="recovery_code" id="recovery_code" class="form-control" placeholder="{{ __('Recovery Code') }}" x-ref="recovery_code" autocomplete="one-time-code" required>
        </div>
        <div class="mb-3">
          <button type="submit" class="btn btn-primary btn_styled">{{ __('Login') }}</button>
        </div>
        <div class="mb-1">
          <a href="javascript:;" x-show="! recovery" x-on:click="recovery = true; $nextTick(() => { $refs.recovery_code.focus() })"><strong>{{ __('Use a recovery code?') }}</strong></a>
          <a href="javascript:;" x-show="recovery" x-on:click="recovery = false; $nextTick(() => { $refs.code.focus() })"><strong>{{ __('Use an authentication code?') }}</strong></a>
        </div>
      </x-form>
    </div>
  </div>
@endsection

@push('footer')
  <x-alpine-js />
@endpush