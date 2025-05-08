@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-azul-escuro text-start text-base font-medium text-azul-escuro bg-azul-celeste focus:outline-none focus:text-azul-escuro focus:bg-azul-celeste focus:border-azul-escuro transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-cinza-medio hover:text-azul-escuro hover:bg-amarelo-ouro hover:border-azul-escuro focus:outline-none focus:text-azul-escuro focus:bg-azul-celeste focus:border-azul-escuro transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
