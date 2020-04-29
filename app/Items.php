<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comments;

class Items extends Model
{
    protected $fillable =[
    	'brand',
    	'model_name',
    	'category_id',
    	'title',
    	'description',
        'user_id',
        'city',
        'street_adress',
        'phone',
        'country',
        'email',

    ];

    public function images(){
    	return $this->hasMany('App\Images','item_id');
    }
    public function categorys(){
        return $this->belongsTo('App\Category','category_id');
    }
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
    public function comments(){
        return $this->hasMany('App\Comments','item_id');
    }
    public function thumbnail(){
        return $this->hasOne('App\ItemThumbnail','item_id','id');
    }
    public function commentscount($id){
        $countcomment=Comments::where('item_id','=',$id)->count();
        return $countcomment;
    }
}

