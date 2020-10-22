<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

	public $fillable= [

		'name',
		'description',
		'buy_price',
		'sell_price',
		'quantity',
		'unit',
		'user_id',
		 
	];

    public static function totalProduct()
    {
    	$Products = Product::sum('quantity');
    	return $Products;
    }


    
}
