<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Items;
use App\Category;
use App\Http\Requests\CreateItemsRequest;
use App\Images;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Image;
use App\ItemThumbnail;

class ItemsController extends Controller
{
    public function index(){
    	$id=Auth::user()->id;
    	$items=Items::where('user_id','=',$id)->get();
    	return view('user.items.index',compact('items'));
    }
    public function create(){
    	 $category=Category::pluck('name','id');
    	return view('user.items.create',compact('category'));
    }
    public function store(CreateItemsRequest $request){
    	$category= Category::where('id','=',$request->category)->pluck('id')->first();

     if($category==null){
         return redirect()->back()->withErrors(new \Illuminate\Support\MessageBag(['category'=>'Not valid category we register you']));
     }

        if($request->hasFile('images')){
            
               $imageRules = array(
                'images'=>'required|array', 
                'images.*' => 'required|mimes:jpeg,jpg,png|max:2000',
            );

                    
                 $imageValidator = $this->validate($request, $imageRules);
        }
     
                

      
        $brand=ucfirst(strtolower($request->brand));
        $model_name=ucfirst(strtolower($request->model_name));
        $category=$request->category;
        $title=ucfirst(strtolower($request->title));
        
        $item=Items::create([
            'brand'=>$brand,
            'model_name'=>$model_name,
            'category_id'=>$category,
            'title'=>$title,
            'description'=>$request->description,
            'user_id'=>Auth::user()->id,
            'country'=>$request->country,
            'city'=>$request->city,
            'street_adress'=>$request->street_adress,
            'phone'=>$request->phone,
            'email'=>$request->email





        ]);
            if($request->hasFile('images')){
         
            $images=$request->images;
            foreach($images as $key=> $image){
            if($key==0){
            $filename  = time()  . $image->getClientOriginalName();
            // original image
            $path2 = 'uploads/items/' . $filename;
            Image::make($image->getRealPath())->save($path2);
           
            // thumbnail image
            $path = 'uploads/itemsthumbnail/' . $filename;
            Image::make($image->getRealPath())->resize(400, 400)->save($path); 
            ItemThumbnail::create([
               'item_id'=>$item->id,
               'image_url'=>$path,

            ]);   
                 // $imageName = time() . $image->getClientOriginalName();
                
                 // $image->move('uploads/items', $imageName);
                 Images::create([
                    'item_id'=>$item->id,
                    'url'=>$path2

                 ]);

             }else {
           

            $filename  = time()  . $image->getClientOriginalName();
            $path = 'uploads/items/' . $filename;
            Image::make($image->getRealPath())->save($path);    
                 // $imageName = time() . $image->getClientOriginalName();
                
                 // $image->move('uploads/items', $imageName);
                 Images::create([
                    'item_id'=>$item->id,
                    'url'=>$path

                 ]);
             }
            }
        }

      
        
      
        return redirect()->route('user.useritems');
    }
    public function delete($id){

    	
        $item=Items::find($id);
        if($item->user_id!=Auth::user()->id){
        	return back();
        }else {
              $itemthumbnail=ItemThumbnail::where('item_id','=',$id)->first();
                $itemthumbnailurl=$itemthumbnail->image_url;
                  if( \File::exists(public_path($itemthumbnailurl))){
                    \File::delete(public_path($itemthumbnailurl));
                    }

                 $itemthumbnail->delete();
		        $item->delete();
		        $images=Images::where('item_id','=',$id)->get();
		        foreach($images as $image){
		            $image->delete();
		            $url=$image->url;
		               if( \File::exists(public_path($url))){
		            \File::delete(public_path($url));
		            }

		        }
         
      
        return redirect()->route('user.useritems');
        }
    
    }
    public function edit($id){

    	$item=Items::find($id);
    	 if($item->user_id!=Auth::user()->id){
        	return back();
        }else {
        $category=Category::pluck('name','id');
        return view('user.items.edit',compact('item','category'));
    }
    }


    public function update(CreateItemsRequest $request,$id){
    	$item=Items::find($id);
    	 if($item->user_id!=Auth::user()->id){
        	return back();
        }else {
        	$category= Category::where('id','=',$request->category)->pluck('id')->first();

         if($category==null){
             return redirect()->back()->withErrors(new \Illuminate\Support\MessageBag(['category'=>'Not valid category we register you']));
         }
        $brand=ucfirst(strtolower($request->brand));
        $model_name=ucfirst(strtolower($request->model_name));
        $title=ucfirst(strtolower($request->title));
        $item=Items::find($id);
        $item->fill([
            'brand'=>$brand,
            'model_name'=>$model_name,
            'category_id'=>$request->category,
            'title'=>$title,
            'description'=>$request->description,
            'user_id'=>Auth::user()->id,
            'country'=>$request->country,
            'city'=>$request->city,
            'street_adress'=>$request->street_adress,
            'phone'=>$request->phone,
            'email'=>$request->email


        ]);
        $item->save();
         return redirect()->route('user.useritems');
       
        }
    }
}
