<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    public $incrementing = false;

    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'auth_date',
        'photo_url',
    ];

    protected $casts = [
        'auth_date' => 'datetime',
    ];

    protected $hidden = [
        //
    ];

    public function channels()
    {
        return $this->hasMany(Channel::class);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
