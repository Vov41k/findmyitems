<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()) {
            $expiresAt = Carbon::now()->addSeconds(300);
            $oneuser=Auth::user();

            // Cache::put('User', $oneuser,$expiresAt);
            // $one=Cache::get('User');
            $users = Cache::get('UsersOnline');
               if($users==null){
                   $users=[];
               }

                if (!in_array($oneuser, $users)) {
                        $users[]= $oneuser;
                    }
            

           
            Cache::put('UsersOnline', $users,$expiresAt);
            // Cache::store('file')->put . Auth::user()->name, true, $expiresAt);
            
       
        }
            $UsersOnlineActivity = Cache::get('UsersOnline');
               
        if( Auth::user()->hasRole('admin')){
             return view('admindashboard',compact('UsersOnlineActivity'));
        }if(Auth::user()->hasRole('user')){
            return view('userdashboard',compact('UsersOnlineActivity'));
        } else {
             return redirect('/');
        }
        
    }
}
