<?php

namespace App\Livewire\Products\Modals;

use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;
use Livewire\Component;

class Create extends Component
{
    // Passed Variables
    public ?string $createModalName;
    public $viewPath;

    public $name;
    public $description;
    public $price;

    public function render()
    {
        return view('livewire.' . $this->viewPath . '.modals.create');
    }

    public function rules()
    {
        return [
            'name' => ['required', 'min:1', 'max:255', 'string', Rule::unique('products')],
            'description' => ['nullable', 'min:1', 'string'],
            'price' => ['required'],
        ];
    }

    public function resetCreateModal()
    {
        $this->resetExcept([
            'createModalName',
            'viewPath',
        ]);

        $this->resetValidation();
    }

    public function createProduct()
    {
        $validatedData = $this->validate();

        try {
            Product::create([...$validatedData]);

            $this->dispatch('close');
            $this->dispatch('product-created');
            $this->dispatch('refreshDatatable');
        } catch (\Exception $err) {
            Log::error('Error: Creating ' . $this->createModalName . ' From Modal (' . $err->getMessage() . ')');
        }

        $this->resetCreateModal();
    }
}
