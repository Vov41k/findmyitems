<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class UsersController extends Controller
{
      public function getnames(Request $request)
      {
      	$value=$request->value;
      	if($value==null){
      		return;
      	}
        $users=User::where('nickname','like',$value.'%')->pluck('nickname');
       	if($users->isEmpty()){
       		return ['error'=>'No Users Found'];
       	}
        return $users;
    }
}
