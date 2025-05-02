@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge([
    'class' => '
        border-verde-bandeira
        focus:border-verde-folha
        focus:ring-verde-folha
        rounded-md shadow-sm
    '
]) }}>

