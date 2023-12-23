<div class="grid grid-cols-12 gap-4">
    <div class="col-span-12">
        <x-action-message on="product-added-to-cart">
            <div class="flex justify-start">
                <span class="px-6 py-2 bg-green-600 rounded text-gray-100">
                    {{ __('Product has been added to cart') }}
                </span>
            </div>
        </x-action-message>
    </div>
    @forelse ($listOfProducts as $product)
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
                        <div>
                            <x-primary-button wire:loading.attr="disabled" wire:click="addToCart({{ $product['id'] }})"
                                class="transition-colors !bg-orange-700 hover:!bg-orange-800 !text-gray-100 !py-1 !px-2">
                                <i class='bx bx-cart-add text-base mr-3'></i> Add to Cart
                            </x-primary-button>
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
    @endforelse
</div>