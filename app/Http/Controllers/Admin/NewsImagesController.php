<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\NewsImages;
use Illuminate\Support\Facades\Auth;
use Image;
use App\Http\Requests\CreateNewsStep2Request;
use Illuminate\Support\Facades\Validator;
use Session;
use App\User;


class NewsImagesController extends Controller
{
    public function upload(CreateNewsStep2Request $request,$id){
 
    	$news=News::where('user_id','=', Auth::user()->id)->latest()->first();
    	$newsid=$news->id;
    	if($newsid!=$id){
          Session::flash('cheat', "Don't cheat");

    		return redirect()->back();
    	}
    
    	$images=$request->images;
     
    	foreach($images as $image){
    		$filename  = time()  . $image->getClientOriginalName();
            $path = 'uploads/news/' . $filename;
            Image::make($image->getRealPath())->save($path);
            NewsImages::create([
            	'user_id'=>Auth::user()->id,
		    	'news_id'=>$id,
		    	'image_url'=>$path,

            ]);


    	}
    	$newsimages=NewsImages::where('news_id','=',$id)->get();
        return redirect()->route('admin.createnewsstep3',$news->id);

    }
     public function uploadtextareaimages(Request $request,$id){
           if ($request->hasFile('file')) {
                $image=$request->file;
                    // foreach($images as $image){

                $filename  = time()  . $image->getClientOriginalName();
                $path = 'uploads/news/' . $filename;
            // $path = $file->getClientOriginalName();
             Image::make($image->getRealPath())->save($path);
             $image=NewsImages::create([
                'user_id'=>Auth::user()->id,
                'news_id'=>$id,
                'image_url'=>$path,


             ]);
               return ['http://findmyitems.com/'.$path,$image];
      
        }
     }
     public function deletenewsimage(Request $request,$id){
     
                $newsimage=NewsImages::find($id);
                if((Auth::user()->id==$newsimage->id)||(Auth::user()->hasRole('admin'))){
                     if(\File::exists(public_path($newsimage->image_url))){
             
                \File::delete(public_path($newsimage->image_url));
              
                $newsimage->delete();
                    }

                    return $id;

                }else {
                    return '';
                }

     }
}
