<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;

    protected $fillable = [
        'wardName',
        'districtId',
    ];

    public function district()
    {
        return $this->belongsTo(District::class, 'districtId');
    }

    public function addresses()
    {
        return $this->hasMany(Address::class, 'wardId');
    }
}
