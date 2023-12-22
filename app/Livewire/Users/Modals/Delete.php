<?php

namespace App\Livewire\Users\Modals;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class Delete extends Component
{
    public $modelId = null;

    public function render()
    {
        return view('livewire.users.modals.delete');
    }

    #[On('confirm-user-deletion')]
    public function assignModelData($id)
    {
        $this->modelId = $id;
    }

    public function deleteUser()
    {
        $user = User::find($this->modelId);
        $user->delete();

        $this->dispatch('close');
        $this->dispatch('user-deleted', 'User');
        $this->dispatch('refreshDatatable');
    }
}
