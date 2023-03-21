<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'userName',
        'phoneNumber',
        'email',
        'houseNumber',
        'userId',
        'provinceId',
        'districtId',
        'wardId',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'provinceId');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'districtId');
    }

    public function ward()
    {
        return $this->belongsTo(Ward::class, 'wardId');
    }
}
