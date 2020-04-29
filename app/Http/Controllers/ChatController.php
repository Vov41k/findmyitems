<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Auth;
use App\Events\ChatEvent;
use Illuminate\Support\Facades\Session;


class ChatController extends Controller
{
    public function index()
    {
    	$id='chat';
    	$categorys=Category::orderBy('sort_order','asc')->get();
    	return view('chat.index',compact('id','categorys'));
    }

    public function send(Request $request)
    {
    	$user=Auth::user();
        $this->savesession($request);
      
    	event(new ChatEvent($request->message,$user));
     
    }

    public function savesession(Request $request)
    {
        session()->put('chat',$request->chat);
    }
  


}
