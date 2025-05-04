@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-azul-escuro']) }}>
    {{ $value ?? $slot }}
</label>

