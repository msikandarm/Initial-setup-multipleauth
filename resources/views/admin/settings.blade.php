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

    <div class="custom_tabs">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button @class(['nav-link', 'active' => $tab === 'general']) id="general-tab" data-bs-toggle="tab" data-bs-target="#general-tab-pane" type="button" role="tab" aria-controls="general-tab-pane" aria-selected="true">General</button>
        </li>
        <li class="nav-item" role="presentation">
          <button @class(['nav-link', 'active' => $tab === 'social']) id="social-tab" data-bs-toggle="tab" data-bs-target="#social-tab-pane" type="button" role="tab" aria-controls="social-tab-pane" aria-selected="false">Social Media</button>
        </li>
        <li class="nav-item" role="presentation">
          <button @class(['nav-link', 'active' => $tab === 'smtp']) id="smtp-tab" data-bs-toggle="tab" data-bs-target="#smtp-tab-pane" type="button" role="tab" aria-controls="smtp-tab-pane" aria-selected="false">SMTP</button>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div @class(['tab-pane', 'fade', 'show' => $tab === 'general', 'active' => $tab === 'general']) id="general-tab-pane" role="tabpanel" aria-labelledby="general-tab" tabindex="0">
          <x-form action="{{ route('admin.settings.update') }}" method="put" id="general_form">
            <x-form-group label="{{ __('Target Email') }}" inputId="target_email">
              <x-input name="target_email" :value="setting()->get('target_email')" required />
            </x-form-group>

            <x-form-group label="{{ __('Website Email') }}" inputId="website_email">
              <x-input name="website_email" type="email" :value="setting()->get('website_email')" required />
            </x-form-group>

            <x-form-group label="{{ __('Website Phone') }}" inputId="website_phone">
              <x-input name="website_phone" :value="setting()->get('website_phone')" />
            </x-form-group>

            <x-form-group label="{{ __('Website Address') }}" inputId="website_address">
              <x-textarea name="website_address" :value="setting()->get('website_address')" rows="3" />
            </x-form-group>

            <x-button-save-changes />
          </x-form>
        </div>
        <div @class(['tab-pane', 'fade', 'show' => $tab === 'social', 'active' => $tab === 'social']) id="social-tab-pane" role="tabpanel" aria-labelledby="social-tab" tabindex="0">
          <x-form action="{{ route('admin.settings.social.update') }}" method="put" id="social_form">
            <x-form-group label="{{ __('Facebook') }}" inputId="facebook">
              <x-input name="facebook" :value="setting()->get('facebook')" />
            </x-form-group>

            <x-form-group label="{{ __('Twitter') }}" inputId="twitter">
              <x-input name="twitter" :value="setting()->get('twitter')" />
            </x-form-group>

            <x-form-group label="{{ __('Instagram') }}" inputId="instagram">
              <x-input name="instagram" :value="setting()->get('instagram')" />
            </x-form-group>

            <x-form-group label="{{ __('YouTube') }}" inputId="youtube">
              <x-input name="youtube" :value="setting()->get('youtube')" />
            </x-form-group>

            <x-button-save-changes />
          </x-form>
        </div>
        <div @class(['tab-pane', 'fade', 'show' => $tab === 'smtp', 'active' => $tab === 'smtp']) id="smtp-tab-pane" role="tabpanel" aria-labelledby="smtp-tab" tabindex="0">
          <x-form action="{{ route('admin.settings.smtp.update') }}" method="put" id="smtp_form">
            <x-form-group label="{{ __('Host') }}" inputId="smtp_host">
              <x-input name="smtp_host" :value="setting()->get('smtp_host')" required />
            </x-form-group>

            <x-form-group label="{{ __('Username') }}" inputId="smtp_username">
              <x-input name="smtp_username" :value="setting()->get('smtp_username')" />
            </x-form-group>

            <x-form-group label="{{ __('Password') }}" inputId="smtp_password">
              <x-input name="smtp_password" :value="setting()->get('smtp_password')" />
            </x-form-group>

            <x-form-group label="{{ __('Port') }}" inputId="smtp_port">
              <x-input name="smtp_port" :value="setting()->get('smtp_port')" />
            </x-form-group>

            <x-form-group label="{{ __('Encryption') }}" inputId="smtp_encryption">
              <x-select name="smtp_encryption">
                <option value="tls">TLS</option>
                <option value="ssl" @selected(setting()->get('smtp_encryption') === 'ssl')>SSL</option>
              </x-select>
            </x-form-group>

            <x-form-group label="{{ __('From Email') }}" inputId="smtp_from_email">
              <x-input name="smtp_from_email" :value="setting()->get('smtp_from_email')" />
            </x-form-group>

            <x-button-save-changes />
          </x-form>
        </div>
      </div>
    </div>
  </x-section-container>
@endsection