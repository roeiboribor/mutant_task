<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ListOfProducts extends Component
{
    public function render()
    {
        return view('livewire.list-of-products', [
            'listOfProducts' => Product::get(),
        ]);
    }

    public function addToCart($id = null)
    {
        Log::info('Product ID: ' . $id);
        // auth()->user()->products()->attach($id);
        Product::find($id)->users()->attach(auth()->user()->id);
        $this->dispatch('product-added-to-cart');
    }
}
