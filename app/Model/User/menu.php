<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    //
   protected $fillable = [
           'title', 'price', 'image', 'type', 'discription'
    ];
  // protected $table = 'menus';
}
