<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table ='products';
	
	public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function cart()
    {
        return $this->belongsTo('App\Cart');
    }

    public function category()
    {
        return $this->belongsToMany('App\Category')->withTimestamps();
    }

    public function ratings()
    {
        return $this->hasMany('App\Rating');
    }

}
