<?php

namespace App\Livewire\Cart;

use Livewire\Attributes\Locked;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    #[Locked]
    public $viewPath = 'cart';

    public function render()
    {
        return view('livewire.' . $this->viewPath . '.index');
    }
}
