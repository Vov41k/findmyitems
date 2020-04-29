<?php
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

// Broadcast::channel('chat',function(){
// 	return true;
// 	// return true;
// // Broadcast::channel('chat.{id}',function($id){
// 	// return Auth::user()->id==$request->id;
// 	// return true;
// });
// Broadcast::channel('chat.{id}',function($user,$id){
// 	return $user->id==$id;
// 	// return true;
// // Broadcast::channel('chat.{id}',function($id){
// 	// return Auth::user()->id==$request->id;
// 	// return true;
// });

// 
 Broadcast::channel('chat',function($user){
	return ['name'=>$user->nickname,'id'=>$user->id,'image'=>$user->photo_url];
	// return true;

});

 Broadcast::channel('message.{id}',function($user,$id){
	// return Auth::user()->id==$id;
	if(Auth::user()->id==$id){
		return true;
	}
	// return true;

});