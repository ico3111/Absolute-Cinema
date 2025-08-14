@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['style' =>'color: #f97b7b','class' => 'border-black text-gray-300 focus:border-[#7C0B0B] focus:ring-[#7C0B0B] rounded-md shadow-sm active:bg-gray-900 file:cursor-pointer file:mr-2 file:rounded-md file:border-0 file:bg-[#0eac0e] file:px-4 file:py-2 file:text-sm file:font-semibold hover:file:bg-[#5A8457]']) }}>
