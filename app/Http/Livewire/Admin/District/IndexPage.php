<?php

namespace App\Http\Livewire\Admin\District;

use App\Models\District;
use App\Models\Province;
use Livewire\Component;
use Livewire\WithPagination;

class IndexPage extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchTerm;
    public $districtName;
    public $provinceId;
    public $isEditId;
    public $isDeleteId;
    public $perPage = 10;

    protected $rules = [
        'provinceId' => 'required',
        'districtName' => 'required|max:255',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function storeDistrict()
    {
        $validatedData = $this->validate();
        $validatedData['provinceId'] = $this->provinceId;
        District::create($validatedData);
        $this->reset();
        session()->flash('success', 'Create new district successfully.');
        $this->dispatchBrowserEvent('hidden-modal');
    }

    public function editDistrict($id)
    {
        $district = District::findOrFail($id);
        $this->isEditId = $district->id;
        $this->districtName = $district->districtName;
        $this->provinceId = $district->provinceId;
    }

    public function updateDistrict()
    {
        $this->validate();
        $isEditId = $this->isEditId;
        $district = District::findOrFail($isEditId);
        $district->update([
            'provinceId' => $this->provinceId,
            'districtName' => $this->districtName,
        ]);
        $this->reset();
        session()->flash('success', 'Update district successfully.');
        $this->dispatchBrowserEvent('hidden-modal');
    }

    public function deleteDistrict($id)
    {
        $district = District::findOrFail($id);
        $this->isDeleteId = $district->id;
    }

    public function destroyDistrict()
    {
        $isDeleteId = $this->isDeleteId;
        $district = District::findOrFail($isDeleteId);
        if ($district->wards->count() > 0) {
            session()->flash('danger', 'You can not delete district successfully.');
            $this->dispatchBrowserEvent('hidden-modal');
        } else {
            $district->delete();
            session()->flash('success', 'Delete district successfully.');
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
        $provinces = Province::all();
        $searchTerm = '%' . $this->searchTerm . '%';
        return view('livewire.admin.district.index-page', [
            'provinces' => $provinces,
            'districts' => District::where('districtName', 'like', $searchTerm)
                ->orderBy('created_at', 'desc')
                ->paginate($this->perPage)
        ])
            ->extends('admin.layouts.app')
            ->section('content');
    }
}
