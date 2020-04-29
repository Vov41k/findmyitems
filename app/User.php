<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'verified',
        'token',
        'password',
        'role',
        'photo_url',
        'nickname',
        'blocked'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function recivedMessages(){
        return $this->hasMany('App\ReceivedMessages','to_user_id');
    }

    public function hasRole($role){

        return $this->role==$role;

    }
     // The function should delete user from cache
    public static function deleteCache($name){
        $expiresAt = Carbon::now()->addSeconds(200);
        $users = Cache::get('UsersOnline');
          if($users!=null){
            $searchkey="";
           foreach($users as $key=>$value){
            if($value->name==$name){
                // $searchkey=$key;
                 unset($users[$key]);
                  Cache::put('UsersOnline', $users,$expiresAt);
            }
           }
            // unset($users[$searchkey]);
           
          

          }
       return;
    }
}
