<?php

namespace App\Models;


use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable implements AuthenticatableContract
{
    use Notifiable;
    use HasFactory;
    protected $fillable = [
        'email',
        'password',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function getAuthIdentifierName()
    {
        return 'email';
    }

    public function getAuthIdentifier()
    {
        return request()->get('email');
    }

    public function getAuthPassword()
    {
        return Hash::make(request()->get('password'));
    }
}
