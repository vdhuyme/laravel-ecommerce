<?php

namespace App\Http\Livewire\Admin\Ward;

use App\Models\District;
use App\Models\Province;
use App\Models\Ward;
use Livewire\Component;
use Livewire\WithPagination;

class IndexPage extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $districts = [];
    public $districtId;
    public $provinceId;
    public $wardName;
    public $searchTerm;
    public $isEditId;
    public $isDeleteId;
    public $perPage = 10;

    protected $rules = [
        'districtId' => 'required',
        'wardName' => 'required|max:255',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function storeWard()
    {
        $validatedData = $this->validate();
        Ward::create($validatedData);
        $this->reset();
        session()->flash('success', 'Create new ward successfully.');
        $this->dispatchBrowserEvent('hidden-modal');
    }

    public function editWard($id)
    {
        $ward = Ward::findOrFail($id);
        $this->isEditId = $ward->id;
        $this->wardName = $ward->wardName;
        $this->provinceId = $ward->district->provinceId;
        $this->districtId = $ward->districtId;
    }

    public function updateWard()
    {
        $this->validate();
        $isEditId = $this->isEditId;
        $ward = Ward::findOrFail($isEditId);
        $ward->update([
            'wardName' => $this->wardName,
            'districtId' => $this->districtId,
        ]);
        $this->reset();
        session()->flash('success', 'Update ward successfully.');
        $this->dispatchBrowserEvent('hidden-modal');
    }

    public function deleteWard($id)
    {
        $ward = Ward::findOrFail($id);
        $this->isDeleteId = $ward->id;
    }

    public function destroyWard()
    {
        $isDeleteId = $this->isDeleteId;
        $ward = Ward::findOrFail($isDeleteId);
        $ward->delete();
        session()->flash('success', 'Delete ward successfully.');
        $this->dispatchBrowserEvent('hidden-modal');
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
        $provinces = Province::orderBy('provinceName', 'desc')->get();
        if (!empty($this->provinceId)) {
            $this->districts = District::where('provinceId', $this->provinceId)->get();
        }
        $searchTerm = '%' . $this->searchTerm . '%';
        return view('livewire.admin.ward.index-page', [
            'provinces' => $provinces,
            'wards' => Ward::where('wardName', 'like', $searchTerm)
                ->orderBy('created_at', 'desc')
                ->paginate($this->perPage)
        ])
            ->extends('admin.layouts.app')
            ->section('content');
    }
}
