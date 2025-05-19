<div class="space-y-8 p-6 bg-white rounded-xl shadow-md">
    @if (session('success'))
        <x-alert type="success" :message="session('success')" />
    @endif

    @if (session('error'))
        <x-alert type="error" :message="session('error')" />
    @endif

    <h2 class="text-2xl font-bold text-gray-800 border-b pb-3">Cadastro de Aluno</h2>

    <form wire:submit.prevent="save" class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Campo Nome -->
            <div class="space-y-2">
                <x-input-label for="nome" :value="__('Nome Completo')" class="font-medium text-gray-700" />
                <x-text-input
                    wire:model="nome"
                    id="nome"
                    type="text"
                    name="nome"
                    placeholder="Digite o nome completo"
                />
                <x-input-error :messages="$errors->get('nome')" class="mt-1 text-sm text-red-600" />
            </div>

            <!-- Campo Email -->
            <div class="space-y-2">
                <x-input-label for="email" :value="__('E-mail')" class="font-medium text-gray-700" />
                <x-text-input
                    wire:model.debounce.500ms="email"
                    id="email"
                    type="email"
                    name="email"
                    placeholder="exemplo@escola.com"
                />
                <x-input-error :messages="$errors->get('email')" class="mt-1 text-sm text-red-600" />
            </div>

            <!-- Campo Telefone com Máscara -->
            <div class="space-y-2" x-data="{ telefone: '' }">
                <x-input-label for="telefone" :value="__('Telefone')" class="font-medium text-gray-700" />
                <x-text-input
                    wire:model="telefone"
                    id="telefone"
                    type="tel"
                    name="telefone"
                    x-model="telefone"
                    x-on:input="telefone = $event.target.value"
                    x-mask="(99) 99999-9999"
                    placeholder="(00) 00000-0000"
                />
                <x-input-error :messages="$errors->get('telefone')" class="mt-1 text-sm text-red-600" />
            </div>

            <!-- Campo Matrícula -->
            <div class="space-y-2">
                <x-input-label for="matricula" :value="__('Matrícula')" class="font-medium text-gray-700" />
                <x-text-input
                    wire:model="matricula"
                    id="matricula"
                    type="text"
                    name="matricula"
                    placeholder="Número da matrícula"
                />
                <x-input-error :messages="$errors->get('matricula')" class="mt-1 text-sm text-red-600" />
            </div>

            <!-- Campo Classe -->
            <div class="space-y-2 relative w-full" x-data="{ isOpen: false }">
                <x-input-label for="classes_id" :value="__('Turma')" class="font-medium text-gray-700" />
                <x-text-input
                    wire:model.live='classeNome'
                    x-on:focus="isOpen = true"
                    x-on:click.away="isOpen = false"
                    wire:keyup.debounce.300ms="updateCategoriaNome($event.target.value)"
                    placeholder="Digite para buscar ou clique para ver todas"
                    class="block w-full rounded-lg"
                />

                <x-input-error :messages="$errors->get('idClasseSelecionada')" class="mt-1 text-sm text-red-600" />

                <ul x-show="isOpen" class="absolute bg-white border border-gray-200 w-full mt-1 max-h-40 overflow-auto z-10 rounded-lg shadow-lg">
                    @forelse($sugestaoClasse as $sugestao)
                        <li wire:click="selectClasse({{ $sugestao->id }}); isOpen = false"
                            class="px-4 py-2 hover:bg-blue-50 cursor-pointer transition duration-150">
                            {{ $sugestao->nome }}
                        </li>
                    @empty
                        @if(!empty($classeNome))
                        <li class="px-4 py-2 text-gray-500 italic">
                            Nenhuma turma encontrada com "{{ $classeNome }}"
                        </li>
                        @endif
                    @endforelse
                </ul>
            </div>
        </div>

        <!-- Botão de Ação -->
        <div class="flex justify-end pt-4 border-t border-gray-100">
            <x-primary-button type="submit" wire:loading.attr="disabled" class="min-w-32 bg-blue-600 hover:bg-blue-700 focus:ring-blue-500">
                <span wire:loading.remove>Salvar Cadastro</span>
                <span wire:loading class="flex items-center">
                    <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Salvando...
                </span>
            </x-primary-button>
        </div>
    </form>
</div>
