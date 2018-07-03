<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
     protected $fillable = [
        'name', 'email', 'address','city','state','postalcode','phone'
    ];
}
