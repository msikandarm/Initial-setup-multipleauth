<div class="body_contents p-0">
  <div class="section-header-part">
    <div class="row">
      <div class="col-lg-6 align-self-center">
        <h5>{{ $title }}</h5>
      </div>
      <div class="col-lg-6 text-lg-end text-center">
        {{ $buttons ?? '' }}
      </div>
    </div>
  </div>

  {{ $breadcrumbs ?? '' }}

  <div {{ $attributes->merge(['class' => 'container-fluid padding-15']) }}>
    <div class="row">
      <div class="{{ $column }}">
        <x-alert type="success" message="{{ session('success') }}" />
        <x-alert type="danger" message="{{ session('error') }}" />
        {{ $slot }}
      </div>
      {{ $anotherColumn ?? '' }}
    </div>
  </div>
</div>