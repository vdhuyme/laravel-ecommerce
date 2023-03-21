<?php

namespace App\Http\Livewire\Admin\Contact;

use App\Models\Contact;
use Livewire\Component;

class CountComponent extends Component
{
    public $count;

    public function mount()
    {
        $this->count = Contact::where('marked', '0')->count();
    }

    public function render()
    {
        return view('livewire.admin.contact.count-component');
    }
}
