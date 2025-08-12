@props(['disabled' => false])

<select @disabled($disabled) {{ $attributes->merge(['style' =>'background-color: #0e0e0e', 'class' => 'border-gray-900 focus:border-indigo-600 focus:ring-indigo-600 rounded-md shadow-sm']) }}>
{{ $slot }}</select>
