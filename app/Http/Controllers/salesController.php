<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CrmClient;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Payment;
use db;
use Auth;

class salesController extends Controller
{

  public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){

    	$client = CrmClient::orderBy('Proprietor_name', 'ASC')->get();
    	$products = Product::where('quantity', '!=' ,'0')->orderBy('name', 'ASC')->get();
    	return view('pages.sales.newinvoice', compact('client', 'products'));
    }

    public function store( Request $request){

    	 //$client = new CrmClient();

    	   $client = $request->client_id;
         
           if ($client != 0) {

        $invoice_id = uniqid(); //unique invoice id create


         //store payment/invoice details

                $payment = new Payment();
                $payment->client_id = $request->client_id;
                $payment->invoice_id = $invoice_id;
                $payment->payment_method = $request->payment_method;
                $payment->total = $request->total;
                $payment->paid = $request->payment;
                $payment->due = $request->due;
                $payment->save();
                $payment_id = Payment::where('invoice_id', $invoice_id)->first()->id;

     
            //store sale product
           		foreach ($request->product_id as $key => $value) { 
          			
           			$data = array(
                  'user_id' => Auth::id(),
                  'invoice_id' => $invoice_id ,
                  'payment_id' => $payment_id ,
                  'client_id' => $client,
           				'product_id' => $value,
           				'price' => $request->price[$key],
           				'quantity' => $request->quantity[$key],
           				'discount_price' => $request->discount[$key],
           				'amount' =>$request->amount[$key],
                  'created_at'=>now()
           			);
                
              // Total product decrease after sale product
                $stock_quantity = Product::find($value)->first()->quantity;
                if ($stock_quantity) {
                  $product = Product::find($value);
                  $product->quantity = ($stock_quantity - ($request->quantity[$key]));
                  $product->save();
                }
                

                Sale::insert($data);

           		}

           

               \Session::flash('success', 'New Invoice Created Successfully!!');
               return redirect()->route('sale.newinvoice');

           }else{

            \Session::flash('error', 'Something going Wrong!!');
               return redirect()->route('sale.newinvoice');

           }
    }




    public function invoice_list(){

      $invoice_list = Payment::orderBy('id', 'ASC')->get();

      return view('pages.sales.invoicelist', compact('invoice_list'));
    }


    public function invoice($id){
     
      $invoice = Sale::where('invoice_id', $id)->get();
      $payment = Payment::where('invoice_id', $id)->first();
      return view('pages.sales.invoice', compact('invoice', 'payment'));
    }

    public function delete($id)
    {
        $invoice = Payment::find($id);
        $invoice->delete();

        $sale_product = Sale::find($id);
        $sale_product->delete();

        \Session::flash('success', 'Product Deleted successfully!!');
        return back();
        
    }


    public function invoice_due(){

      $client = CrmClient::orderBy('id', 'ASC')->get();
      return view('pages.sales.due.invoice_due', compact('client'));
      
    }


    public function invoice_due_Customer_wise(){

      $invoice_list_show = 0;
      $client = CrmClient::orderBy('id', 'ASC')->get();
      return view('pages.sales.due.invoice_due_customer', compact('client', 'invoice_list_show'));
    }

     public function search_due_report(Request $request){

      $client_id = $request->client_id;

      $invoice_list_show = 1;
      $client_due = CrmClient::where('id', $client_id)->get();
      $client = CrmClient::orderBy('id', 'ASC')->get();
      return view('pages.sales.due.invoice_due_customer', compact('client', 'client_due', 'invoice_list_show') );
    }

/////
    public function daily_sale(){

      $sale_list = Sale::orderBy('id', 'ASC')->get();
      return view('pages.sales.sales_report.daily_sale', compact('sale_list'));
    }


    public function daily_sale_search(Request $request){

      $from_date = $request->from_date;
      $to_date = $request->to_date;

      if ( $from_date != '' AND $to_date != '') {
         $sale_list = Sale::whereBetween('created_at', array($from_date." 00:00:00", $to_date."  23:59:59"))->get();
         return view('pages.sales.sales_report.daily_sale', compact('sale_list') );
      }
      else{

       $sale_list = Payment::orderBy('id', 'ASC')->get();
        return view('pages.sales.sales_report.daily_sale', compact('sale_list'));
      }


    }

    public function daily_sale_customer(){

      $invoice_list_show = 0;    
       $client = CrmClient::orderBy('id', 'ASC')->get();
      return view('pages.sales.sales_report.daily_sale_customer', compact('invoice_list_show', 'client'));

 

    }


    public function daily_sale_customer_search(Request $request){

      
      //Serversite Validation...........

    $request->validate([
        'from_date' => 'required',
        'to_date' =>'required ',
        'client_id' =>'required ',
        
       ],
       [
        'from_date.required' => 'please Enter Start Date',
        'from_date.required' => 'please Enter End Date',
        'client_id.required' => 'please Enter Customer Name or phone No',
       ]
      );
      
      $from_date = $request->from_date;
      $to_date = $request->to_date;
      $client_id = $request->client_id;

      if ( $from_date != '' AND $to_date != '') {

      $invoice_list_show = 1;
      $client = CrmClient::orderBy('id', 'ASC')->get();
      $invoice_list = Payment::whereBetween('created_at', array($from_date." 00:00:00", $to_date."  23:59:59"))
                                ->where('client_id', $client_id)
                                ->get();
        return view('pages.sales.sales_report.daily_sale_customer', compact('invoice_list_show', 'invoice_list' , 'client'));

      }else{


      $invoice_list_show = 0;    
      $invoice_list = Payment::orderBy('id', 'ASC')->get();
       $client = CrmClient::orderBy('id', 'ASC')->get();
      return view('pages.sales.sales_report.daily_sale_customer', compact('invoice_list_show', 'client'));

      }

    }




    public function daily_sale_product(){

      $invoice_list_show = 0;    
      $product = Product::orderBy('id', 'ASC')->get();
      return view('pages.sales.sales_report.daily_sale_product', compact('invoice_list_show', 'product'));

    }


    public function daily_sale_product_search(Request $request){

  
      //Serversite Validation...........

    $request->validate([
        'from_date' => 'required',
        'to_date' =>'required ',
        'product_id' =>'required ',
        
       ],
       [
        'from_date.required' => 'please Enter Start Date',
        'from_date.required' => 'please Enter End Date',
        'product_id.required' => 'please Enter Customer Name or phone No',
       ]
      );
      
      $from_date = $request->from_date;
      $to_date = $request->to_date;
      $product_id = $request->product_id;

      if ( $from_date != '' AND $to_date != '' AND $product_id != '') {

      $invoice_list_show = 1;
      $product = Product::orderBy('id', 'ASC')->get();
      $product_list = Sale::whereBetween('created_at', array($from_date." 00:00:00", $to_date."  23:59:59"))
                                ->where('product_id', $product_id)
                                ->get();
        return view('pages.sales.sales_report.daily_sale_product', compact('invoice_list_show', 'product_list' , 'product'));

      }else{


      $invoice_list_show = 0;    
      $product = Product::orderBy('id', 'ASC')->get();
      return view('pages.sales.sales_report.daily_sale_product', compact('invoice_list_show', 'product'));

      }

    }







}


