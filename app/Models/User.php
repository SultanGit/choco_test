<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * @package App
 * @property $role string
 * @property $isAdmin boolean
 * @property $isModer boolean
 */

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    public const DEFAULT_ROLE = 'user';

    protected $fillable = [
        'login', 'role', 'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function getIsAdminAttribute(): bool
    {
        return $this->role === 'admin';
    }

    public function getIsModerAttribute(): bool
    {
        return $this->role === 'moder' || $this->isAdmin;
    }
}
