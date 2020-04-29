<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Messages;
use App\SentMessages;
use App\User;

class SentMessageController extends Controller
{
   public function destroy($id)
   {
    	$sentmessage=SentMessages::find($id);
    	if($sentmessage==null){
    		return back();
    	}
    	if($sentmessage->from_user_id!=Auth::user()->id){
    		return back();
    	}else {
    		$sentmessage->delete();

    	}

    	return back();
    }

    public function sent()
    {
    	$sentmessages=SentMessages::where('from_user_id','=',Auth::user()->id)->get();
    	return view('messages.sent',compact('sentmessages'));
    }
}
