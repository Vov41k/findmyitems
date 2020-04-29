<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    protected function attemptLogin(Request $request)
{
   
    return $this->guard()->attempt(
        $this->credentials($request), $request->filled('remember')
    );
}

protected function credentials(Request $request)
{
     $array= array_add($request->only($this->username(), 'password'), 'verified', true);
     return array_add($array,'blocked',false);
} 
        //function rewrited for cheking deleting cache;
        //blocked user
        //C:\OSPanel\domains\findmyitems.com\vendor\laravel\framework\src\Illuminate\Auth\Middleware\Authenticate.php:
 public function logout(Request $request)
    {
        Auth::user()->deleteCache(Auth::user()->name);
        Auth::guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('/');
    }

}
