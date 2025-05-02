@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-verde-bandeira bg-azul-claro px-4 py-2 rounded shadow-sm']) }}>
        {{ $status }}
    </div>
@endif
