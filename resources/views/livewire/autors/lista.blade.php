<div class="max-w-3xl mx-auto p-4">
    <div class="mb-4 text-right">
        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition"
        @click="$dispatch('abrirModal', { data: 'autors.form', title: 'Adicionar Autor', id: null })">
            Adicionar Autor
        </button>
    </div>
    <h1 class="text-3xl font-bold text-center mb-6">Lista de Autores</h1>

    <div class="bg-white shadow rounded-lg divide-y divide-gray-200">
        @forelse($autores as $autor)
            <div class="flex items-center justify-between p-4 hover:bg-gray-50 transition">
                <div class="text-gray-800 font-medium">
                    {{ $autor->nome }}
                </div>
                <div>
                    <!-- Aqui você pode colocar botão de editar, ver detalhes, etc -->
                    <button class="text-blue-500 hover:text-blue-700 text-sm font-semibold" @click="$dispatch('abrirModal', { data: 'autors.form', id: {{ $autor->id }}, title: 'Editar Autor' })">
                        Editar
                    </button>
                </div>
            </div>
        @empty
            <div class="p-4 text-center text-gray-500">
                Nenhum autor cadastrado.
            </div>
        @endforelse
    </div>
</div>
