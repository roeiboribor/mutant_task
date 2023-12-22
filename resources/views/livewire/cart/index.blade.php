<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cart') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-4">
                List of Product
                {{-- @forelse ($listOfProducts as $product)
                <div class="col-span-12 md:col-span-6 xl:col-span-4">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="card-title mb-4">
                                <h3 class="font-bold">{{ $product['name'] }}</h3>
                            </div>
                            <div class="card-body mb-8">
                                <p class="transition-all line-clamp-2 hover:line-clamp-none text-sm">
                                    {{ $product['description'] }}
                                </p>
                            </div>
                            <div class="card-footer">
                                <div class="flex justify-between">
                                    <div>
                                        <span class="font-semibold">{{ number_format($product['price'],2) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-12">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            No Result Found
                        </div>
                    </div>
                </div>
                @endforelse --}}
            </div>
        </div>
    </div>
</div>