<?php

namespace App\Http\Controllers;
use App\Events\ChatEvent;
use Illuminate\Http\Request;
use Auth;
use App\Model\User\User;
class ChatController extends Controller
{

	   public function __construct()
    {
        $this->middleware('auth');
    }
    public function chat(){
    	return view('Front/chat');
    }

    public function send(Request $request){

    	$user=Auth::user();
         $this->saveToSession($request);
    	event(new ChatEvent($request->message,$user));
    	
    }

    public function saveToSession(Request $request){
    	session()->put('chat',$request->chat);
    	
    }
    public function getOldMessage(Request $request){
        return session('chat');
        
    }
    public function deleteSession()
    {
        session()->forget('chat');
    }
}
