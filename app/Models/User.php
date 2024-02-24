<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'phone_number',
        'status',
        'email',
        'password',
        'is_root',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class, 'user_id');
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'user_id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'user_id');
    }
}
