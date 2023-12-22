<?php

namespace App\Livewire\Users\Modals;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;
use Livewire\Component;

class Edit extends Component
{
    // Passed Variables
    public $editModalName;
    public $viewPath;
    public $listOfRoles;

    public $modelId = null;
    public $user;
    public $name;
    public $email;
    public $roles = [];

    public function render()
    {
        return view('livewire.' . $this->viewPath . '.modals.edit');
    }

    public function rules()
    {
        return [
            'name' => ['required', 'min:1', 'max:255', 'string'],
            'email' => ['required', 'min:1', 'max:255', 'string', 'email', Rule::unique('users')->ignore($this->modelId)],
            'roles' => ['required'],
        ];
    }

    public function resetEditModal()
    {
        $this->resetExcept([
            'editModalName',
            'viewPath',
            'listOfRoles',
        ]);

        $this->resetValidation();
    }

    #[On('edit-user')]
    public function assignModelData($id)
    {
        $this->resetEditModal();

        $this->modelId = $id;
        $this->user = User::find($this->modelId);
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->roles = $this->user->getRoleNames()->toArray();
    }

    public function updateUser()
    {
        $validatedData = $this->validate();

        try {
            $this->user->update($validatedData);

            $this->user->syncRoles($validatedData['roles']);

            $this->dispatch('close');
            $this->dispatch('user-updated');
            $this->dispatch('refreshDatatable');
        } catch (\Exception $err) {
            Log::error('Error: Updating ' . $this->editModalName . ' From Modal (' . $err->getMessage() . ')');
        }
    }
}
