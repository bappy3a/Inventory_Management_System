<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Payment;

class CrmClient extends Model
{

    public static function client_due($id){

    	$client_due = Payment::where('client_id', $id)->get()->sum('due');
    	return $client_due;
    }

    public static function client_Payment($id){

    	$client_Payment = Payment::where('client_id', $id)->get()->sum('paid');
    	return $client_Payment;
    }

    public static function client_total($id){

    	$client_total = Payment::where('client_id', $id)->get()->sum('total');
    	return $client_total;
    }


    public static function totalclient()
    {
        $client = CrmClient::get()->count('id');

        return $client;
    }
}
