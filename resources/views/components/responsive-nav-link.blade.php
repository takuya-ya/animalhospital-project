@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full mt-6 ps-3 pe-4 py-2 border-l-4 border-indigo-400 text-center text-base font-medium text-[#D72638] transition duration-150 ease-in-out'
            : 'block w-full mt-6 ps-3 pe-4 py-2 border-l-4 border-transparent text-center text-base font-medium text-[#D72638] transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
