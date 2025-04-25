<div class="p-4">

    @if (session()->has('message'))
        <div class="mb-4 text-blue-600">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="save" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <h2 class="text-2xl font-bold mb-4">Adicionar Livro</h2>
        <div class="mb-4">
            <label class="block font-bold">Título do Livro</label>
            <input type="text" wire:model="titulo" class="w-full border rounded p-2"  placeholder="Digite o titulo"/>
            @error('titulo') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block font-bold">Descrição</label>
            <textarea wire:model="descricao" class="w-full border rounded p-2" rows="4" placeholder="A descrição é opcional"></textarea>
            @error('descricao') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block font-bold">Ano da publicação</label>
            <input type="text" wire:model="ano_publicacao" class="w-full border rounded p-2" placeholder="Digite o ano"  />
            @error('ano_publicacao') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block font-bold">ISBN</label>
            <input type="text" wire:model="isbn" class="w-full border rounded p-2" placeholder="Digite o ISBN" />
            @error('isbn') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block font-bold">quantidade</label>
            <input type="number" wire:model="quantidade" class="w-full border rounded p-2" placeholder="Digite a quantidade" />
            @error('quantidade') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4 relative">
            <label class="block font-bold">Categoria</label>
            <input type="text" wire:model.live="categoriaNome" wire:keyup="updateCategoriaNome($event.target.value)" class="w-full border rounded p-2" placeholder="Digite para buscar..." />
            @error('categoriaNome') <span class="text-red-500">{{ $message }}</span> @enderror

            @if(!empty($sugestaoCategoria))
                <ul class="absolute bg-white border w-full mt-1 max-h-40 overflow-auto z-10 rounded shadow">
                    @foreach($sugestaoCategoria as $sugestao)
                        <li wire:click="selectCategoria({{ $sugestao->id }})"
                            class="px-3 py-2 hover:bg-blue-100 cursor-pointer">
                            {{ $sugestao->nome }}
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
        <div class="mb-4">
            <label class="block font-bold">Imagem</label>
            <input type="file" wire:model="imagem" class="w-full border rounded p-2" />
            @error('imagem') <span class="text-red-500">{{ $message }}</span> @enderror
            @if ($imagem)
                <div class="mt-2">
                    <img src="{{ $imagem->temporaryUrl() }}" alt="Preview" class="w-32 h-32 object-cover">
                </div>
            @endif
        </div>

        <div class="mb-4 relative">
            <label class="block font-bold">Nome do Autor</label>
            <input type="text" wire:model.live="autorNome" wire:keyup="updateAutorNome($event.target.value)" class="w-full border rounded p-2" placeholder="Digite para buscar..." />
            @error('autorNome') <span class="text-red-500">{{ $message }}</span> @enderror

            @if(!empty($sugestaoAutor))
                <ul class="absolute bg-white border w-full mt-1 max-h-40 overflow-auto z-10 rounded shadow">
                    @foreach($sugestaoAutor as $sugestao)
                        <li wire:click="selectAutor({{ $sugestao->id }})"
                            class="px-3 py-2 hover:bg-blue-100 cursor-pointer">
                            {{ $sugestao->nome }}
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
            Salvar Livro
        </button>
    </form>

    @if (session()->has('success'))
        <div class="mt-4 text-green-600">{{ session('success') }}</div>
    @endif
</div>
