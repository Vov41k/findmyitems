<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Items;
use App\Category;

class CategoryController extends Controller
{
    public function index($id){
    	$categorys=Category::orderBy('sort_order','asc')->get();
    	$items=Items::where('category_id','=',$id)->paginate(20);
    	$filter=[];

    	foreach($items as $item){
    		$filter[$item->brand][$item->model_name]=$item->id;
    	}
    	
    	return view('category.index',compact('items','categorys','id','filter'));

    }
}
