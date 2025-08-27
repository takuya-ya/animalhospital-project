@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'px-4 py-2 border border-[#715433] rounded-md text-[#715433] placeholder-[#715433] focus:outline-none focus:ring-2 focus:ring-[#715433] w-full']) !!}>
