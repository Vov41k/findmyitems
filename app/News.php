<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
     protected $fillable =[
    	'title',
    	'description_short',
    	'user_id',
    	'presentation_image_url',
    	'description',
    	'activate',
    ];
    public function newsimages(){
	return $this->hasMany('App\NewsImages','news_id');
}
	public function user(){
		return $this->belongsTo('App\User','user_id');
	}
    public function getImageAttribute($image)
    {
        return asset($image) ?? '';
    }
}

