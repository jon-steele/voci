@props(['disabled' => false])

<input rows="4" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'text-gray-700 border-primary rounded-md shadow-lg']) !!}>