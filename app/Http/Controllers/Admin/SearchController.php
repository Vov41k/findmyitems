<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\items;

class SearchController extends Controller
{
    public function search(Request $request){
    	
    	$value=$request->searcheditem;
    	$itemsAll=[];
    	$itemsBrand=Items::where('brand','like','%'.$value.'%')->get();
    	$itemsId=Items::where('id','=',$value)->get();
    	$itemsModel_name=Items::where('model_name','=',$value)->get();
    	$itemsAll[]=$itemsBrand;
    	$itemsAll[]=$itemsId;
    	$itemsAll[]=$itemsModel_name;
    	
    	return view('admin.search.index',compact('itemsAll','value'));
    }
}
