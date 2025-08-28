@props(['href' => '#', 'active' => false])

@php
$classes = ($active ?? false)
    ? 'flex items-center px-4 py-3 text-white transition-colors duration-300 transform rounded-md bg-blue-600'
    : 'flex items-center px-4 py-3 text-gray-300 transition-colors duration-300 transform rounded-md hover:bg-blue-800 hover:text-white';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }} href="{{ $href }}">
    {{ $slot }}
</a>