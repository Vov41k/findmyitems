<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsImages extends Model
{
        protected $fillable =[
    	'user_id',
    	'news_id',
    	'image_url',
    	
    ];
}

