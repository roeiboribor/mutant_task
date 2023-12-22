<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between mb-4">
                        <div>
                            <x-action-message on="product-created">
                                <div class="flex justify-start">
                                    <span class="px-6 py-2 bg-green-600 rounded text-gray-100">
                                        {{ __('Product has been created') }}
                                    </span>
                                </div>
                            </x-action-message>
                        </div>
                        <div>
                            <x-primary-button x-on:click.prevent="$dispatch('open-modal', '{{ $createModalName }}')"
                                class="transition-colors !bg-green-600 hover:!bg-green-700 !text-gray-100">
                                <i class='bx bx-plus text-sm mr-3'></i> {{ __('Add Product') }}
                            </x-primary-button>
                        </div>
                    </div>
                    <livewire:is component="{{ $viewPath }}.product-table" :$createModalName :$editModalName
                        :$deleteModalName />
                </div>
            </div>
        </div>
    </div>

    {{-- MODALS --}}
    <livewire:is component="{{ $viewPath }}.modals.create" :$viewPath :$createModalName />
</div>