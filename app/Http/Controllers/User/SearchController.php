<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Items;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
     public function search(Request $request){
    	
    	$value=$request->searcheditem;
    	$itemsAll=[];
    	$itemsBrand=Items::where('brand','like','%'.$value.'%')->where('user_id','=',Auth::user()->id)->get();
    	$itemsId=Items::where('id','=',$value)->where('user_id','=',Auth::user()->id)->get();
    	$itemsModel_name=Items::where('model_name','=',$value)->where('user_id','=',Auth::user()->id)->get();
    	$itemsAll[]=$itemsBrand;
    	$itemsAll[]=$itemsId;
    	$itemsAll[]=$itemsModel_name;

    	return view('user.search.index',compact('itemsAll','value'));
    }
}
