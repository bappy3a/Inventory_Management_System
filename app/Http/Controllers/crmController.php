<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CrmClient;
use App\Models\CrmSupplier;
use App\Models\Payment;
use Auth;

class crmController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    
   public function client_create()
    {
    	return view('pages.crm_client.clientadd');
    }

    public function client_store( Request $request)
    {
    	$this->validate($request, [

            'Proprietor_name' => 'required',
            'phone_no1' => 'required',
            
        ],

        [ 
            'Proprietor_name.required' => 'Please Enter Proprietor Name',
            'phone_no1.required' => 'Please Enter a phone No',
        ]);


        $client = new CrmClient();

        $client->company_name = $request->company_name;
        $client->Proprietor_name = $request->Proprietor_name;
        $client->phone_no1 = $request->phone_no1;
        $client->phone_no2 = $request->phone_no2;
        $client->email = $request->email;
        $client->address = $request->address;
        $client->city = $request->city;
        $client->postal_code = $request->postal_code;
        $client->country = $request->country;
        $client->user_id = Auth::id();
        $client->save();

        \Session::flash('success', 'A New Client Added Successfully!!');
        return back();  
    }


    public function client_show(){

    	$clients =  CrmClient::orderBy('Proprietor_name', 'ASC')->get();

    	return view('pages.crm_client.clientlist', compact('clients'));
    }

    public function client_edit($id)
    {
    	$clients = CrmClient::find($id);
    	return view('pages.crm_client.clientsedit', compact('clients'));
    	
    }

    public function client_delete($id)
    {
        $clients = CrmClient::find($id);
        $clients->delete();

        \Session::flash('success', 'Client Deleted Successfully!!');
        return back();

        
    }

    public function client_update( Request $request, $id)
    {
    	$this->validate($request, [

            'Proprietor_name' => 'required',
            'phone_no1' => 'required',
            
        ],

        [ 
            'Proprietor_name.required' => 'Please Enter Proprietor Name',
            'phone_no1.required' => 'Please Enter a phone No',
        ]);


        $client = CrmClient::find($id);

        $client->company_name = $request->company_name;
        $client->Proprietor_name = $request->Proprietor_name;
        $client->phone_no1 = $request->phone_no1;
        $client->phone_no2 = $request->phone_no2;
        $client->email = $request->email;
        $client->address = $request->address;
        $client->city = $request->city;
        $client->postal_code = $request->postal_code;
        $client->country = $request->country;
        $client->user_id = 1;
        $client->save();

        \Session::flash('success', 'Client Details Updated Successfully!!');
        return back();  
    }


    public function supplier_create()
    {
        return view('pages.crm_supplier.supplieradd');
    }


     public function supplier_store( Request $request)
    {
        $this->validate($request, [

            'supplier_name' => 'required',
            'phone_no1' => 'required',
            
        ],

        [ 
            'supplier_name.required' => 'Please Enter Proprietor Name',
            'phone_no1.required' => 'Please Enter a phone No',
        ]);


        $supplier = new CrmSupplier();

        $supplier->supplier_name = $request->supplier_name;
        $supplier->phone_no1 = $request->phone_no1;
        $supplier->phone_no2 = $request->phone_no2;
        $supplier->email = $request->email;
        $supplier->address = $request->address;
        $supplier->city = $request->city;
        $supplier->postal_code = $request->postal_code;
        $supplier->country = $request->country;
        $supplier->user_id = Auth::id();
        $supplier->save();

        \Session::flash('success', 'A New Supplier Added Successfully!!');
        return back();  
    }

     public function supplier_show(){

        $suppliers =  CrmSupplier::latest('supplier_name')->get();

        return view('pages.crm_supplier.supplierlist', compact('suppliers'));
    }


    public function supplier_edit($id)
    {
        $suppliers = CrmSupplier::find($id);
        return view('pages.crm_supplier.supplieredit', compact('suppliers'));
        
    }

     public function supplier_update( Request $request, $id)
    {
        $this->validate($request, [

            'supplier_name' => 'required',
            'phone_no1' => 'required',
            
        ],

        [ 
            'supplier_name.required' => 'Please Enter Proprietor Name',
            'phone_no1.required' => 'Please Enter a phone No',
        ]);


        $supplier = CrmSupplier::find($id);

        $supplier->supplier_name = $request->supplier_name;
        $supplier->phone_no1 = $request->phone_no1;
        $supplier->phone_no2 = $request->phone_no2;
        $supplier->email = $request->email;
        $supplier->address = $request->address;
        $supplier->city = $request->city;
        $supplier->postal_code = $request->postal_code;
        $supplier->country = $request->country;
        $supplier->user_id = Auth::id();
        $supplier->save();

        \Session::flash('success', 'A New Supplier Updated Successfully!!');
        return back();  
    }

    public function supplier_delete($id)
    {
        $supplier = CrmSupplier::find($id);
        $supplier->delete();

        \Session::flash('success', 'supplier Deleted Successfully!!');
        return back();

        
    }







}
