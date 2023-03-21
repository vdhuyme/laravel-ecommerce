<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'note',
        'userId',
        'trackingNumber',
        'status',
        'paymentMode',
        'paymentId',
        'userEmail',
        'phoneNumber',
        'userName',
        'shippingAddress',
        'total'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class, 'orderId');
    }
}
