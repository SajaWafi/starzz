@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-200 focus:border-indigo-500 focus:ring focus:ring-indigo-200/50 rounded-xl shadow-sm transition-all duration-200']) }}>
