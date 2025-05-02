@props(['status'])

@if ($status)
    <div {{ $attributes->merge([
        'class' => 'font-medium text-sm text-verde-bandeira'
    ]) }}>
        {{ $status }}
    </div>
@endif
