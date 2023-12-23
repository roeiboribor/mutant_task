<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cart') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-4">
                <div x-data="{ isVisible: true }" class="col-span-12">
                    @if (session('status'))
                    <div @click="isVisible = !isVisible" x-show="isVisible"
                        class="bg-green-500 p-4 rounded text-green-800">
                        <p class="font-semibold">
                            {{ session('status') }}
                        </p>
                    </div>
                    @endif
                </div>
                <div class="col-span-12">
                    <div class="flex justify-between">
                        <div>
                            <h3 class="dark:text-gray-100 text-3xl">
                                Total Amount: <span class="font-bold">{{ $totalAmount
                                    }}</span>
                            </h3>
                        </div>
                        <div>
                            <x-primary-button wire:loading.attr="disabled" wire:click="checkout"
                                class="transition-colors !bg-green-500 hover:!bg-green-700 !text-gray-100">
                                <i class='bx bx-credit-card text-xl mr-3'></i> Checkout
                            </x-primary-button>
                        </div>
                    </div>
                </div>
                @forelse ($cartItems as $cartItem)
                <div class="col-span-12 md:col-span-6 xl:col-span-4">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="card-title mb-4">
                                <h3 class="font-bold">{{ $cartItem['name'] }}</h3>
                            </div>
                            <div class="card-body mb-8">
                                <p class="transition-all line-clamp-2 hover:line-clamp-none text-sm">
                                    {{ $cartItem['description'] }}
                                </p>
                            </div>
                            <div class="card-footer">
                                <div class="flex justify-between">
                                    <div>
                                        <span class="font-semibold">{{ number_format($cartItem['price'],2) }}</span>
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
                            No Items in your Cart <a href="{{ route('dashboard') }}" class="text-blue-500 underline"
                                wire:navigate>Buy Now</a>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>