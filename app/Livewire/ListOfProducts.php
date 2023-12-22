<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ListOfProducts extends Component
{
    public function render()
    {
        return view('livewire.list-of-products', [
            'listOfProducts' => Product::get(),
        ]);
    }

    public function addToCart($id)
    {
        dd([
            'user' => auth()->user()->id,
            'product' => $id,
        ]);
    }
}
