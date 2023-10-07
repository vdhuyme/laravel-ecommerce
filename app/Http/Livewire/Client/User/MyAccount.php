<?php

namespace App\Http\Livewire\Client\User;

use App\Models\Address;
use App\Models\District;
use App\Models\Order;
use App\Models\Province;
use App\Models\Ward;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class MyAccount extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $firstName;
    public $lastName;
    public $email;
    public $phoneNumber;
    public $gender;
    public $currentPassword;
    public $newPassword;
    public $confirmPassword;
    public $userNames;
    public $phoneNumbers;
    public $emails;
    public $houseNumbers;
    public $provinceId;
    public $districts = [];
    public $districtId;
    public $wards = [];
    public $wardId;
    public $isDeleteId;
    public $default = 1;
    public $perPage = 10;

    protected $listeners = [
        'refresh' => '$refresh'
    ];

    protected $rules = [
        'firstName' => 'required',
        'lastName' => 'required',
        'gender' => 'in:male,female',
        'phoneNumber' => ['required', 'numeric', 'regex:/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/'],
    ];

    protected $messages = [
        'firstName.required' => 'Trường này không được bỏ trống.',
        'lastName.required' => 'Trường này không được bỏ trống.',
        'gender.in' => 'Sai định dạng.',
        'phoneNumber.required' => 'Trường này không được bỏ trống.',
        'phoneNumber.numeric' => 'Sai định dạng.',
        'phoneNumber.regex' => 'Sai định dạng.',
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
        $this->gender = $user->gender;
    }

    public function updateProfile()
    {
        $this->validate();
        $user = Auth::user();
        $user->update([
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'phoneNumber' => $this->phoneNumber,
            'gender' => $this->gender
        ]);
        session()->flash('success', 'Cập nhật thông tin thành công.');
    }

    public function updatePassword()
    {
        $validatedData = $this->validate(
            [
                'currentPassword' => 'required',
                'newPassword' => 'required|min:8',
                'confirmPassword' =>  ['required', 'same:newPassword'],
            ],
            [
                'currentPassword.required' => 'Trường này không được bỏ trống.',
                'newPassword.required' => 'Trường này không được bỏ trống.',
                'newPassword.min' => 'Mật khẩu chứa ít nhất 8 kí tự.',
                'confirmPassword.required' => 'Trường này không được bỏ trống.',
                'confirmPassword.same' => 'Xác nhận mật không chính xác.',
            ],
        );

        $user = Auth::user();

        if (!Hash::check($validatedData['currentPassword'], $user->password)) {
            $this->reset();
            session()->flash('danger', 'Opps!!! Mật khẩu hiện tại không đúng. Vui lòng nhập lại.');
        } else {

            $user->update([
                'password' => Hash::make($validatedData['newPassword'])
            ]);
            $this->reset();
            session()->flash('success', 'Mật khẩu của bạn đã được cập nhật.');
        }
    }

    public function newAddress()
    {
        $validatedData = $this->validate(
            [
                'houseNumbers' => 'required|max:255',
                'emails' => 'required|email',
                'provinceId' => 'required',
                'districtId' => 'required',
                'wardId' => 'required',
                'phoneNumbers' => ['required', 'numeric', 'regex:/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/'],
                'userNames' => 'required',
            ],
            [
                'houseNumbers.required' => 'Trường này không được bỏ trống.',
                'houseNumbers.max' => 'Tối đa 255 kí tự.',
                'emails.required' => 'Trường này không được bỏ trống.',
                'provinceId.required' => 'Trường này không được bỏ trống.',
                'districtId.required' => 'Trường này không được bỏ trống.',
                'wardId.required' => 'Trường này không được bỏ trống.',
                'phoneNumbers.required' => 'Trường này không được bỏ trống.',
                'userNames.required' => 'Trường này không được bỏ trống.',
                'phoneNumbers.required' => 'Trường này không được bỏ trống.',
                'phoneNumbers.numeric' => 'Sai định dạng.',
                'phoneNumbers.regex' => 'Sai định dạng.',
            ]
        );

        if (Auth::user()->addresses->count() < 5) {
            $validatedData['phoneNumber'] = $this->phoneNumbers;
            $validatedData['email'] = $this->emails;
            $validatedData['userName'] = $this->userNames;
            $validatedData['houseNumber'] = $this->houseNumbers;
            $validatedData['userId'] = Auth::user()->id;
            Address::create($validatedData);
            $this->reset();
            $this->emit('refresh');
        } else {
            session()->flash('warning', 'Mỗi người không thể thêm quá 5 địa chỉ.');
            $this->reset();
        }
    }

    public function deleteAddress($id)
    {
        $userAddress = Address::findOrFail($id);
        $this->isDeleteId = $userAddress->id;
    }

    public function destroyAddress()
    {
        $isDeleteId = $this->isDeleteId;
        $userAddress = Address::findOrFail($isDeleteId);
        $userAddress->delete();
        $this->dispatchBrowserEvent('hidden-modal');
    }

    public function render()
    {
        $provinces = Province::all();
        if (!empty($this->provinceId)) {
            $this->districts = District::where('provinceId', $this->provinceId)->get();
        }
        if (!empty($this->districtId)) {
            $this->wards = Ward::where('districtId', $this->districtId)->get();
        }
        $userAddresses = Address::where('userId', Auth::user()->id)->get();

        $orders = Order::orderBy('created_at', 'desc')
            ->where('userId', Auth::user()->id)->paginate($this->perPage);
        return view('livewire.client.user.my-account', [
            'provinces' => $provinces,
            'userAddresses' => $userAddresses,
            'orders' => $orders,
        ])
            ->extends('client.layouts.app')
            ->section('content');
    }
}
