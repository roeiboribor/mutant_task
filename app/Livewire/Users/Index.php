<?php

namespace App\Livewire\Users;

use Livewire\Attributes\Locked;
use Livewire\Component;

class Index extends Component
{
    #[Locked]
    public $editModalName = 'edit-user';
    #[Locked]
    public $deleteModalName = 'delete-user';
    #[Locked]
    public $viewPath = 'users';

    public function render()
    {
        return view('livewire.' . $this->viewPath . '.index');
    }
}
