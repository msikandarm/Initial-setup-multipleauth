<div class="card-body">
  <p>
    <strong>
      @if ($this->enabled)
        @if ($showingConfirmation)
          {{ __('Finish enabling two factor authentication.') }}
        @else
          {{ __('You have enabled two factor authentication.') }}
        @endif
      @else
        {{ __('You have not enabled two factor authentication.') }}
      @endif
    </strong>
  </p>

  <p>{{ __('When two factor authentication is enabled, you will be prompted for a secure, random token during authentication. You may retrieve this token from your phone\'s Google Authenticator application.') }}</p>

  @if ($this->enabled)
    @if ($showingQrCode)
      @if ($showingConfirmation)
        <p>{{ __('To finish enabling two factor authentication, scan the following QR code using your phone\'s authenticator application or enter the setup key and provide the generated OTP code.') }}</p>
      @else
        <p>{{ __('Two factor authentication is now enabled. Scan the following QR code using your phone\'s authenticator application or enter the setup key.') }}</p>
      @endif

      <div class="mt-4">
        {!! $this->user->twoFactorQrCodeSvg() !!}
      </div>

      <div class="mt-4">
        <p><strong>{{ __('Setup Key') }}: {{ decrypt($this->user->two_factor_secret) }}</strong></p>
      </div>

      @if ($showingConfirmation)
        <div class="mb-3">
          <input id="code" type="text" class="form-control" name="code" placeholder="Code" inputmode="numeric" autofocus autocomplete="one-time-code" wire:model.defer="code" wire:keydown.enter="confirmTwoFactorAuthentication" />
          @error('code')
            <span class="invalid-feedback d-block" role="alert"> <strong>{{ $message }}</strong> </span>
          @enderror
        </div>
      @endif
    @endif

    @if ($showingRecoveryCodes)
      <p>{{ __('Store these recovery codes in a secure password manager. They can be used to recover access to your account if your two factor authentication device is lost.') }}</p>

      <div class="mb-3 show-recovery-codes">
        @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
          <div>{{ $code }}</div>
        @endforeach
      </div>
    @endif
  @endif

  <div class="mt-3">
    @if (! $this->enabled)
      <button class="btn btn-dark" type="button" wire:loading.attr="disabled" wire:click="enableTwoFactorAuthentication">{{ __('Enable') }}</button>
    @else
      @if ($showingRecoveryCodes)
        <button class="btn btn-primary" type="button" wire:click="regenerateRecoveryCodes">{{ __('Regenerate Recovery Codes') }}</button>
      @elseif ($showingConfirmation)
        <button class="btn btn-dark" type="button" wire:loading.attr="disabled" wire:click="confirmTwoFactorAuthentication">{{ __('Confirm') }}</button>
      @else
        <button class="btn btn-primary" type="button" wire:click="showRecoveryCodes">{{ __('Show Recovery Codes') }}</button>
      @endif

      @if ($showingConfirmation)
        <button class="btn btn-danger" type="button" wire:loading.attr="disabled" wire:click="disableTwoFactorAuthentication">{{ __('Cancel') }}</button>
      @else
        <button class="btn btn-danger" type="button" wire:loading.attr="disabled" wire:click="disableTwoFactorAuthentication">{{ __('Disable') }}</button>
      @endif
    @endif
  </div>
</div>