<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-white text-xl leading-tight">
            Turma
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @livewire('classes.form')
            @livewire('classes.lista')

        </div>
    </div>
</x-app-layout>
