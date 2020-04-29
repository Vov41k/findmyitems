<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Items;
use App\SentMessages;
use App\ReceivedMessages;
use App\Images;
use App\Messages;
use App\CommentReplay;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::where('role','!=','admin')->get();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

       $user=User::find($id);
       $user->fill([
         'role'=>$request->role,

       ]);
       $user->save();
       return [
       
        $id,
        $request->role,
       ];
       // return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        $deleteid=$user->id;
        $items=Items::where('user_id','=',$deleteid)->get();
        foreach($items as $item){
        // 
        foreach($item->images as $image){
           
            $image->delete();
        }
        foreach($item->comments as $comment){

            foreach($comment->replays as $replay){
              

                 $replay->delete();
            }


           $comment->delete();
        }

            $item->delete();
        }
        
        $sentmessagestouser=SentMessages::where('to_user_id','=',$deleteid)->get();
        foreach($sentmessagestouser as $sent){

            $sent->delete();
        }
         $sentmessagesfromuser=SentMessages::where('from_user_id','=',$deleteid)->get();
          foreach($sentmessagesfromuser as $sents){


            $sents->delete();
        }



         $receivedmessagestouser=ReceivedMessages::where('to_user_id','=',$deleteid)->get();
        foreach($receivedmessagestouser as $received){

            $received->delete();
        }

          $receivedmessagesfromuser=ReceivedMessages::where('from_user_id','=',$deleteid)->get();
        foreach( $receivedmessagesfromuser as $receive){
         
            $receive->delete();
        }

        $user->delete();
        return redirect()->route('admin.users.index');
    }
    public function blockuser(Request $request){

        $user=User::where('nickname','=',$request->nickname)->first();
       
        if($user->role=='admin'){
            return 'not blocked';
        }
        // findmyitems.com\vendor\laravel\framework\src\illuminate\Auth\Middleware\Authenticate.php
     
        if(Auth::user()->hasRole('admin')){

              $user->fill([
              $user->blocked=true
            ]);
           
            $user->save();

            return 'blocked';

        }

    }
    public function changestatus(Request $request,$id){
        $user=User::find($id);
        if($user->hasRole('admin')){
            return 'none';
        }else {

            $user->blocked==1 ? $user->blocked=0:$user->blocked=1;
            $user->save();
            return $user->blocked==1 ? $user->name.' is blocked':$user->name.' is unblocked';

        }

    }
  
}







