@props([
    'label' => null,
    'name',
    'options' => [],
    'placeholder' => 'Selecione uma opção',
])

<div class="mb-4">
    @if ($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 mb-1">
            {{ $label }}
        </label>
    @endif

    <select
        id="{{ $name }}"
        name="{{ $name }}"
        {{ $attributes->merge(['class' => 'block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-800 focus:border-blue-800 text-sm']) }}
    >
        <option value="" disabled selected hidden>{{ $placeholder }}</option>

        @foreach ($options as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
        @endforeach
    </select>
</div>
