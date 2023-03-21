<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'productName',
        'description',
        'productStatus',
        'featuredProduct',
        'productSlug',
        'metaTitle',
        'metaDescription',
        'metaKey',
        'categoryId',
        'originalPrice',
        'sellingPrice',
        'stock'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryId');
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class, 'productId');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class, 'productId');
    }

    public function orderProduct()
    {
        return $this->hasMany(OrderProduct::class, 'productId');
    }
}
