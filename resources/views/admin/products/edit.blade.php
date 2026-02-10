@extends('admin.layouts.app')

@section('content')
  <x-section-container column="col-xl-9 col-lg-10 col-md-12">
    <x-slot name="title">
      {{ $title }}
    </x-slot>

    <x-slot name="breadcrumbs">
      <x-breadcrumbs url="{{ route('admin.dashboard') }}">
        <x-breadcrumb-item url="{{ route('admin.products.index') }}" label="{{ $section_title }}" />
        <x-breadcrumb-item class="active" label="{{ $title }}" />
      </x-breadcrumbs>
    </x-slot>

    <x-slot name="buttons">
      <x-button-back href="{{ route('admin.products.index') }}" />
    </x-slot>

    <x-form action="{{ route('admin.products.update', ['product' => $row]) }}" method="put" enctype="multipart/form-data">
      <x-form-group label="{{ __('Title') }}" inputId="title">
        <x-input name="title" :value="$row->title" required />
      </x-form-group>

      @if (! $row->is_default)
        <x-form-group label="{{ __('Slug') }}" inputId="slug">
          <x-slug name="slug" :value="$row->slug" required />
        </x-form-group>
      @endif

      <x-form-group label="{{ __('Category') }}" inputId="role">
        <x-select name="category_id" class="select2" required>
          <option value="">--{{ __('select') }}--</option>
          @foreach ($categories as $category)
            <option value="{{ $category->id }}" @selected($category->id == $row->category_id)>{{ $category->title }}</option>
          @endforeach
        </x-select>
      </x-form-group>

      <x-form-group label="{{ __('Description') }}">
        <x-editor name="description" :value="$row->description" />
      </x-form-group>

      <x-form-group label="{{ __('Image') }}" inputId="image">
        <x-input type="file" name="image" />
        <img src="{{ url('storage/media/productImage/'.$row->image) }}" style="width:10%"  />
      </x-form-group>

      <x-form-seo :data="$row" />

      <x-button-save-changes />
    </x-form>
  </x-section-container>
@endsection
@push('header')
  <x-select2-css />
@endpush

@push('footer')
  <x-select2-js />
  <script>
    $.fn.select2.defaults.set( "theme", "bootstrap" );
    $('.select2').select2();
  </script>
@endpush
