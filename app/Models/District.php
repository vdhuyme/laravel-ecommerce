<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $fillable = [
        'districtName',
        'provinceId',
    ];

    public function province()
    {
        return $this->belongsTo(Province::class, 'provinceId');
    }

    public function wards()
    {
        return $this->hasMany(Ward::class, 'districtId');
    }

    public function addresses()
    {
        return $this->hasMany(Address::class, 'districtId');
    }
}
