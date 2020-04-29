<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateNewsDescriptionRequest;
use App\Http\Requests\CreateNewsRequest;
use Image;
use App\NewsImages;
use Illuminate\Support\Facades\Validator;
use Session;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $news=News::all();

       return view('admin.news.index',compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateNewsRequest $request)
    {   

            $image = $request->image;
            $filename  = time()  . $image->getClientOriginalName();
            $path = 'uploads/news/' . $filename;
            Image::make($image->getRealPath())->resize(800, 800)->save($path);

            $news=News::create([
                'title'=>$request->title,   
                'description_short'=>$request->description_short,
                'presentation_image_url'=>$path,
                'user_id'=>Auth::user()->id,
            ]);
            return redirect()->route('admin.createnewsstep2',$news->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news=News::find($id);
        return view('admin.news.show',compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $news=News::find($id);

      return view('admin.news.edit',compact('news'));
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
       
             $news=News::find($id);
             if($request->hasFile('image')){


            $old_image=$news->presentation_image_url;
            if(\File::exists($old_image)){
        \File::delete($old_image);
            }
            
            $image = $request->image;
            $filename  = time()  . $image->getClientOriginalName();
            $path = 'uploads/profile/' . $filename;
            Image::make($image->getRealPath())->resize(800, 800)->save($path);
     
             $news->presentation_image_url=$path;
       

         }   
        $news->fill([
                'title'=>$request->title,   
                'description_short'=>$request->description_short,
                'description'=>$request->description,
                'user_id'=>Auth::user()->id,    

        ]);
        $news->save();
      
        return redirect()->route('admin.news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news=News::find($id);
        $newsimages=NewsImages::where('news_id','=',$id)->get();

           foreach($newsimages as $image)
           {
                $image->delete();
                $url=$image->image_url;
                   if( \File::exists(public_path($url))){
                \File::delete(public_path($url));
                }

            }
        $news->delete();
        return redirect()->route('admin.news.index');



    }
    public function updatedescription(CreateNewsDescriptionRequest $request,$id){

        $news=News::where('user_id','=', Auth::user()->id)->latest()->first();

        $newsid=$news->id;
        if($newsid!=$id){

            return redirect()->back();
        }
      $description=$request->description;

      $cleanjsdescription=strip_tags($description,'<p><a><div></div><img><span><h1><h2><h3><h4><h5><br><tr><table><th><iframe>');
      
      
        $news->fill([
          'description'=>$cleanjsdescription,

        ]);
        $news->save();

        return redirect()->route('admin.news.index');

    }
    public function showstep3($id){
       
        $newsimages=NewsImages::where('news_id','=',$id)->get();

        return view('admin.news.createstep3',compact('newsimages','id'));
    }
      public function showstep2($id)
      {

       $news=News::find($id);
        $newsimages=NewsImages::where('news_id','=',$id)->get();
        return view('admin.news.createstep2',compact('news'));

    }
}

