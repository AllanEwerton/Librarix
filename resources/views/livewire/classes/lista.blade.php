
<div class="bg-white p-4 rounded-lg shadow">
    <!-- Cabeçalho -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Lista de Turma</h1>
        <a href="#" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            Novo Turma
        </a>
    </div>

    <!-- Filtros -->
    <div class="mb-6 flex flex-col md:flex-row gap-4">
        <input
            wire:model.live="search"
            type="text"
            placeholder="Buscar Turma..."
            class="flex-1 p-2 border rounded"
        >

        <div class="flex items-center gap-4">
            <label class="flex items-center gap-2">
                <span class="text-gray-600">Mostrar inativos</span>
                <input wire:model.live="showInactive" type="checkbox" class="h-5 w-5">
            </label>

            <select wire:model.live="perPage" class="p-2 pr-10 border rounded">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="25">25</option>
            </select>
        </div>
    </div>

    <!-- Lista de Turma -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @forelse($classes as $turma)
            <div class="border rounded-lg p-4 shadow-sm">
                <h3 class="font-bold text-lg text-gray-800">{{ $turma->nome }}</h3>

                <div class="mt-2 text-sm text-gray-600">
                    <p>Ano: {{ $turma->ano }}</p>
                    <p>Turno: {{ ucfirst($turma->turno) }}</p>
                    <p>Modalidade: {{ ucfirst($turma->nivel) }}</p>
                    <span class="inline-block mt-1 px-2 py-1 text-xs rounded-full
                        {{ $turma->status === 'ativo' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ ucfirst($turma->status) }}
                    </span>
                </div>

                <div class="mt-3 pt-3 border-t flex justify-end gap-2">
                    <x-secondary-button
                        wire:click="edit({{ $turma->id }})"
                        class="bg-blue-600 hover:bg-blue-700 text-white">
                        Editar
                    </x-secondary-button>

                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-8 text-gray-500">
                Nenhum aluno encontrado
            </div>
        @endforelse
    </div>

    <!-- Paginação -->
    <div class="mt-6">
        {{ $classes->links() }}
    </div>
</div>
