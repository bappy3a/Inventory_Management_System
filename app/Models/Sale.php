<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CrmClient;
use App\Models\Payment;
use App\Models\Product;

class Sale extends Model
{
   public function client()
    {
    	return $this->belongsTo(CrmClient::class);
    } 

    public function product()
    {
    	return $this->belongsTo(Product::class);
    } 

    public static function totaltodaysale()
	{
		$amount = Sale::whereBetween('created_at', array(date("Y/m/d")." 00:00:00", date("Y/m/d")." 23:59:59"))->get()->count('id');

		return $amount;
	}



}
