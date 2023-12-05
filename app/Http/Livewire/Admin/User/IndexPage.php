<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class IndexPage extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $searchTerm;

    public $perPage = 10;

    public $isEditId;

    public $firstName;

    public $lastName;

    public $gender;

    public $phoneNumber;

    public $userStatus;

    public $roles;

    public $email;
    public $addresses = [];

    protected $rules = [
        'roles' => 'in:customer,admin',
        'userStatus' => 'in:active,inActive',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        $this->isEditId = $user->id;
        $this->firstName = $user->firstName;
        $this->lastName = $user->lastName;
        $this->gender = $user->gender;
        $this->phoneNumber = $user->phoneNumber;
        $this->userStatus = $user->userStatus;
        $this->roles = $user->roles;
        $this->email = $user->email;
        $this->addresses = $user->addresses;
    }

    public function updateUser()
    {
        $this->validate();
        $isEditId = $this->isEditId;
        $user = User::findOrFail($isEditId);

        if ($user->isRoot === 1) {
            $this->reset();
            session()->flash('warning', 'This is root account, so you can not update.');
            $this->dispatchBrowserEvent('hidden-modal');
        } else {
            $user->update([
                'roles' => $this->roles,
                'userStatus' => $this->userStatus,
            ]);
            $this->reset();
            session()->flash('success', 'Update user successfully.');
            $this->dispatchBrowserEvent('hidden-modal');
        }
    }

    public function closeModal()
    {
        $this->reset();
        $this->dispatchBrowserEvent('hidden-modal');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        return view('livewire.admin.user.index-page', [
            'users' => User::where('email', 'like', $searchTerm)
                ->orderBy('created_at', 'desc')
                ->paginate($this->perPage)
        ])
            ->extends('admin.layouts.app')
            ->section('content');
    }
}
