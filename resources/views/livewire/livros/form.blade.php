<div class="py-6 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
        <!-- Mensagens de feedback -->
        @if (session()->has('ok'))
            <div class="mb-6 p-4 bg-green-50 text-green-700 rounded-lg border border-green-200">
                {{ session('ok') }}
            </div>
        @endif

        <form wire:submit.prevent="save" class="bg-white shadow-sm rounded-lg overflow-hidden border border-gray-200">
            <!-- Cabeçalho do formulário -->
            <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800">
                    {{ $livroId ? 'Editar Livro' : 'Adicionar Novo Livro' }}
                </h2>
            </div>

            <!-- Corpo do formulário -->
            <div class="p-6 space-y-6">
                <!-- Linha 1: Título e ISBN -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Título -->
                    <div>
                        <label for="titulo" class="block text-sm font-medium text-gray-700 mb-1">Título *</label>
                        <input
                            type="text"
                            id="titulo"
                            wire:model="titulo"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Digite o título do livro"
                        >
                        @error('titulo')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- ISBN -->
                    <div>
                        <label for="isbn" class="block text-sm font-medium text-gray-700 mb-1">ISBN *</label>
                        <input
                            type="text"
                            id="isbn"
                            wire:model="isbn"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Ex: 978-85-333-0227-3"
                        >
                        @error('isbn')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Descrição -->
                <div>
                    <label for="descricao" class="block text-sm font-medium text-gray-700 mb-1">Descrição</label>
                    <textarea
                        id="descricao"
                        wire:model="descricao"
                        rows="4"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Sinopse ou descrição do livro (opcional)"
                    ></textarea>
                    @error('descricao')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Linha 2: Ano e Quantidade -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Ano de Publicação -->
                    <div>
                        <label for="ano_publicacao" class="block text-sm font-medium text-gray-700 mb-1">Ano de Publicação</label>
                        <input
                            type="number"
                            id="ano_publicacao"
                            wire:model="ano_publicacao"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Ex: 2023"
                            min="1700"
                            max="{{ date('Y') }}"
                        >
                        @error('ano_publicacao')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Quantidade -->
                    <div>
                        <label for="quantidade" class="block text-sm font-medium text-gray-700 mb-1">Quantidade *</label>
                        <input
                            type="number"
                            id="quantidade"
                            wire:model="quantidade"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Número de exemplares"
                            min="0"
                        >
                        @error('quantidade')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Linha 3: Autor e Categoria -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Autor (com busca) -->
                    <div class="relative">
                        <label for="autorNome" class="block text-sm font-medium text-gray-700 mb-1">Autor *</label>
                        <input
                            type="text"
                            id="autorNome"
                            wire:model.live="autorNome"
                            wire:keyup="updateAutorNome($event.target.value)"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Digite para buscar autor"
                            autocomplete="off"
                        >
                        @error('autor_id')
                            <p class="mt-1 text-sm text-red-600">Selecione um autor válido</p>
                        @enderror

                        <!-- Sugestões de autores -->
                        @if(!empty($sugestaoAutor) && $autorNome && !$idAutorSelecionado)
                            <ul class="absolute z-10 mt-1 w-full bg-white border border-gray-300 rounded-md shadow-lg max-h-60 overflow-auto">
                                @foreach($sugestaoAutor as $autor)
                                    <li
                                        wire:click="selectAutor({{ $autor->id }})"
                                        class="px-4 py-2 hover:bg-blue-50 cursor-pointer flex items-center"
                                    >
                                        <span>{{ $autor->nome }}</span>
                                        @if($autor->livros_count > 0)
                                            <span class="ml-auto text-xs text-gray-500">{{ $autor->livros_count }} livro(s)</span>
                                        @endif
                                    </li>
                                @endforeach
                                <li
                                    wire:click="closeSugestionsA"
                                    class="px-4 py-2 bg-gray-50 text-blue-600 hover:bg-blue-50 cursor-pointer text-sm font-medium"
                                >
                                    + Criar novo autor: "{{ $autorNome }}"
                                </li>
                            </ul>
                        @endif
                    </div>

                    <!-- Categoria (com busca) -->
                    <div class="relative">
                        <label for="categoriaNome" class="block text-sm font-medium text-gray-700 mb-1">Categoria *</label>
                        <input
                            type="text"
                            id="categoriaNome"
                            wire:model.live="categoriaNome"
                            wire:keyup="updateCategoriaNome($event.target.value)"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Digite para buscar categoria"
                            autocomplete="off"
                        >
                        @error('categoria_id')
                            <p class="mt-1 text-sm text-red-600">Selecione uma categoria válida</p>
                        @enderror

                        <!-- Sugestões de categorias -->
                        @if(!empty($sugestaoCategoria) && $categoriaNome && !$idCategoriaSelecionado)
                            <ul class="absolute z-10 mt-1 w-full bg-white border border-gray-300 rounded-md shadow-lg max-h-60 overflow-auto">
                                @foreach($sugestaoCategoria as $categoria)
                                    <li
                                        wire:click="selectCategoria({{ $categoria->id }})"
                                        class="px-4 py-2 hover:bg-blue-50 cursor-pointer flex items-center"
                                    >
                                        <span>{{ $categoria->nome }}</span>
                                        @if($categoria->livros_count > 0)
                                            <span class="ml-auto text-xs text-gray-500">{{ $categoria->livros_count }} livro(s)</span>
                                        @endif
                                    </li>
                                @endforeach
                                <li
                                    wire:click="closeSugestionsC"
                                    class="px-4 py-2 bg-gray-50 text-blue-600 hover:bg-blue-50 cursor-pointer text-sm font-medium"
                                >
                                    + Criar nova categoria: "{{ $categoriaNome }}"
                                </li>
                            </ul>
                        @endif
                    </div>
                </div>

                <!-- Upload de imagem -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Capa do Livro</label>

                    <div class="mt-1 flex items-center space-x-4">
                        <!-- Preview da imagem -->
                        @if($imagem)
                            <div class="relative">
                                <img
                                    src="{{ is_string($imagem) ? asset('storage/' . $imagem) : $imagem->temporaryUrl() }}"
                                    alt="Preview da capa"
                                    class="h-32 w-32 object-cover rounded-md border"
                                >
                                <button
                                    type="button"
                                    wire:click="$set('imagem', null)"
                                    class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full p-1 hover:bg-red-600"
                                >
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        @endif

                        <!-- Upload control -->
                        <div class="flex-1">
                            <label class="flex flex-col items-center px-4 py-6 bg-white rounded-md border border-dashed border-gray-300 cursor-pointer hover:bg-gray-50">
                                <svg class="h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>
                                <span class="mt-2 text-sm font-medium text-gray-700">
                                    {{ $imagem ? 'Trocar imagem' : 'Selecionar imagem' }}
                                </span>
                                <span class="text-xs text-gray-500">PNG, JPG (Max. 2MB)</span>
                                <input
                                    type="file"
                                    wire:model="imagem"
                                    class="hidden"
                                    accept="image/*"
                                >
                            </label>
                        </div>
                    </div>
                    @error('imagem')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Rodapé do formulário -->
            <div class="bg-gray-50 px-6 py-4 border-t border-gray-200 flex justify-end space-x-3">
                <button
                    type="button"
                    wire:click="$dispatch('cancelar')"
                    class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                >
                    Cancelar
                </button>
                <button
                    type="submit"
                    class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                >
                    {{ $livroId ? 'Atualizar Livro' : 'Salvar Livro' }}
                </button>
            </div>
        </form>
    </div>
</div>
