<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrmSupplier extends Model
{


	public $fillable= [

		'supplier_name',
		'phone_no1',
		'phone_no2',
		'email',
		'address',
		'city',
		'postal_code',
		'country',
		'user_id',
		 
	];


	public static function totalsupplier()
    {
        $supplier = CrmSupplier::get()->count('id');

        return $supplier;
    }


	
    
}
