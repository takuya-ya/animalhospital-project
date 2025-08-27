@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block py-1 text-orange-500 font-semibold'
            : 'block py-1 hover:text-orange-500 text-gray-700';

@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
