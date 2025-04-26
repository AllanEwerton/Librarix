<div class="mt-8">
    <h2 class="text-3xl font-extrabold mb-6 text-gray-800 text-center">📚 Lista de Livros</h2>

    @if ($livros->isEmpty())
        <p class="text-gray-500 italic text-center">Nenhum livro cadastrado ainda.</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-2 gap-6">
            @foreach ($livros as $livro)
                <div class="p-4 bg-white shadow-md rounded-lg">
                    <div class="flex flex-col items-center">
                        <img src="{{ $livro->imagem ? asset('storage/' . $livro->imagem) : asset('images/default-book-cover.jpg') }}"
                             alt="Capa do livro {{ $livro->titulo }}"
                             class="w-24 h-24 object-cover rounded-lg shadow-lg border-2 border-gray-300 mb-4">
                        <h3 class="text-lg font-bold text-gray-800 text-center">{{ $livro->titulo }}</h3>
                    </div>
                    <div class="mt-4">
                        <p class="text-gray-600"><strong>Descrição:</strong> {{ $livro->descricao }}</p>
                        <p class="text-gray-600"><strong>Quantidade:</strong> {{ $livro->quantidade }}</p>
                        <p class="text-gray-600"><strong>ISBN:</strong> {{ $livro->isbn }}</p>
                        <p class="text-gray-600"><strong>Autor:</strong> {{ $livro->autor->nome }}</p>
                        <p class="text-gray-600"><strong>Ano de Publicação:</strong> {{ $livro->ano_publicacao }}</p>
                        <p class="text-gray-600"><strong>Gênero:</strong> {{ $livro->categoria->nome }}</p>
                    </div>
                    <div class="mt-4">
                        <p class="text-gray-600">
                            <strong>Status:</strong>
                            <span class="
                                {{ $livro->status === 'disponivel' ? 'text-green-600 font-bold' : '' }}
                                {{ $livro->status === 'indisponivel' ? 'text-red-600 font-bold' : '' }}
                                {{ $livro->status === 'emprestado' ? 'text-yellow-600 font-bold' : '' }}
                            ">
                                {{ ucfirst($livro->status) }}
                            </span>
                        </p>
                    </div>
                    <div class="mt-4 text-center">
                        <button wire:click="edit({{ $livro->id }})" class="text-blue-500 hover:text-blue-700 font-semibold underline">Editar</button>
                    </div>

                </div>
            @endforeach
        </div>
    @endif
</div>
