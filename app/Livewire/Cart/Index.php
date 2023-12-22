<?php

namespace App\Livewire\Cart;

use Livewire\Attributes\Locked;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    #[Locked]
    public $viewPath = 'cart';
    public $totalAmount;

    public function render()
    {
        return view('livewire.' . $this->viewPath . '.index', [
            'cartItems' => auth()->user()->products,
        ]);
    }

    public function mount()
    {
        $this->totalAmount = number_format(auth()->user()->products->sum('price'), 2);
    }
}
