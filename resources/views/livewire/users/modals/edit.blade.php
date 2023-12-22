<x-modal name="{{ $editModalName ?? null }}" :show="$errors->isNotEmpty()" focusable>
    <form wire:submit="updateUser" class="p-6">

        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-12">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" required
                    autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ms-3">
                {{ __('Update Details') }}
            </x-danger-button>
        </div>
    </form>
</x-modal>