<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Contact;
use Livewire\Component;

class ContactNotifyComponent extends Component
{
    public $contacts;
    public $limitContacts;

    public function mount()
    {

        $contacts = Contact::orderBy('created_at', 'desc')
            ->where('marked', '0')->get();
        $limitContacts = Contact::orderBy('created_at', 'desc')
            ->where('marked', '0')->limit(20)->get();
        $this->contacts = $contacts;
        $this->limitContacts = $limitContacts;
    }

    public function render()
    {
        return view('livewire.admin.dashboard.contact-notify-component');
    }
}
