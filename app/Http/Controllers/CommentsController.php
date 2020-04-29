<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateCommentRequest;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Comments;
use App\Items;

class CommentsController extends Controller
{
    public function create(CreateCommentRequest $request,$id)
    {
    	Comments::create([
    		'item_id'=>$id,
    		'user_id'=>Auth::user()->id,
    		'comment'=>$request->comment,
    		'like_user_id'=>$request->like,
    		'dislike_user_id'=>$request->dislike,

    	]);
    	
    	$item=Items::find($id);
        $comments=Comments::where('item_id','=',$id)->orderBy('created_at','desc')->paginate(3);

    	return redirect()->route('showitem',compact('id','item','comments'));


    }

    public function destroy($id)
    {
        $comment=Comments::find($id);

        if((Auth::user()->id==$comment->user_id)||(Auth::user()->hasRole('admin'))){
            $replays=$comment->replays;

            foreach($replays as $replay){
                $replay->delete();
            }

            $comment->delete();
        }

        return back();
    }

    public function update(CreateCommentRequest $request,$id){
        $comment=Comments::find($id);
      
        if((Auth::user()->id==$comment->user_id)||(Auth::user()->hasRole('admin'))){
          $comment->fill([
            'comment'=>$request->comment,

          ]);
          $comment->save();
        }else {
            return back();
        }

        return back();
    }
}
