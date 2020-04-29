<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreImageThumbnailRequest;
use App\Items;
use Illuminate\Support\Facades\Auth;
use App\User;
use Image;
use App\ItemThumbnail;

class ItemThumbnailController extends Controller
{
    public function update(StoreImageThumbnailRequest $request,$itemid,$id){
    	$item=Items::find($itemid);
    	$userId=$item->id;
    		if((Auth::user()->id=$userId)||(Auth::user()->hasRole('admin'))){
    			 if($request->hasFile('mainimage')){
			         
			            $image=$request->mainimage;
			            $filename  = time()  . $image->getClientOriginalName();

			            // thumbnail image
			            $path = 'uploads/itemsthumbnail/' . $filename;
			            Image::make($image->getRealPath())->resize(400, 400)->save($path); 
			            $imagethumbnail=ItemThumbnail::find($id);
			              $url=$imagethumbnail->image_url;
				    		if(\File::exists(public_path($url))){
					    \File::delete(public_path($url));
							}
			            $imagethumbnail->fill([
			            	 'image_url'=>$path,


			            ]);
			            $imagethumbnail->save();

       			 }

    		}else {
    			return back();
    		}

        return back();
    	
    }

    public function destroy($itemid,$id){
    	
    	$item=Items::find($itemid);
    	$userId=$item->id;

		if((Auth::user()->id=$userId)||(Auth::user()->hasRole('admin'))){
    	$imagethumbnail=ItemThumbnail::find($id);
    	
    	$url=$imagethumbnail->image_url;

    		if(\File::exists(public_path($url))){
    			
	    \File::delete(public_path($url));
			}
			
    	$imagethumbnail->delete();

    		}else {
    			return back();
    		}

    	
        return back();





    }


    public function store(StoreImageThumbnailRequest $request,$id)
    {
    	
    	$item=Items::find($id);
    	$userId=$item->id;

    		if((Auth::user()->id=$userId)||(Auth::user()->hasRole('admin'))){
    			  if($request->hasFile('mainimage')){
         
            $image=$request->mainimage;
            $filename  = time()  . $image->getClientOriginalName();

            // thumbnail image
            $path = 'uploads/itemsthumbnail/' . $filename;
            Image::make($image->getRealPath())->resize(400, 400)->save($path); 
            ItemThumbnail::create([
               'item_id'=>$id,
               'image_url'=>$path,

            ]);

        }
    		}else {
    			return back();
    		}

    	
        return back();
    }
}
