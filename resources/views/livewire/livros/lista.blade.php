<div class="py-4 sm:py-6 px-3 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- Cabeçalho otimizado para mobile -->
        <div class="text-center mb-4 sm:mb-6">
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-1 sm:mb-2">Biblioteca de Livros</h1>
            <p class="text-sm sm:text-base text-gray-600">Explore nossa coleção completa</p>
        </div>

        <!-- Barra de filtros super responsiva -->
        <div class="mb-4 sm:mb-6">
            <!-- Linha 1: Busca -->
            <div class="mb-2">
                <div class="relative">
                    <input
                        wire:model.live.debounce.500ms="busca"
                        placeholder="Buscar livros..."
                        class="w-full pl-9 pr-4 py-2 text-sm sm:text-base border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        aria-label="Buscar livros"
                    >
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-4 w-4 sm:h-5 sm:w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Linha 2: Filtros em grid mobile -->
            <div class="grid grid-cols-2 sm:flex gap-2">
                <!-- Categoria -->
                <div class="col-span-1 sm:w-40">
                    <select
                        wire:model.live="categoria_id"
                        class="w-full text-sm sm:text-base px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        aria-label="Filtrar por categoria"
                    >
                        <option value="">Todas categorias</option>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Disponibilidade -->
                <div class="col-span-1 sm:w-40">
                    <select
                        wire:model.live="disponivel"
                        class="w-full text-sm sm:text-base px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        aria-label="Filtrar por disponibilidade"
                    >
                        <option value="">Todos</option>
                        <option value="1">Disponíveis</option>
                        <option value="0">Indisponíveis</option>
                    </select>
                </div>

                <!-- Ordenação -->
                <div class="col-span-1 sm:w-40">
                    <select
                        wire:model.live="ordenacao"
                        class="w-full text-sm sm:text-base px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        aria-label="Ordenar por"
                    >
                        <option value="titulo_asc">A-Z</option>
                        <option value="titulo_desc">Z-A</option>
                        <option value="ano_desc">Mais recente</option>
                        <option value="ano_asc">Mais antigo</option>
                        <option value="categoria_asc">Categoria</option>
                    </select>
                </div>

                <!-- Botão Limpar (oculto em mobile se não houver filtros) -->
                <div class="col-span-1 sm:w-auto"
                    x-data="{ hasFilters: @entangle('busca || categoria_id || disponivel !== ""') }"
                    x-show="hasFilters || window.innerWidth >= 640"
                >
                    <button
                        wire:click="limparFiltros"
                        class="w-full sm:w-auto flex items-center justify-center px-3 py-2 text-sm sm:text-base border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50"
                        aria-label="Limpar filtros"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        <span class="hidden sm:inline">Limpar</span>
                    </button>
                </div>

                <!-- Botão Adicionar -->
                <div class="col-span-2 sm:col-span-1 sm:w-auto">
                    <button
                        wire:click="$dispatch('abrir-modal-novo-livro')"
                        class="w-full sm:w-auto flex items-center justify-center px-3 py-2 text-sm sm:text-base bg-blue-600 text-white rounded-lg hover:bg-blue-700"
                        aria-label="Adicionar novo livro"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <span class="hidden sm:inline">Novo Livro</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Resultados - Estado vazio -->
        @if($livros->isEmpty())
            <div class="text-center py-8 sm:py-12 bg-white rounded-xl shadow-sm border border-gray-200">
                <div class="mx-auto h-16 sm:h-20 w-16 sm:w-20 text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <h3 class="mt-3 sm:mt-4 text-lg font-medium text-gray-900">Nenhum livro encontrado</h3>
                <p class="mt-1 sm:mt-2 text-sm sm:text-base text-gray-500">Tente ajustar seus filtros de busca</p>
                <div class="mt-4 sm:mt-6">
                    <button
                        wire:click="limparFiltros"
                        class="inline-flex items-center px-3 sm:px-4 py-1.5 sm:py-2 text-sm sm:text-base border border-transparent font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700"
                    >
                        Limpar filtros
                    </button>
                </div>
            </div>
        @else
            <!-- Grid de livros responsivo -->
            <div class="grid grid-cols-1 xs:grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3 sm:gap-4">
                @foreach($livros as $livro)
                <div class="bg-white rounded-lg shadow-sm sm:shadow-md overflow-hidden hover:shadow-md sm:hover:shadow-lg transition-shadow duration-200 border border-gray-100 sm:border-gray-200 flex flex-col h-full">
                    <!-- Badge de destaque -->
                    @if($livro->destaque)
                    <div class="absolute top-1.5 right-1.5 bg-red-500 text-white text-[10px] xs:text-xs font-bold px-1.5 py-0.5 xs:px-2 xs:py-1 rounded-full shadow-xs">
                        Destaque
                    </div>
                    @endif

                    <!-- Imagem otimizada para mobile -->
                    <div class="relative aspect-[2/3] overflow-hidden">
                        <img
                            src="{{ $livro->imagem ? asset('storage/' . $livro->imagem) : asset('images/default-book-cover.jpg') }}"
                            alt="Capa do livro {{ $livro->titulo }}"
                            class="w-full h-full object-cover hover:scale-105 transition-transform duration-300"
                            loading="lazy"
                            width="200"
                            height="300"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-black/5 to-transparent"></div>
                    </div>

                    <!-- Conteúdo do card -->
                    <div class="p-3 sm:p-4 flex-grow flex flex-col">
                        <!-- Título responsivo -->
                        <h3 class="text-sm xs:text-base sm:text-lg font-bold text-gray-900 mb-1 line-clamp-2 leading-tight">
                            {{ $livro->titulo }}
                        </h3>

                        <!-- Autor -->
                        <p class="text-xs xs:text-sm text-gray-600 mb-1.5 line-clamp-1">{{ $livro->autor->nome }}</p>

                        <!-- Categoria -->
                        @if($livro->categoria)
                        <span class="inline-block mb-2 px-1.5 py-0.5 text-[10px] xs:text-xs font-medium bg-blue-100 text-blue-800 rounded-full">
                            {{ $livro->categoria->nome }}
                        </span>
                        @endif

                        <!-- Metadados compactos em mobile -->
                        <div class="flex items-center justify-between text-xs xs:text-sm text-gray-500 mb-2">
                            <span>{{ $livro->ano_publicacao }}</span>
                        </div>

                        <!-- Disponibilidade -->
                        <div class="mt-auto mb-2">
                            @if($livro->quantidade > 0)
                            <span class="inline-flex items-center text-xs xs:text-sm font-medium text-green-600">
                                <svg class="h-3 w-3 xs:h-4 xs:w-4 mr-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                {{ $livro->quantidade }} disp.
                            </span>
                            @else
                            <span class="inline-flex items-center text-xs xs:text-sm font-medium text-red-600">
                                <svg class="h-3 w-3 xs:h-4 xs:w-4 mr-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Indisponível
                            </span>
                            @endif
                        </div>
                    </div>

                    <!-- Rodapé do card otimizado -->
                    <div class="px-3 sm:px-4 pb-3 sm:pb-4">
                        <div class="flex space-x-1.5 sm:space-x-2">
                            {{-- futuramente --}}
                            <button
                                wire:click="$dispatch('abrir-modal-detalhes', {id: {{ $livro->id }}})"
                                class="flex-1 inline-flex justify-center items-center px-2 py-1.5 text-xs xs:text-sm border border-gray-300 rounded-md text-gray-700 bg-white hover:bg-gray-50"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 xs:h-4 xs:w-4 mr-0.5 xs:mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <span class="">Detalhes</span>
                            </button>
                            {{-- ============= --}}
                            @if($livro->quantidade > 0)
                            <button
                                wire:click="$dispatch('abrir-modal-emprestimo', {livro_id: {{ $livro->id }}})"
                                class="inline-flex justify-center items-center px-2 py-1.5 text-xs xs:text-sm border border-transparent rounded-md shadow-xs text-white bg-blue-600 hover:bg-blue-700"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 xs:h-4 xs:w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                                </svg>
                            </button>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Paginação responsiva -->
            <div class="mt-4 sm:mt-6">
                {{ $livros->onEachSide(1)->links(data: ['scrollTo' => false]) }}
            </div>
        @endif
    </div>
</div>
