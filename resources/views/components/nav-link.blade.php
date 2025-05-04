@props(['active'])

@php
$classes = ($active ?? false)
    ? 'inline-flex items-center px-1 pt-1 border-b-2 border-amarelo-ouro text-white text-sm font-medium leading-5 focus:outline-none focus:border-azul-celeste transition duration-150 ease-in-out'
    : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-blue-200 hover:text-white hover:border-amarelo-ouro focus:outline-none focus:text-white focus:border-azul-celeste transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

