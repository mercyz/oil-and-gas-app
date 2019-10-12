<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Staff extends Authenticatable
{
    use Notifiable;

    protected $gaurd = 'staff';

    protected $fillable = ['firstname', 'lastname', 'email', 'password'];

   	protected $hidden = ['password', 'remember_token'];

   	protected $casts = ['email_verified_at' => 'datetime'];
}