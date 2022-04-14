<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class ListUsers extends Component
{
    public User $form;
    public $roles = [];
    public $openModalCreate = false;
    public ?User $userToRemove = null;
    public $openModalDelete = false;

    public function confirmingUserDeletion(User $user)
    {
        $this->userToRemove = $user;
        $this->openModalDelete = true;

    }

    public function remove()
    {
        $this->userToRemove->delete();
        $this->openModalDelete = false;
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Success',
            'text' => '',
        ]);
    }

    public function getUsersProperty()
    {
        return User::latest()->paginate(10);
    }

    public function render()
    {
        return view('livewire.list-users');
    }
}
