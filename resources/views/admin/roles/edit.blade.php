@extends('admin.layouts.app')

@section('content')
  <x-section-container column="col-xxl-10 col-xl-11 col-lg-12">
    <x-slot name="title">
      {{ $title }}
    </x-slot>

    <x-slot name="breadcrumbs">
      <x-breadcrumbs url="{{ route('admin.dashboard') }}">
        <x-breadcrumb-item url="{{ route('admin.roles.index') }}" label="{{ $section_title }}" />
        <x-breadcrumb-item class="active" label="{{ $title }}" />
      </x-breadcrumbs>
    </x-slot>

    <x-slot name="buttons">
      <x-button-back href="{{ route('admin.roles.index') }}" />
    </x-slot>

    @error('permissions')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <x-form action="{{ route('admin.roles.update', ['role' => $row]) }}" method="put">
      <x-form-group label="{{ __('Name') }}" inputId="name">
        <x-input name="name" :value="$row->name" required />
      </x-form-group>

      <div class="row">
        @foreach ($permissions as $group)
          <div class="col-sm-3 mb-3">
            <p class="mb-2"><strong>{{ $group->name }}</strong></p>
            @foreach ($group->groupPermissions as $permission)
              <x-checkbox name="permissions[]" id="permission_{{ $permission->id }}" value="{{ $permission->id }}" label="{{ Str::ucfirst(Str::replace('-', ' ', $permission->name)) }}" checkedvalue="{{ in_array($permission->id, $role_permissions) ? $permission->id : '' }}" />
            @endforeach
          </div>
        @endforeach
      </div>

      <x-button-save-changes />
    </x-form>
  </x-section-container>
@endsection