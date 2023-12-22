<div>
    <x-modal name="{{ $editModalName ?? null }}" :show="$errors->isNotEmpty()" focusable>
        <form wire:submit="updateUser" class="p-6">
            <div>
                <div wire:target="updateUser" wire:loading.remove.class="hidden" class="hidden text-center">
                    <i class='bx bxs-analyse animate-spin text-[8rem] dark:text-gray-100'></i>
                </div>
                <div wire:target="updateUser" wire:loading.add.class="hidden">
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input wire:loading.attr="disabled" wire:loading.attr wire:model="name" id="name"
                                class="block mt-1 w-full" type="text" name="name" required autofocus
                                autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="col-span-12">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input wire:loading.attr="disabled" wire:model="email" id="email"
                                class="block mt-1 w-full" type="text" name="email" required autofocus
                                autocomplete="email" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="col-span-12">
                            <x-input-label for="roles" :value="__('Role(s)')" />
                            <x-select wire:loading.attr="disabled" wire:model.blur="roles" id="roles"
                                class="mt-1 w-full" type="text" name="roles" multiple>
                                <option value="">-- Select Option --</option>
                                @foreach ($listOfRoles as $key => $value)
                                <option value="{{ $value['name'] }}">{{$value['name']}}</option>
                                @endforeach
                            </x-select>
                            <x-input-error :messages="$errors->get('roles')" class="mt-2" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-primary-button class="transition-colors !bg-lime-600 hover:!bg-lime-700 !text-gray-100 ms-3">
                    {{ __('Update Details') }}
                </x-primary-button>
            </div>
        </form>
    </x-modal>
</div>