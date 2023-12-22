<?php

namespace App\Livewire\Users\Modals;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;

class Edit extends Component
{
    // Passed Variables
    public $editModalName;
    public $viewPath;

    public $modelId = null;
    public $user;
    public $name;
    public $email;
    public $roles = [];

    public function render()
    {
        return view('livewire.' . $this->viewPath . '.modals.delete');
    }

    #[On('edit-user')]
    public function assignModelData($id)
    {
        $this->modelId = $id;
        $this->user = User::find($this->modelId);
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->roles = $this->user->getRoleNames()->toArray();
    }

    public function updateUser()
    {
        try {
            $this->user->update();

            $this->dispatch('close');
            $this->dispatch('user-updated');
            $this->dispatch('refreshDatatable');
        } catch (\Exception $err) {
            Log::error('Error: Updating ' . $this->editModalName . ' From Modal (' . $err->getMessage() . ')');
        }
    }
}
