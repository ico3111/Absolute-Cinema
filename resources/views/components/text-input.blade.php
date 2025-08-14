@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['style' =>'background-color: #0e0e0e','class' => 'border-black text-gray-300 focus:border-[#7C0B0B] focus:ring-[#7C0B0B] rounded-md shadow-sm active:bg-gray-900']) }}>
