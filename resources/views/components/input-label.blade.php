@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-[#715433]']) }}>
    {{ $value ?? $slot }}
</label>
