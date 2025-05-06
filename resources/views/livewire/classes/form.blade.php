<div class="bg-bege-claro min-h-screen p-4 sm:p-6">
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        <!-- Cabeçalho -->
        <div class="bg-azul-escuro px-6 py-4">
            <h2 class="text-xl font-semibold text-white">
                {{ $id ? 'Editar Turma' : 'Nova Turma' }}
            </h2>
        </div>

        <!-- Formulário -->
        <form wire:submit.prevent="save" class="p-6 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nome -->
<div class="col-span-2">
    <x-input-label for="nome" :value="__('Nome da Turma')" class="text-azul-escuro font-medium" />
    <x-text-input
        wire:model="nome"
        id="nome"
        x-data="{ formatarTurma() {
            let value = this.$wire.nome;
            if (/\d[^º]/.test(value)) {
                this.$wire.nome = value.replace(/(\d+)(?!º)/, '$1º');
            }
        }}"
        x-on:input.debounce.500ms="formatarTurma()"
        class="block mt-2 w-full border-cinza-claro focus:border-azul-escuro focus:ring-azul-escuro rounded-lg shadow-sm"
        type="text"
        placeholder="Ex: 1º ano A"
    />
    <x-input-error :messages="$errors->get('nome')" class="mt-1 text-vermelho-suave" />
</div>
                <!-- Ano -->
                <div>
                    <x-input-label for="ano" :value="__('Ano Letivo')" class="text-azul-escuro font-medium" />
                    <x-text-input
                        wire:model="ano"
                        id="ano"
                        class="block mt-2 w-full border-cinza-claro focus:border-azul-escuro focus:ring-azul-escuro rounded-lg shadow-sm"
                        type="number"
                        min="2000"
                        :max="date('Y')+1"
                    />
                    <x-input-error :messages="$errors->get('ano')" class="mt-1 text-vermelho-suave" />
                </div>

                <!-- Turno -->
                <div>
                    <x-input-label for="turno" :value="__('Turno')" class="text-azul-escuro font-medium" />
                    <select
                        wire:model="turno"
                        id="turno"
                        class="block mt-2 w-full border-cinza-claro focus:border-azul-escuro focus:ring-azul-escuro rounded-lg shadow-sm"
                    >
                        <option value="">Selecione o turno</option>
                        <option value="manhã">Manhã</option>
                        <option value="tarde">Tarde</option>
                        <option value="noite">Noite</option>
                    </select>
                    <x-input-error :messages="$errors->get('turno')" class="mt-1 text-vermelho-suave" />
                </div>

                <!-- Nível -->
                <div>
                    <x-input-label for="nivel" :value="__('Nível de Ensino')" class="text-azul-escuro font-medium" />
                    <select
                        wire:model="nivel"
                        id="nivel"
                        class="block mt-2 w-full border-cinza-claro focus:border-azul-escuro focus:ring-azul-escuro rounded-lg shadow-sm"
                    >
                        <option value="">Selecione o nível</option>
                        <option value="fundamental">Fundamental</option>
                        <option value="médio">Médio</option>
                        <option value="eja">EJA</option>
                    </select>
                    <x-input-error :messages="$errors->get('nivel')" class="mt-1 text-vermelho-suave" />
                </div>

                <!-- Status (apenas para edição) -->
                @if($id)
                <div>
                    <x-input-label :value="__('Status')" class="text-azul-escuro font-medium" />
                    <div class="mt-2 flex items-center space-x-4">
                        <label class="inline-flex items-center">
                            <input
                                type="radio"
                                wire:model="status"
                                value="ativo"
                                class="text-verde-bandeira focus:ring-verde-bandeira"
                            >
                            <span class="ml-2">Ativo</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input
                                type="radio"
                                wire:model="status"
                                value="inativo"
                                class="text-vermelho-suave focus:ring-vermelho-suave"
                            >
                            <span class="ml-2">Inativo</span>
                        </label>
                    </div>
                    <x-input-error :messages="$errors->get('status')" class="mt-1 text-vermelho-suave" />
                </div>
                @endif
            </div>

            <!-- Rodapé do Formulário -->
            <div class="flex flex-col-reverse sm:flex-row justify-between gap-4 pt-6 border-t border-cinza-claro">
                <a
                    href="#"
                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-azul-escuro hover:text-azul-escuro/80 bg-white hover:bg-cinza-claro border border-cinza-claro rounded-lg shadow-sm"
                >
                    Cancelar
                </a>
                <x-primary-button type="submit" class="w-full sm:w-auto justify-center bg-azul-escuro hover:bg-azul-escuro/90 focus:ring-2 focus:ring-azul-escuro focus:ring-offset-2">
                    <span wire:loading.remove wire:target="salvar">
                        {{ $id ? 'Atualizar' : 'Salvar' }}
                    </span>
                    <span wire:loading wire:target="salvar" class="inline-flex items-center">
                        <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Processando...
                    </span>
                </x-primary-button>
            </div>
        </form>
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
