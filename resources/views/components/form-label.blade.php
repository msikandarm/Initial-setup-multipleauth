<label @if ($for) for="{{ $for }}" @endif {{ $attributes->merge(['class' => 'form-label']) }}>{{ $slot->isEmpty() ? $fallback : $slot }}</label><br>
