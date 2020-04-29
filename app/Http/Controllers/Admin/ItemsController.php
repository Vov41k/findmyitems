<?php

namespace App\Http\Controllers\Admin;

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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $items=Items::all();
       return view('admin.items.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::pluck('name','id');
        return view('admin.items.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateItemsRequest $request)
    {

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
;
                 Images::create([
                    'item_id'=>$item->id,
                    'url'=>$path2

                 ]);

             }else {
           

            $filename  = time()  . $image->getClientOriginalName();
            $path = 'uploads/items/' . $filename;
            Image::make($image->getRealPath())->save($path);    

                 Images::create([
                    'item_id'=>$item->id,
                    'url'=>$path

                 ]);
             }
            }
        }


        return redirect()->route('admin.items.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item=Items::find($id);
        $category=Category::pluck('name','id');

        return view('admin.items.edit',compact('item','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateItemsRequest $request, $id)
    {
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

        return redirect()->route('admin.items.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item=Items::find($id);
        $item->delete();
        $itemthumbnail=ItemThumbnail::where('item_id','=',$id)->first();
        $itemthumbnailurl=$itemthumbnail->image_url;
          if( \File::exists(public_path($itemthumbnailurl))){
            \File::delete(public_path($itemthumbnailurl));
            }

         $itemthumbnail->delete();
        
        $images=Images::where('item_id','=',$id)->get();
        foreach($images as $image){
            $image->delete();
            $url=$image->url;
               if( \File::exists(public_path($url))){
            \File::delete(public_path($url));
            }

        }

        return redirect()->route('admin.items.index');
    }
}
