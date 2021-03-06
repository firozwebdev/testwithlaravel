<?php

namespace App;

use App\Notifications\AdminPasswordResetNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Manager extends Authenticatable
{
    use Notifiable;
    protected $guarded = [];
    protected $hidden = [
        'password', 
        'remember_token',
    ];

    // public function sendPasswordResetNotification($token)
    // {
    //       $this->notify(new AdminPasswordResetNotification($token));
    // }
}
