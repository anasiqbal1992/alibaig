<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User\menu;
class FrontController extends Controller
{
    //
    public function Veg(){
       $data = menu::where('type','=','veg')->get();
       
        return view('Front/veg', ['data'=> $data]);
    }
     public function Non_Veg(){
       $data = menu::where('type','=','non veg')->get();
       
        return view('Front/non_veg', ['data'=> $data]);
    }
    
}
