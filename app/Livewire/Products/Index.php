<?php

namespace App\Livewire\Products;

use Livewire\Attributes\Locked;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    #[Locked]
    public $createModalName = 'create-products';
    #[Locked]
    public $editModalName = 'edit-products';
    #[Locked]
    public $deleteModalName = 'delete-products';
    #[Locked]
    public $viewPath = 'products';

    public function render()
    {
        return view('livewire.' . $this->viewPath . '.index');
    }
}
