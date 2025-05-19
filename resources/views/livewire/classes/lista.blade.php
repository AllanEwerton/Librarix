<div class="bg-bege-claro min-h-screen p-4 sm:p-6">
        <!-- Cabeçalho -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 p-4 sm:p-6 border-b border-cinza-claro">
            <h1 class="text-2xl sm:text-3xl font-bold text-azul-escuro">Lista de Turmas</h1>
            <a href="#" class="w-full sm:w-auto bg-azul-escuro hover:bg-azul-escuro/90 text-white font-medium py-2 px-4 rounded-lg transition-all text-center">
                Nova Turma
            </a>
        </div>

        <!-- Filtros -->
     <div class="mb-6 flex flex-col md:flex-row gap-4">
        <input
            wire:model.live="search"
            type="text"
            placeholder="Buscar alunos..."
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

     <!-- Lista de turma -->
     <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @forelse($classes as $classe)
            <div class="border rounded-lg p-4 shadow-sm">
                <h3 class="font-bold text-lg text-gray-800">{{ $classe->nome }}</h3>

                <div class="mt-2 text-sm text-gray-600">
                    <p>Ano: {{ $classe->ano }}</p>
                    <p>Turno: {{ ucfirst($classe->turno) }}</p>
                    <p>Modalidade: {{ ucfirst($classe->nivel) }}</p>

                    <span class="inline-block mt-1 px-2 py-1 text-xs rounded-full
                        {{ $classe->status === 'ativo' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ ucfirst($classe->status) }}
                    </span>
                </div>

                <div class="mt-3 pt-3 border-t flex justify-end gap-2">
                    <a href="#" class="text-blue-600 hover:text-blue-800 text-sm">Editar</a>
                    <button class="text-sm {{ $classe->status === 'ativo' ? 'text-red-600' : 'text-green-600' }}">
                        {{ $classe->status === 'ativo' ? 'Inativar' : 'Ativar' }}
                    </button>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-8 text-gray-500">
                Nenhuma turma encontrada
            </div>
        @endforelse
     </div>

        <!-- Paginação -->
        <div class="px-4 py-3 sm:px-6 ">
            {{ $classes->links() }}
        </div>

        <!-- Mensagem de Status -->
        @if(session()->has('message'))
            <div class="fixed bottom-4 right-4 z-50">
                <div class="bg-verde-bandeira text-white px-4 py-2 rounded-lg shadow-lg flex items-center animate-fade-in-up">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span>{{ session('message') }}</span>
                </div>
            </div>
        @endif
</div>
