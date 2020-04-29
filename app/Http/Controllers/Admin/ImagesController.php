<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Images;
use App\Http\Requests\CreateImagesRequest;
use Illuminate\Support\Facades\Validator;
use App\ItemThumbnail;
use App\Http\Requests\CreateStoreImagesRequest;

class ImagesController extends Controller
{
    public function index($id)
    {
        $itemsthumbnail=ItemThumbnail::where('item_id','=',$id)->first();
    	$images=Images::where('item_id','=',$id)->get();

    	return view('admin.images.index',compact('images','itemsthumbnail','id'));
    }


    public function store(CreateStoreImagesRequest $request,$id)
    {
    	$images=$request->images;

    	foreach($images as $image){
    		$imageName=time() . $image->getClientOriginalName();
    		$image->move('uploads/items',$imageName);

	    	Images::create([
	    		'item_id'=>$id,
	    		'url'=>'uploads/items/'.$imageName

	    	]);
    	}

    	return redirect()->route('admin.items.index');
    }




    public function destroy($id){
    	$image=Images::find($id);
    	$url=$image->url;

	    	if(\File::exists(public_path($url))){
	    \File::delete(public_path($url));
			}

    	$image->delete();

    	return back();

    }
    public function update(CreateImagesRequest $request,$id){

         if($request->hasFile('image')){
    	$image=Images::find($id);
    	$url=$image->url;
    	if(\File::exists(public_path($url))){
	    \File::delete(public_path($url));
			}
    	$imageinput=$request->image;
    	$imageName=time() . $imageinput->getClientOriginalName();
    	$imageinput->move('uploads/items',$imageName);

    	$image->fill([
    		'url'=>'uploads/items/'.$imageName
    	]);
    	$image->save();
    	}
    	return back();

    }

}
