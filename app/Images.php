<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $fillable=[
    	'item_id',
    	'url'
    
    ];


    public function items(){
    	return $this->belongsTo('App\Items','item_id');
    }
}
