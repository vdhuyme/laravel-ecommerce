<?php

namespace App\Http\Livewire\Admin\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ProfilePage extends Component
{
    public $firstName;
    public $lastName;
    public $email;
    public $phoneNumber;
    public $createdAt;
    public $currentPassword;
    public $newPassword;
    public $confirmPassword;

    protected $rules = [
        'firstName' => 'required',
        'lastName' => 'required',
        'phoneNumber' => ['required', 'numeric', 'regex:/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/'],
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount()
    {
        $user = Auth::user();
        $this->firstName = $user->firstName;
        $this->lastName = $user->lastName;
        $this->email = $user->email;
        $this->phoneNumber = $user->phoneNumber;
        $this->createdAt = $user->created_at;
    }

    public function updateProfile()
    {
        $this->validate();
        $user = Auth::user();
        $user->update([
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'phoneNumber' => $this->phoneNumber,
        ]);
        session()->flash('success', 'Update profile successfully.');
    }

    public function updatePassword()
    {
        $validatedData = $this->validate([
            'currentPassword' => 'required',
            'newPassword' => 'required|min:8',
            'confirmPassword' =>  ['required', 'same:newPassword'],
        ]);

        $user = Auth::user();

        if (!Hash::check($validatedData['currentPassword'], $user->password)) {
            $this->reset();
            session()->flash('danger', 'Opps!!! Old password is incorrect please check again.');
        } else {
            $user->update([
                'password' => Hash::make($validatedData['newPassword'])
            ]);
            $this->reset();
            session()->flash('success', 'Your password is updated.');
            return redirect(request()->header('Referer'));
        }
    }

    public function render()
    {
        return view('livewire.admin.user.profile-page')
            ->extends('admin.layouts.app')
            ->section('content');
    }
}
