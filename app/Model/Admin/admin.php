<?php

namespace App\Model\Admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class admin extends Authenticatable
{
    use Notifiable;
    
     protected $fillable = [
        'name', 'email', 'password',
    ];

    public function receivesBroadcastNotificationsOn()
    {
        return 'admins.'.$this->id;
    }
}
