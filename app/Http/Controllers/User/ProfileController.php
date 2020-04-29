<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Requests\CreateProfileImage;
use Image;


class ProfileController extends Controller
{
    public function index(){
    	$user=User::find(Auth::user()->id);
    	return view('user.profile.index',compact('user'));
    }



    public function update(CreateProfileImage $request){
    	$user=User::find(Auth::user()->id);

    	if($request->nickname==null){
    		$nickname=$user->nickname;
    	} else {
    		$nickname=$request->nickname;
    	}

    	 $user->fill([
         // 'name' => $name,
         'nickname' => $nickname,

       ]);
     
    	 if($request->hasFile('image')){


       	 	$old_image=$user->photo_url;
    	 	if(\File::exists($old_image)){
	   		 \File::delete($old_image);
			}
			
    		$image = $request->image;
			$filename  = time()  . $image->getClientOriginalName();
			$path = 'uploads/profile/' . $filename;
			Image::make($image->getRealPath())->resize(400, 400)->save($path);
			 $user->photo_url=$path;
        

    	 }
       $user->save();


       return redirect()->route('user.showuserprofile');


    }
}
