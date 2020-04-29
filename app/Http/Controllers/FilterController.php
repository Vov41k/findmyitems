<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Items;
use App\Category;

class FilterController extends Controller
{
    public function filter($id,$value)
    {
    	$categorys=Category::orderBy('sort_order','asc')->get();
    	$items=Items::where('model_name','=',$value)->paginate(20);
    	$itemsCategory=Items::where('category_id','=',$id)->get();
    	$filter=[];

    	foreach($itemsCategory as $item){
    		$filter[$item->brand][$item->model_name]=$item->id;
    	}
    	
    	return view('filter.index',compact('categorys','items','id','filter'));
    }
}
