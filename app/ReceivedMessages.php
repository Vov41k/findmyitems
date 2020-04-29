<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ReceivedMessages;
use App\User;
use Illuminate\Support\Facades\Auth;

class ReceivedMessages extends Model
{
    protected $fillable =[
    	'message',
    	'to_user_id',
    	'from_user_id',
    ];

    public function toUser()
    {
    	return $this->belongsTo('App\User','to_user_id');
    }
    public function fromUser()
    {
    	return $this->belongsTo('App\User','from_user_id');
    }
    public static function newMessages()
    {
        $count=ReceivedMessages::where(function($query){
        $query->whereNull('read_msg')->orWhere('read_msg','=','no');
       })->where('to_user_id','=',Auth::user()->id)->count();
       
        return $count;
    }
}
