<div class=" mx-auto p-12 bg-white shadow-md rounded-2xl space-y-8">
    <form class="p-4 md:p-5 " wire:submit.prevent="salvar">
        <div class="flex flex-col md:flex-row gap-4">
            <div class="relative w-full md:w-5/8">
                <x-input-label for="nome" :value="__('nome')" />
                <x-text-input wire:model="nome" id="nome" class="block mt-1 w-full" type="text" name="nome" />
                <x-input-error :messages="$errors->get('nome')" />
            </div>
        <div class="flex items-center justify-between pt-6">
            <x-primary-button class="ms-3">
                Salvar
            </x-primary-button>
        </div>
    </form>
</div>
