@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-[#7C0B0B]']) }}>
    {{ $value ?? $slot }}
</label>
