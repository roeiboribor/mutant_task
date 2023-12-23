<?php

namespace App\Livewire\Cart;

use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    #[Locked]
    public $viewPath = 'cart';
    public $totalAmount;
    public $cartItems;

    public function render()
    {
        return view('livewire.' . $this->viewPath . '.index');
    }

    public function mount()
    {
        $this->cartItems = auth()->user()->products;
        $this->totalAmount = number_format($this->cartItems->sum('price'), 2);
    }

    public function checkout()
    {
        try {
            \Stripe\Stripe::setApiKey(config('stripe.sk'));

            $names = $this->cartItems->map(fn ($item) => $item['name'])->implode(', ');

            $session = \Stripe\Checkout\Session::create([
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => 'USD',
                            'product_data' => [
                                'name' => $names
                            ],
                            'unit_amount' => intval($this->totalAmount),
                        ],
                        'quantity' =>  1,
                    ]
                ],
                'mode' => 'payment',
                'success_url' => route('cart.index'),
                'cancel_url' => route('cart.index'),
            ]);

            // Clear User's Cart Items
            auth()->user()->products()->detach();

            return redirect()->away($session->url)->with('status', 'Payment Successful!');
        } catch (\Exception $err) {
            Log::error('Error: Checkingout From Cart page (' . $err->getMessage() . ')');
        }
    }
}
