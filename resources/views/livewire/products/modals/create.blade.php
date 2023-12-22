<x-modal name="{{ $createModalName ?? null }}" :show="$errors->isNotEmpty()" focusable>
    <form wire:submit="createProduct" class="p-6">
        <div>
            <div wire:target="createProduct" wire:loading.remove.class="hidden" class="hidden text-center">
                <i class='bx bxs-analyse animate-spin text-[8rem] dark:text-gray-100'></i>
            </div>
            <div wire:target="createProduct" wire:loading.add.class="hidden">
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-12 md:col-span-6">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input wire:loading.attr="disabled" wire:loading.attr wire:model.blur="name" id="name"
                            class="block mt-1 w-full" type="text" name="name" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <x-input-label for="price" :value="__('Price')" />
                        <x-text-input wire:loading.attr="disabled" wire:loading.attr wire:model.blur="price" id="price"
                            class="block mt-1 w-full" type="number" step="any" name="price" required autofocus
                            autocomplete="price" />
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                    </div>
                    <div class="col-span-12">
                        <x-input-label for="description" :value="__('Description')" />
                        <x-text-input wire:loading.attr="disabled" wire:model.blur="description" id="description"
                            class="block mt-1 w-full" type="text" name="description" required autofocus
                            autocomplete="description" />
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-primary-button class="transition-colors !bg-lime-600 hover:!bg-lime-700 !text-gray-100 ms-3">
                {{ __('Save') }}
            </x-primary-button>
        </div>
    </form>
</x-modal>