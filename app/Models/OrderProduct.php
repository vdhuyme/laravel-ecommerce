<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'orderId',
        'productId',
        'quantity',
        'purchasePrice',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'orderId');
    }

    public function products()
    {
        return $this->belongsTo(Product::class, 'productId');
    }
}
