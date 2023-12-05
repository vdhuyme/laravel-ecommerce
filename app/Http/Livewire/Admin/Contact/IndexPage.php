<?php

namespace App\Http\Livewire\Admin\Contact;

use App\Models\Contact;
use Livewire\Component;

class IndexPage extends Component
{
    public $perPage = 10;

    public $isDeleteId;

    public $fullName;

    public $email;

    public $subject;

    public $message;

    public $searchTerm;

    public function marked($id)
    {
        $contact = Contact::findOrFail($id);

        $contact->update([
            'marked' => 1,
        ]);
        session()->flash('success', 'Marked contact successfully.');
    }

    public function unMarked($id)
    {
        $contact = Contact::findOrFail($id);

        $contact->update([
            'marked' => 0,
        ]);
        session()->flash('success', 'Un marked contact successfully.');
    }

    public function deleteContact($id)
    {
        $contact = Contact::findOrFail($id);
        $this->isDeleteId = $contact->id;
    }

    public function destroyContact()
    {
        $isDeleteId = $this->isDeleteId;
        $contact = Contact::findOrFail($isDeleteId);
        $contact->delete();
        session()->flash('success', 'Delete contact successfully.');
        $this->dispatchBrowserEvent('hidden-modal');
    }

    public function viewContact($id)
    {
        $contact = Contact::findOrFail($id);

        $this->fullName = $contact->fullName;
        $this->email = $contact->email;
        $this->subject = $contact->subject;
        $this->message = $contact->message;
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
        return view('livewire.admin.contact.index-page', [
            'contacts' => Contact::where('fullName', 'like', $searchTerm)
                ->orWhere('email', 'like', $searchTerm)
                ->orWhere('subject', 'like', $searchTerm)
                ->orderBy('created_at', 'desc')
                ->paginate($this->perPage),
        ])
            ->extends('admin.layouts.app')
            ->section('content');
    }
}
