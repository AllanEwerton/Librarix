<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-white text-xl leading-tight">
            Alunos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @livewire('alunos.form')
        </div>
    </div>
</x-app-layout>
