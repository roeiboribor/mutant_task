<?php

namespace App\Livewire\Users\Modals;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;

class Delete extends Component
{
    // Passed Variables
    public $deleteModalName;
    public $viewPath;

    public $modelId = null;

    public function render()
    {
        return view('livewire.' . $this->viewPath . '.modals.delete');
    }

    #[On('delete-user')]
    public function assignModelData($id)
    {
        $this->modelId = $id;
    }

    public function deleteUser()
    {
        try {
            User::find($this->modelId)->delete();

            $this->dispatch('close');
            $this->dispatch('user-deleted', 'User');
            $this->dispatch('refreshDatatable');
        } catch (\Exception $err) {
            Log::error('Error: Deleting ' . $this->deleteModalName . ' From Modal (' . $err->getMessage() . ')');
        }
    }
}
