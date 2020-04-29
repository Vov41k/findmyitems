<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReplay extends Model
{
    
	protected $fillable =[
    	'comment_id',
    	'to_user_id',
    	'message',
    	'from_user_id',
    	'like_user_id',
    	'dislike_user_id',
    ];



public function user(){
	return $this->belongsTo('App\User','from_user_id');
}

public function userreplay(){
	return $this->belongsTo('App\User','to_user_id');
}

}
