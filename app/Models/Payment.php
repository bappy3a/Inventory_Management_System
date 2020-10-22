<?php

namespace App\Models;
use App\Models\CrmClient;

use Illuminate\Database\Eloquent\Model;
use App\Models\Sale;

class Payment extends Model
{
	public function client(){
		return $this->belongsTo(CrmClient::class);	
	}


	public static function saleAmount($id)
	{
		$saleamount = Payment::where('client_id', $id)->sum('total');
		return $saleamount;
	}

	public static function collection($id)
	{
		$collection = Payment::where('client_id', $id)->sum('paid');
		return $collection;
	}

	public static function due($id)
	{
		$due = Payment::where('client_id', $id)->sum('due');
		return $due;
	}

	public static function totalinvoice()
	{
		$amount = Payment::get()->sum('total');

		return $amount;
	}


	public static function totalrecieveinvoice()
	{
		$amount = Payment::get()->sum('paid');

		return $amount;
	}

	public static function totaldueinvoice()
	{
		$amount = Payment::get()->sum('due');

		return $amount;
	}

	public static function totaltodayinvoice()
	{
		$amount = Payment::whereBetween('created_at', array(date("Y/m/d")." 00:00:00", date("Y/m/d")." 23:59:59"))->get()->sum('total');

		return $amount;
	}

	




}
