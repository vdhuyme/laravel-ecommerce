<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $fillable = [
        'provinceName',
    ];

    public function districts()
    {
        return $this->hasMany(District::class, 'provinceId');
    }

    public function addresses()
    {
        return $this->hasMany(Address::class, 'provinceId');
    }
}
