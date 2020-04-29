<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Category;

class NewsController extends Controller
{
	public function index()
    {
		$news=News::all();
    	$categorys=Category::orderBy('sort_order','asc')->get();
    	$id='news';

    	return view('news.index',compact('news','categorys','id'));
	}

    public function show($id)
    {
    	$news=News::find($id);
    	$categorys=Category::orderBy('sort_order','asc')->get();
    	$id='news';

    	return view('news.show',compact('news','categorys','id'));
    }
}
