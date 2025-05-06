<div class="bg-bege-claro min-h-screen p-4 sm:p-6">
    <div class="max-w-7xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        <!-- Cabeçalho -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 p-4 sm:p-6 border-b border-cinza-claro">
            <h1 class="text-2xl sm:text-3xl font-bold text-azul-escuro">Lista de Turmas</h1>
            <a href="#" class="w-full sm:w-auto bg-azul-escuro hover:bg-azul-escuro/90 text-white font-medium py-2 px-4 rounded-lg transition-all text-center">
                Nova Turma
            </a>
        </div>

        <!-- Filtros e Busca -->
        <div class="p-4 sm:p-6">
            <div class="flex flex-col md:flex-row gap-4 items-stretch">
                <div class="flex-1">
                    <input
                        wire:model.lazy="search"
                        type="text"
                        placeholder="Buscar turmas..."
                        class="w-full p-3 border border-cinza-claro rounded-lg focus:ring-2 focus:ring-azul-escuro focus:border-transparent"
                    >
                </div>
                <div class="flex flex-col sm:flex-row gap-4">
                    <label class="flex items-center justify-between sm:justify-start gap-2 cursor-pointer">
                        <span class="text-sm sm:text-base text-cinza-medio whitespace-nowrap">Mostrar inativas</span>
                        <div class="relative">
                            <input
                                wire:model="showInactive"
                                type="checkbox"
                                class="sr-only peer"
                            >
                            <div class="w-11 h-6 bg-cinza-claro rounded-full peer peer-checked:bg-verde-bandeira peer-checked:after:translate-x-full after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border after:rounded-full after:h-5 after:w-5 after:transition-all"></div>
                        </div>
                    </label>
                    <select
                        wire:model="perPage"
                        class="p-2 border border-cinza-claro rounded-lg focus:ring-2 focus:ring-azul-escuro"
                    >
                        <option value="5">5 por página</option>
                        <option value="10">10 por página</option>
                        <option value="25">25 por página</option>
                        <option value="50">50 por página</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Tabela - Versão Desktop -->
        <div class="hidden md:block overflow-x-auto p-2">
            <table class="min-w-full divide-y divide-cinza-claro">
                <thead class="bg-azul-escuro text-white">
                    <tr>
                        <th wire:click="sortBy('nome')" class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider cursor-pointer hover:bg-azul-escuro/90">
                            <div class="flex items-center">
                                Nome
                                @if($sortField === 'nome')
                                    @if($sortDirection === 'asc')
                                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/>
                                        </svg>
                                    @else
                                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    @endif
                                @endif
                            </div>
                        </th>
                        <th wire:click="sortBy('ano')" class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider cursor-pointer hover:bg-azul-escuro/90">
                            <div class="flex items-center">
                                Ano
                                @if($sortField === 'ano')
                                    @if($sortDirection === 'asc')
                                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/>
                                        </svg>
                                    @else
                                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    @endif
                                @endif
                            </div>
                        </th>
                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">
                            Turno
                        </th>
                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">
                            Nível
                        </th>
                        <th wire:click="sortBy('status')" class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider cursor-pointer hover:bg-azul-escuro/90">
                            <div class="flex items-center">
                                Status
                                @if($sortField === 'status')
                                    @if($sortDirection === 'asc')
                                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/>
                                        </svg>
                                    @else
                                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    @endif
                                @endif
                            </div>
                        </th>
                        <th class="px-4 py-3 text-right text-xs font-medium uppercase tracking-wider">
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-cinza-claro">
                    @forelse($classes as $class)
                        <tr class="hover:bg-cinza-claro/50 transition-colors">
                            <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-azul-escuro">
                                {{ $class->nome }}
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-cinza-medio">
                                {{ $class->ano }}
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-cinza-medio">
                                {{ ucfirst($class->turno) }}
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-cinza-medio">
                                {{ ucfirst($class->nivel) }}
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                    {{ $class->status === 'ativo' ? 'bg-verde-bandeira/10 text-verde-bandeira' : 'bg-vermelho-suave/10 text-vermelho-suave' }}">
                                    {{ ucfirst($class->status) }}
                                </span>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end gap-2">
                                    <a href="#" class="text-amarelo-ouro hover:text-amarelo-ouro/80 bg-amarelo-ouro/10 hover:bg-amarelo-ouro/20 px-3 py-1 rounded-md transition-colors">
                                        Editar
                                    </a>
                                    <button wire:click="toggleStatus({{ $class->id }})" class="{{ $class->status === 'ativo' ? 'text-vermelho-suave hover:text-vermelho-suave/80 bg-vermelho-suave/10 hover:bg-vermelho-suave/20' : 'text-verde-bandeira hover:text-verde-bandeira/80 bg-verde-bandeira/10 hover:bg-verde-bandeira/20' }} px-3 py-1 rounded-md transition-colors">
                                        {{ $class->status === 'ativo' ? 'Inativar' : 'Ativar' }}
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-3 text-center text-sm text-cinza-medio">
                                Nenhuma turma encontrada
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Cards - Versão Mobile -->
        <div class="md:hidden space-y-4 p-4">
            @forelse($classes as $class)
                <div class="bg-white rounded-lg shadow-sm border border-cinza-claro p-4">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-lg font-medium text-azul-escuro">{{ $class->nome }}</h3>
                            <p class="text-sm text-cinza-medio mt-1">
                                <span class="font-medium">Ano:</span> {{ $class->ano }} |
                                <span class="font-medium">Turno:</span> {{ ucfirst($class->turno) }}
                            </p>
                        </div>
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                            {{ $class->status === 'ativo' ? 'bg-verde-bandeira/10 text-verde-bandeira' : 'bg-vermelho-suave/10 text-vermelho-suave' }}">
                            {{ ucfirst($class->status) }}
                        </span>
                    </div>

                    <div class="mt-3 pt-3 border-t border-cinza-claro flex justify-between items-center">
                        <span class="text-sm text-cinza-medio">
                            <span class="font-medium">Nível:</span> {{ ucfirst($class->nivel) }}
                        </span>
                        <div class="flex gap-2">
                            <a href="#" class="text-amarelo-ouro hover:text-amarelo-ouro/80 bg-amarelo-ouro/10 hover:bg-amarelo-ouro/20 px-2 py-1 rounded-md transition-colors text-sm">
                                Editar
                            </a>
                            <button wire:click="toggleStatus({{ $class->id }})" class="{{ $class->status === 'ativo' ? 'text-vermelho-suave hover:text-vermelho-suave/80 bg-vermelho-suave/10 hover:bg-vermelho-suave/20' : 'text-verde-bandeira hover:text-verde-bandeira/80 bg-verde-bandeira/10 hover:bg-verde-bandeira/20' }} px-2 py-1 rounded-md transition-colors text-sm">
                                {{ $class->status === 'ativo' ? 'Inativar' : 'Ativar' }}
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-white rounded-lg shadow-sm border border-cinza-claro p-4 text-center text-sm text-cinza-medio">
                    Nenhuma turma encontrada
                </div>
            @endforelse
        </div>

        <!-- Paginação -->
        <div class="px-4 py-3 sm:px-6">
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
</div>
