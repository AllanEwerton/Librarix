@props(['type' => 'success', 'message'])

@php
    $colors = [
        'success' => 'bg-green-100 border-green-400 text-green-700',
        'error' => 'bg-red-100 border-red-400 text-red-700',
        'warning' => 'bg-yellow-100 border-yellow-400 text-yellow-700',
    ];
@endphp

<div class="mb-4 p-4 border rounded {{ $colors[$type] }}">
    {{ $message }}
</div>
