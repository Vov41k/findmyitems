<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ConfirmRegisterController extends Controller
{
    public function confirm($token)
    {
    	
    	$user=User::where('token','=', $token)->first();
    	if($user==null){
    		return redirect()->route('home');
    	}else {
    	$user->token=null;
    	$user->verified=true;
    	$user->save();
    	return redirect('login');
    	}
    }
}
