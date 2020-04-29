<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Messages;
use App\SentMessages;
use App\ReceivedMessages;
use App\User;
use App\Http\Requests\CreateMessageRequest;
use App\Events\SendMessageEvent;


class MessagesController extends Controller
{
    public function index()
    {
         $messagesreceived=ReceivedMessages::where('to_user_id','=',Auth::user()->id)->where(function($query){
            $query->where('read_msg','=','no')->orWhereNull('read_msg');
         })->get();

    	return view('messages.index',compact('messagesreceived'));
    }

    public function create(){

    	return view('messages.create');
    }

    public function send(CreateMessageRequest $request){
    	$user=User::where('nickname','=',$request->destination)->first();
        $message=$request->message;
    	if($user==null){
    		return back();
    	}

        if($message==null){
          return back();
        }
       
    	$messagessent=SentMessages::create([
    	'message'=>$request->message,
    	'to_user_id'=>$user->id,
    	'from_user_id'=>Auth::user()->id,

    	]);
    	$messagereceived=ReceivedMessages::create([
    		'message'=>$request->message,
	    	'to_user_id'=>$user->id,
	    	'from_user_id'=>Auth::user()->id,

    	]);
        $messagereceivedId=$messagereceived->id;

        $fromUser=Auth::user();
        event(new SendMessageEvent($fromUser,$message,$user->id,$messagereceivedId));

    	return redirect()->route('messages');
    }
  
}
