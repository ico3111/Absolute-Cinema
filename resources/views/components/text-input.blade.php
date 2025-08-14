@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['style' =>'background-color: #0e0e0e','class' => ' text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) }}>
