@props(['records'])
@if (count($records) > 0)
<a {{ $attributes->merge(['class' => 'btn btn-dark btn-sm ms-2']) }}><i class="fa fa-sort"></i> {{ __('Sorting') }}</a>
@endif