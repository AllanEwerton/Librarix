<button {{ $attributes->merge([
    'type' => 'button',
    'class' => '
        inline-flex items-center
        px-4 py-2
        bg-white
        border border-verde-bandeira
        rounded-md
        font-semibold text-xs
        text-verde-bandeira uppercase tracking-widest
        shadow-sm
        hover:bg-bege-claro
        focus:outline-none focus:ring-2 focus:ring-verde-bandeira focus:ring-offset-2
        disabled:opacity-50
        transition ease-in-out duration-150
    '
]) }}>
    {{ $slot }}
</button>
