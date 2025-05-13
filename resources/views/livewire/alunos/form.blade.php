<div class="space-y-6">
    @if (session('success'))
    <x-alert type="success" :message="session('success')" />
@endif

@if (session('error'))
    <x-alert type="error" :message="session('error')" />
@endif
    <form wire:submit.prevent="save" class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Campo Nome -->
            <div>
                <x-input-label for="nome" :value="__('Nome Completo')" />
                <x-text-input
                    wire:model="nome"
                    id="nome"
                    class="block mt-1 w-full"
                    type="text"
                    name="nome"
                    placeholder="Digite o nome completo"
                />
                <x-input-error :messages="$errors->get('nome')" class="mt-1" />
            </div>

            <!-- Campo Email -->
            <div>
                <x-input-label for="email" :value="__('E-mail')" />
                <x-text-input
                    wire:model.debounce.500ms="email"
                    id="email"
                    class="block mt-1 w-full"
                    type="email"
                    name="email"
                    placeholder="exemplo@escola.com"
                />
                <x-input-error :messages="$errors->get('email')" class="mt-1" />
            </div>

            <!-- Campo Telefone com Máscara -->
            <div x-data="{ telefone: '' }">
                <x-input-label for="telefone" :value="__('Telefone')" />
                <x-text-input
                    wire:model="telefone"
                    id="telefone"
                    class="block mt-1 w-full"
                    type="tel"
                    name="telefone"
                    x-model="telefone"
                    x-on:input="telefone = $event.target.value"
                    x-mask="(99) 99999-9999"
                    placeholder="(00) 00000-0000"
                />
                <x-input-error :messages="$errors->get('telefone')" class="mt-1" />
            </div>

            <!-- Campo Matrícula -->
            <div>
                <x-input-label for="matricula" :value="__('Matrícula')" />
                <x-text-input
                    wire:model="matricula"
                    id="matricula"
                    class="block mt-1 w-full"
                    type="text"
                    name="matricula"
                    placeholder="Número da matrícula"
                />
                <x-input-error :messages="$errors->get('matricula')" class="mt-1" />
            </div>

            <!-- Campo Classe -->
            <div class="relative w-full" x-data="{ isOpen: false }">
                <x-input-label for="classes_id" :value="__('Turma')" />
                <x-text-input
                    wire:model.live='classeNome'
                    x-on:focus="isOpen = true"
                    x-on:click.away="isOpen = false"
                    wire:keyup.debounce.300ms="updateCategoriaNome($event.target.value)"
                    placeholder="Digite para buscar ou clique para ver todas"
                    class="{{ $errors->has('idClasseSelecionada') ? 'border-vermelho-suave' : '' }}"
                />

                <!-- Mensagem de erro de validação -->
                <x-input-error :messages="$errors->get('idClasseSelecionada')" class="mt-2" />

                <!-- Sugestões de classe -->
                <ul x-show="isOpen" class="absolute bg-white border w-full mt-1 max-h-40 overflow-auto z-10 rounded shadow">
                    @forelse($sugestaoClasse as $sugestao)
                        <li wire:click="selectClasse({{ $sugestao->id }}); isOpen = false"
                            class="px-3 py-2 hover:bg-blue-100 cursor-pointer">
                            {{ $sugestao->nome }}
                        </li>
                    @empty
                            @if(!empty($classeNome))
                            <li class="px-3 py-2 text-cinza-500 italic">
                                Nenhuma classe encontrada com "{{ $classeNome }}"
                            </li>
                            @endif
                    @endforelse
                </ul>
            </div>

        <!-- Botão de Ação -->
        <div class="flex justify-end pt-6">
            <x-primary-button type="submit" wire:loading.attr="disabled" class="min-w-32">
                <span wire:loading.remove>Salvar</span>
                <span wire:loading>
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
