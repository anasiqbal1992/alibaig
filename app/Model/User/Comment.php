<?php

namespace App\Model\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function order(){
        return $this->belongsTo(Order::class);
    } 
}

