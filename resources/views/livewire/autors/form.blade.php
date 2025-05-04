<div>
    <form class="p-4 md:p-5" wire:submit.prevent="salvar">
        <div class="grid gap-4 mb-4 grid-cols-2">
            <div class="col-span-2">
                <x-input-label for="nome" :value="__('nome')" />
                <x-text-input wire:model="nome" id="nome" class="block mt-1 w-full" type="text" name="nome" />
                <x-input-error :messages="$errors->get('nome')" />
            </div>
        </div>

        <div class="flex items-center justify-between pt-6">
            <x-primary-button class="ms-3">
                Salvar
            </x-primary-button>
        </div>
    </form>
</div>
