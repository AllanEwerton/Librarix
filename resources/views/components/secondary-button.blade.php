<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-amarelo-ouro border border-gray-300 rounded-md font-semibold text-xs text-azul-escuro uppercase tracking-widest shadow-sm hover:bg-amarelo-sol focus:outline-none focus:ring-2 focus:ring-azul-escuro focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
