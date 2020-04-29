<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $fillable =[
    	'user_id',
    	'item_id',
    	'comment',
    	'like_user_id',
    	'dislike_user_id',
    ];
    
    public function user(){
    	return $this->belongsTo('App\User','user_id');
    }

    public function replays(){
        return $this->hasMany('App\CommentReplay','comment_id');
    }
    
}
