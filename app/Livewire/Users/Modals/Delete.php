<?php

namespace App\Livewire\Users\Modals;

use Livewire\Component;

class Delete extends Component
{
    public function render()
    {
        return view('livewire.users.modals.delete');
    }

    public function deleteUser()
    {
        dd('Delete User');
    }
}
