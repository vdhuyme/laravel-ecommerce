<?php

namespace App\Http\Livewire\Client\Contact;

use App\Mail\ContactEmail;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class IndexPage extends Component
{
    public $fullName;
    public $email;
    public $subject;
    public $message;

    protected $rules = [
        'fullName' => 'required',
        'email' => 'required',
        'subject' => 'required',
        'message' => 'required',
    ];

    protected $messages = [
        'fullName.required' => 'Trường này không được bỏ trống.',
        'email.required' => 'Trường này không được bỏ trống.',
        'subject.required' => 'Trường này không được bỏ trống.',
        'message.required' => 'Trường này không được bỏ trống.',
    ];

    public function contactUs()
    {
        $validatedData = $this->validate();
        $validatedData['marked'] = 0;
        Contact::create($validatedData);
        Mail::to($validatedData['email'])->send(new ContactEmail());
        return redirect()->route('thankYou');
    }

    public function render()
    {
        return view('livewire.client.contact.index-page')
            ->extends('client.layouts.app')
            ->section('content');
    }
}
