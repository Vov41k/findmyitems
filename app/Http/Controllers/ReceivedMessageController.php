<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Messages;
use App\SentMessages;
use App\ReceivedMessages;
use App\User;

class ReceivedMessageController extends Controller
{
    public function destroy($id)
    {
    	$receivedmessage=ReceivedMessages::find($id);
    	if($receivedmessage==null){
    		return back();
    	}
    	if($receivedmessage->to_user_id!=Auth::user()->id){
    		return back();
    	}else {
    		$receivedmessage->delete();

    	}

      return redirect()->route('receivemessage'); 
    }
      public function receive()
      {
    	$count=ReceivedMessages::where('read_msg','=','no')->where('to_user_id','=',Auth::user()->id)->count();
       
    	$messagesreceived=ReceivedMessages::where('to_user_id','=',Auth::user()->id)->orderBy('created_at','desc')->get();


    	return view('messages.receive',compact('messagesreceived'));
    }

    public function readmsg($id)
    {
       $receivedmsg=ReceivedMessages::find($id);
       if(Auth::user()->id!=$receivedmsg->to_user_id){
        return ;
       }
       if($receivedmsg->read_msg =='no'||$receivedmsg->read_msg=='null'||$receivedmsg->read_msg==''){
            $receivedmsg->read_msg="yes";
            $receivedmsg->save();
            return $id;
       }else {
        return ;
       }
    }

    public function showmsg($id)
    {
     $message= ReceivedMessages::where('to_user_id','=',Auth::user()->id)->where('id','=',$id)->first();
      if($message==null){
        return back();
      }else {
         return view('messages.show',compact('message'));
      }

     
    }
}
