<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ContactUsRequest;
use App\Mail\ContactUsEmail;
use Mail;

class ContactUsController extends Controller
{
    public function send(ContactUsRequest $request)
    {
    	if (Auth::check()){
    		$user=Auth::user();
    	} else {
    		$user="";
    	}
    	
    	Mail::send(new ContactUsEmail($request,$user));
    	return back();
    	
    }
}
