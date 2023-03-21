<?php

namespace App\Http\Livewire\Admin\Order;

use App\Mail\InvoiceEmail;
use App\Models\Order;
use App\Models\OrderProduct;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class EditPage extends Component
{
    public $isEditId;
    public $note, $userId, $trackingNumber, $status, $paymentMode, $paymentId,
        $created_at, $updated_at, $userName, $userEmail, $phoneNumber, $shippingAddress;
    public $total;
    public $orderProducts;

    protected $rules = [
        'status' => 'in:refund,cancel,success,inDelivery,pending,accepted',
    ];

    public function mount($id)
    {
        $order = Order::findOrFail($id);

        $this->isEditId = $order->id;
        $this->userId = $order->userId;
        $this->trackingNumber = $order->trackingNumber;
        $this->status = $order->status;
        $this->paymentMode = $order->paymentMode;
        $this->paymentId = $order->paymentId;
        $this->created_at = $order->created_at;
        $this->updated_at = $order->updated_at;
        $this->userName = $order->userName;
        $this->userEmail = $order->userEmail;
        $this->phoneNumber = $order->phoneNumber;
        $this->shippingAddress = $order->shippingAddress;
        $this->note = $order->note;

        $this->orderProducts = OrderProduct::orderBy('created_at', 'asc')
            ->where('orderId', $id)->get();
        foreach ($this->orderProducts as $product) {
            $this->total += $product->purchasePrice * $product->quantity;
        }
    }

    public function updateOrder()
    {
        $validatedData = $this->validate();
        $id = $this->isEditId;
        $order = Order::findOrFail($id);
        $order->update([
            'status' => $validatedData['status'],
        ]);

        $orderProducts = OrderProduct::orderBy('created_at', 'asc')
            ->where('orderId', $id)->get();

        Mail::to($order->userEmail)->send(new InvoiceEmail($order, $orderProducts));
        session()->flash('success', 'Update and send invoice ' . $order->trackingNumber . ' to ' . $order->userName . ' successfully.');
        return redirect()->route('orders');
    }

    public function exportInvoice($id)
    {
        $order = Order::findOrFail($id);
        $orderProducts = OrderProduct::orderBy('created_at', 'asc')
            ->where('orderId', $id)->get();
        $pdfContent = PDF::loadView('admin.invoices.invoice', compact('order', 'orderProducts'))->output();
        return response()->streamDownload(
            fn () => print($pdfContent),
            "invoice-" . $order->trackingNumber . ".pdf"
        );
    }

    public function render()
    {
        return view('livewire.admin.order.edit-page')
            ->extends('admin.layouts.app')
            ->section('content');
    }
}
