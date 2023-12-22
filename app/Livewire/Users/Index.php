<?php

namespace App\Livewire\Users;

use Livewire\Attributes\Locked;
use Livewire\Component;
use Spatie\Permission\Models\Role;

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
        return view('livewire.' . $this->viewPath . '.index', [
            'listOfRoles' => Role::get()->toArray(),
        ]);
    }
}
