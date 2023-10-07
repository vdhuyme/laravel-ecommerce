<?php

namespace App\Http\Livewire\Client\Order;

use App\Mail\PlaceOrderEmail;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Livewire\Component;

class CheckOutPage extends Component
{
    public $shippingAddresses;
    public $note;
    public $shippingAddressId;
    public $paymentMode;
    public $paymentId = null;
    public $cartProducts;
    public $count;
    public $total;
    public $totalCurrencyExchange;

    protected $listeners = [
        'validation',
        'transaction' => 'paypalOrder',
    ];

    public function validation()
    {
        $this->validate();
    }

    protected $rules = [
        'shippingAddressId' => 'required',
        'note' => 'max:1024',
        'paymentMode' => 'required',
        'cartProducts' => '',
        'count' => '',
        'total' => '',
    ];

    protected $messages = [
        'note.max' => 'Tối đa 1024 ký tự.',
        'paymentMode.required' => 'Vui lòng chọn hình thức thanh toán.',
        'shippingAddressId.required' => 'Vui lòng chọn địa chỉ giao hàng.',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount()
    {
        $user = Auth::user();
        $shippingAddresses = Address::where('userId', $user->id)->get();
        if ($shippingAddresses->count() === 0) {
            session()->flash('warning', 'Vui lòng thêm địa chỉ trước khi thanh toán.');
            return redirect()->route('myAccount');
        }
        $this->shippingAddresses = $shippingAddresses;

        $cartProducts = Cart::where('userId', $user->id)->get();
        $count = Cart::where('userId', $user->id)->count();
        $this->cartProducts = $cartProducts;
        $this->count = $count;

        foreach ($cartProducts as $product) {
            $this->total += $product->product->sellingPrice * $product->quantity;
            $this->totalCurrencyExchange = number_format((float)(($this->total + 35000) / 23000), 2, '.', '');
        }
    }

    public function codOrder()
    {
        $validatedData = $this->validate();

        $userSelectedAddress = Address::where('id', $this->shippingAddressId)->firstOrFail();
        $houseNumber = $userSelectedAddress->houseNumber;
        $ward = $userSelectedAddress->ward->wardName;
        $district = $userSelectedAddress->district->districtName;
        $province = $userSelectedAddress->province->provinceName;
        $shippingAddresses = $houseNumber . ', ' . $ward . ', ' . $district . ', ' . $province;

        $order = Order::create([
            'userId' => Auth::user()->id,
            'userName' => $userSelectedAddress->userName,
            'userEmail' => $userSelectedAddress->email,
            'phoneNumber' => $userSelectedAddress->phoneNumber,
            'trackingNumber' => Str::upper('VFXVN' . Str::random(15)),
            'shippingAddress' => $shippingAddresses,
            'note' => $validatedData['note'],
            'status' => 'pending',
            'paymentMode' => $validatedData['paymentMode'],
            'paymentId' => $this->paymentId,
            'total' => $this->total + 35000,
        ]);

        foreach ($this->cartProducts as $product) {
            OrderProduct::create([
                'orderId' => $order->id,
                'productId' => $product->product->id,
                'quantity' => $product->quantity,
                'purchasePrice' => $product->product->sellingPrice,
            ]);
        }

        Mail::to($order->userEmail)->send(new PlaceOrderEmail());
        Cart::where('userId', Auth::user()->id)->delete();
        return redirect()->route('thankYou');
    }

    public function paypalOrder($paymentId)
    {
        $validatedData = $this->validate();

        $userSelectedAddress = Address::where('id', $this->shippingAddressId)->firstOrFail();
        $houseNumber = $userSelectedAddress->houseNumber;
        $ward = $userSelectedAddress->ward->wardName;
        $district = $userSelectedAddress->district->districtName;
        $province = $userSelectedAddress->province->provinceName;
        $shippingAddresses = $houseNumber . ', ' . $ward . ', ' . $district . ', ' . $province;

        $order = Order::create([
            'userId' => Auth::user()->id,
            'userName' => $userSelectedAddress->userName,
            'userEmail' => $userSelectedAddress->email,
            'phoneNumber' => $userSelectedAddress->phoneNumber,
            'trackingNumber' => Str::upper('VFXVN' . Str::random(15)),
            'shippingAddress' => $shippingAddresses,
            'note' => $validatedData['note'],
            'status' => 'pending',
            'paymentMode' => $validatedData['paymentMode'],
            'paymentId' => $paymentId,
            'total' => $this->total + 35000,
        ]);

        foreach ($this->cartProducts as $product) {
            OrderProduct::create([
                'orderId' => $order->id,
                'productId' => $product->product->id,
                'quantity' => $product->quantity,
                'purchasePrice' => $product->product->sellingPrice,
            ]);
        }

        Mail::to($order->userEmail)->send(new PlaceOrderEmail());
        Cart::where('userId', Auth::user()->id)->delete();
        return redirect()->route('thankYou');
    }

    public function render()
    {
        return view('livewire.client.order.check-out-page')
            ->extends('client.layouts.app')
            ->section('content');
    }
}
