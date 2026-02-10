<select name="{{ $name }}" id="{{ $id }}" {{ $attributes->merge(['class' => 'form-select']) }}>
  {{ $slot }}

  @foreach ($options as $key => $label)
    <option value="{{ $key }}" @if ($isSelected($key)) selected @endif>
      {{ $label }}
    </option>
  @endforeach
</select>
<x-form-error name="{{ $name }}" />
