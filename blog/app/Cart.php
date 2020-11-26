<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Cart extends Model
{
    protected $table ='carts';

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

     public function product()
    {
        return $this->belongsTo('App\Product');
    }


    public function totalItems()
    {
    	
    		$carts = Cart::where('user_id', Auth::id())
                      ->get();
    	

    	$total_items = 0;


    	foreach ($carts as $cart) {
    		$total_items += $cart->product_quantity;
    	}

    	return $total_items;
    	
    }
}
