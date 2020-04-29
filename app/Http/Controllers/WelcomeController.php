<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Items;
use App\News;

class WelcomeController extends Controller
{
    public function index()
    {
    	$categorys=Category::orderBy('sort_order','asc')->get();
    	$items=Items::paginate(20);
    	$id='home';
    	$lastadditems=Items::orderBy('created_at','desc')->get()->take(3);
    	$news=News::orderBy('created_at','desc')->get()->take(4);

    	return view('welcome',compact('categorys','items','id','news','lastadditems'));

    }
}
