<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Items;
use App\Comments;

class ItemController extends Controller
{
    public function index($id)
    {
    	$item=Items::find($id);
    	$id=$item->category_id;
    	$categorys=Category::orderBy('sort_order','asc')->get();
    	$comments=Comments::where('item_id','=',$item->id)->orderBy('created_at','desc')->paginate(3);

    	return view('item.index',compact('item','id','categorys','comments'));
    }
}
