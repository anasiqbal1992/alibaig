<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'total', 'status'
    ];
   
    public function orderItems(){
        
     return $this->belongsToMany(menu::class)->withPivot('qty', 'total','pay');   
    }

    public function user(){
        
     return $this->belongsTo(User::class);   
    }
    
       public function status()
    {
        return $this->belongsTo(Status::class);
    }
    
    public function comments(){
        
    return $this->hasMany(Comment::class);
    
    }
}
