<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Comments;
use App\Http\Requests\CreateReplayRequest;
use App\CommentReplay;

class CommentReplayController extends Controller
{
   public function create(CreateReplayRequest $request,$id,$user_id)
   {

		CommentReplay::create([
			'comment_id'=>$id,
			'message'=>$request->message2,
			'to_user_id'=>$user_id,
			'from_user_id'=>Auth::user()->id,	

		]);

		return back();
   }

   public function destroy($id)
   {
   	$replay=CommentReplay::find($id);

   	if((Auth::user()->id==$replay->from_user_id)||(Auth::user()->hasRole('admin'))){
   		$replay->delete();
   	}else {
   		return back();
   	}
   
    return back();

   }
   public function update(CreateReplayRequest $request,$id){
   		$replay=CommentReplay::find($id);
    if((Auth::user()->id==$replay->from_user_id)||(Auth::user()->hasRole('admin'))){
    	$replay->fill([
    		'message'=>$request->message2,

    	]);
    	$replay->save();
    }else {
    	return back();
    }

    return back();

   }
}

    	