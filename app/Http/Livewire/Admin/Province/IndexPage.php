<?php

namespace App\Http\Livewire\Admin\Province;

use App\Models\Province;
use Livewire\Component;
use Livewire\WithPagination;

class IndexPage extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $provinceName;
    public $isEditId;
    public $isDeleteId;
    public $searchTerm;
    public $perPage = 10;

    protected $rules = [
        'provinceName' => 'required|max:255',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function storeProvince()
    {
        $validatedData = $this->validate();
        Province::create($validatedData);
        $this->reset();
        session()->flash('success', 'Create new province successfully.');
        $this->dispatchBrowserEvent('hidden-modal');
    }

    public function editProvince($id)
    {
        $province = Province::findOrFail($id);
        $this->isEditId = $province->id;
        $this->provinceName = $province->provinceName;
    }

    public function updateProvince()
    {
        $this->validate();
        $isEditId = $this->isEditId;
        $province = Province::findOrFail($isEditId);
        $province->update([
            'provinceName' => $this->provinceName,
        ]);
        $this->reset();
        session()->flash('success', 'Update province successfully.');
        $this->dispatchBrowserEvent('hidden-modal');
    }

    public function deleteProvince($id)
    {
        $province = Province::findOrFail($id);
        $this->isDeleteId = $province->id;
    }

    public function destroyProvince()
    {
        $isDeleteId = $this->isDeleteId;
        $province = Province::findOrFail($isDeleteId);
        if ($province->districts->count() > 0) {
            session()->flash('danger', 'You can not delete province successfully.');
            $this->dispatchBrowserEvent('hidden-modal');
        } else {
            $province->delete();
            session()->flash('success', 'Delete province successfully.');
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
        return view('livewire.admin.province.index-page', [
            'provinces' => Province::where('provinceName', 'like', $searchTerm)
                ->orderBy('created_at', 'desc')
                ->paginate($this->perPage)
        ])
            ->extends('admin.layouts.app')
            ->section('content');
    }
}
