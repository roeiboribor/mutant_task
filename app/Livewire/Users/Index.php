<?php

namespace App\Livewire\Users;

use Livewire\Attributes\Locked;
use Livewire\Component;

class Index extends Component
{
    #[Locked]
    public $editModalName = 'edit-user';
    public $deleteModalName = 'confirm-user-deletion';

    public function render()
    {
        return view('livewire.users.index');
    }
}
