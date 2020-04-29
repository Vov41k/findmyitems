<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateProfileImage;
use Image;
 // use Intervention\Image\ImageManagerStatic as Image;

class ProfileController extends Controller
{
    public function index($id){
    	$user=User::find($id);
    	return view('admin.profile.index',compact('user'));
    }


    public function update(CreateProfileImage $request,$id){
    	

    	$user=User::find($id);
    	$name=$user->name;
    	$nickname=$user->nickname;

    	if($request->name==null){
    		$name=$user->name;
    	} else {
    		$name=$request->name;
    	}
    	if($request->nickname==null){
    		$nickname=$user->nickname;
    	} else {
    		$nickname=$request->nickname;
    	}

    	 $user->fill([
         'name' => $name,
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


       return redirect()->route('admin.showprofile',compact('id'));
    }
}
