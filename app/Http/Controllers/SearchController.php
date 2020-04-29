<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Items;
use App\Category;
class SearchController extends Controller
{
   
   
     public function search(Request $request){
         $value=$request->searcheditem;
         $itemsSearched=Items::where('brand','like','%'.$value.'%')->get();
        $items=[];

    	if($request->ajax()){

         $value=$request->data;

          $itemsSearched=Items::where('brand','like','%'.$value.'%')->get();

            $page=$request->page;
            $page++;
           $number=count($items);
           if($number<3){

                for($i=0;$i<count($itemsSearched);$i++)
                {
                  $itemsSearched[$i]->photo=$itemsSearched[$i]->thumbnail->image_url;
                   $item1[]=$itemsSearched[$i];
                
                 }

            $items[]=$item1;
           }else {

                for($i=0;$i<count($itemsSearched);$i+=3){
         
                    $item1=[];

                    for($b=$i; $b<$i+3; $b++){

                      $itemsSearched[$b]->photo=$itemsSearched[$b]->thumbnail->image_url;
                       $item1[]=$itemsSearched[$b];
                    }

                $items[]=$item1;
            }
            }

            return [$page,$items[$page],$number];

            } else {


    	$value=$request->searcheditem;
        $categorys=Category::orderBy('sort_order','asc')->get();
        $id=0;
        $itemsSearched=Items::where('brand','like','%'.$value.'%')->paginate(20);
    	
    	 }

    	return view('search.index',compact('itemsSearched','value','categorys','id'));
    }



}
