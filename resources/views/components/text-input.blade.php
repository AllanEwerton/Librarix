@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 focus:border-verde-bandeira focus:ring-verde-bandeira rounded-md shadow-sm bg-cinza-claro']) }}>


