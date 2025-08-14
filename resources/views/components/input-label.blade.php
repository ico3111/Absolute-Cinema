@props(['value'])

<label {{ $attributes->merge(['style' => 'color:#f97b7b', 'class' => 'block font-medium text-sm text-[#f97b7b]']) }}>
    {{ $value ?? $slot }}
</label>
