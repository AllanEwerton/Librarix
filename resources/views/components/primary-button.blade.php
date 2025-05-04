<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-azul-escuro border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-azul-celeste focus:bg-verde-folha active:bg-verde-bandeira focus:outline-none focus:ring-2 focus:ring-verde-bandeira focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
