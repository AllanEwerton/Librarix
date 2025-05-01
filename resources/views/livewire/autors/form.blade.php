<div>
      <form class="p-4 md:p-5" wire:submit.prevent="salvar">
        <div class="grid gap-4 mb-4 grid-cols-2 ">
            <div class="col-span-2">
                <label for="nome" class="block mb-2 text-sm font-medium text-gray-900">Nome</label>
                <input type="text" name="nome" id="nome" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Digite seu nome" required="" wire:model.defer="nome" />
            </div>
        </div>

        <div class="flex items-center justify-between pt-6">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Salvar</button>
        </div>
    </form>
</div>
