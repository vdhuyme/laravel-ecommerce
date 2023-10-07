<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoiceEmail extends Mailable
{
    use Queueable;
    use SerializesModels;

    public $order;
    public $orderProducts;

    public function __construct($order, $orderProducts)
    {
        $this->order = $order;
        $this->orderProducts = $orderProducts;
    }

    public function build()
    {
        $subject = "Your Order Invoice";
        return $this->subject($subject)
            ->view('admin.email.invoice-email');
    }
}
