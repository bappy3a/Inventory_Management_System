<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\CrmSupplier;
use Auth;

class productsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function create()
    {
    	return view('pages.products.productsadd');
    }

    public function store( Request $request)
    {
    	
    	$this->validate($request, [

            'name' => 'required',
            'description' => 'required',
            'unit' => 'required'

        ],

        [ 
            'name.required' => 'Please Enter a Product Name',
            'description.required' => 'Please Enter Product Description',
            'unit.required' => 'Please Enter a Unit',

        ]);


        $product = new Product();

        $product->name = $request->name;
        $product->description = $request->description;
        $product->unit = $request->unit;
        $product->user_id = Auth::id();
        $product->save();

        \Session::flash('success', 'Product Added successfully!!');
        return back();

       
    }


    public function show(){

    	$products = Product::orderBy('name', 'ASC')->get();
    	
    	return view('pages.products.productlist', compact('products'));
    }

    public function edit($id)
    {
    	$products = Product::find($id);
    	return view('pages.products.productsedit', compact('products'));
    	
    }

    public function delete($id)
    {
        $products = Product::find($id);
        $products->delete();

        \Session::flash('success', 'Product Deleted successfully!!');
        return back();
        
        
    }


    public function update( Request $request, $id)
    {
        
        $this->validate($request, [

            'name' => 'required',
            'description' => 'required',
            'buy_price' => 'required',
            'sell_price' => 'required',
            'quantity' => 'required',
            'unit' => 'required'

        ],

        [ 
            'name.required' => 'Please Enter a Product Name',
            'description.required' => 'Please Enter Product Description',
            'buy_price.required' => 'Please Enter products Buy Price',
            'sell_price.required' => 'Please Enter products Sell Price',
            'quantity.required' => 'Please Enter Quantity',
            'unit.required' => 'Please Enter a Unit',

        ]);


        $product =Product::find($id);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->buy_price = $request->buy_price;
        $product->sell_price = $request->sell_price;
        $product->quantity = $request->quantity;
        $product->unit = $request->unit;
        $product->user_id = 1;
        $product->save();

        \Session::flash('success', 'Product Updated successfully!!');
        return back();

    }




    public function production_entry(){

       $products = Product::orderBy('name', 'ASC')->get();
       $suppliers = CrmSupplier::orderBy('supplier_name', 'ASC')->get();
       
       return view('pages.products.production_entry', compact('products', 'suppliers'));
    }

    

    public function production_add(Request $request)
    {
        
        $product_id = $request->product_id;

        $product =Product::find($product_id);

        if (!empty($product)) {

        $product->buy_price = $request->buy_price;
        $product->sell_price = $request->sell_price;
        $product->quantity = $request->quantity;
        $product->supplier_id = $request->supplier_id;
        $product->user_id = 1;
        $product->save();
           
        }else{

            \Session::flash('error', 'Production Entry Faild!!');
            return back();
        }
        
       

        \Session::flash('success', 'Production Entry successfully!!');
        return back();
    }



    public function stock(){

      $stock_product = Product::orderBy('name', 'ASC')->get();
      return view('pages.products.stock', compact('stock_product'));
    }




       
}
