@props(['disabled' => false])

<div x-data="{ show: false }" class="relative">
    <input
        :type="show ? 'text' : 'password'"
        @disabled($disabled)
        {{ $attributes->merge(['class' => 'border-gray-300 focus:border-verde-bandeira focus:ring-verde-bandeira rounded-md shadow-sm bg-cinza-claro w-full pr-10']) }}
    />

    <button
        type="button"
        class="absolute inset-y-0 right-0 px-3 flex items-center text-sm text-gray-600"
        @click="show = !show"
    >
        <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
             viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
        </svg>
        <svg x-show="show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
             viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.974 9.974 0 013.303-4.919M9.88 9.88a3 3 0 104.24 4.24M3 3l18 18" />
        </svg>
    </button>
</div>


