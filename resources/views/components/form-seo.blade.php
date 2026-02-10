<div x-data="{meta_title: '{{ addslashes($meta_title) }}', meta_description: '{{ addslashes($meta_description) }}'}">
  <h5 class="mt-4">{{ __('SEO Settings') }}</h5>
  <div class="form-group">
    <label for="meta_title">{{ __('Meta Title') }}</label>
    <span class="pull-right">
      <span x-text="55 - meta_title.length"></span> {{ __('Remaining characters') }}
    </span>
    <input type="text" name="meta_title" id="meta_title" class="form-control" x-model="meta_title">
  </div>
  <div class="form-group">
    <label for="meta_description">{{ __('Meta Description') }}</label>
    <span class="pull-right">
      <span x-text="150 - meta_description.length"></span> {{ __('Remaining characters') }}
    </span>
    <textarea name="meta_description" id="meta_description" cols="30" rows="3" class="form-control" x-model="meta_description"></textarea>
  </div>
</div>

@once
  @push('footer')
    <x-alpine-js />
  @endpush
@endonce
