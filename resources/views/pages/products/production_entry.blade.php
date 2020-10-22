@extends('layouts.master')

@section('content')

	
<div class="row " >
	
	<div class="col-md-3"></div>
	<div class="col-md-6" style="margin-top: 20px;">
		
	</div>
</div>

<div class="row">

	<div class="col-md-1"></div>
      <div class="col-md-10">

       	<div class="box box-info"style=" margin-top:20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
          <div class="box-header with-border">
            <h3 class="box-title"><strong>Purchases Product</strong></h3>
          </div>

          @include('partials.error')
          @include('partials.message')

      <div class="row">
      			
      	<div class="col-md-1"></div>
      	<div class="col-md-9">
      				
      	<div class="box-body">
          	
            
	<form class="form-horizontal" action="{{ route('products.production.add')}}" method="post">

				 	@csrf

						<div class="box-header with-border" style="margin-bottom: 40px;">
					            <label class="control-label col-sm-2 "  for="name"> <strong>Product Name</strong></label>
					            <div class="col-sm-4">
					            <select class=" form-control select2_product" name="product_id"  >
					            	<option>Select product</option>
					            	@foreach($products as $product)
					            	<option   value="{{ $product->id }}">{{ $product->name }}</option>
					            	@endforeach
					            </select>
					        	</div>

					        	 <label class="control-label col-sm-2" for="supplier_name"> <strong>Supplier Name</strong></label>
					            <div class="col-sm-4">
					            <select class=" form-control select2_supplier"  name="supplier_id" required >
					            	<option>Select Supplier</option>
					            	@foreach($suppliers as $suppliers)
					            	<option   value="{{ $suppliers->id }}">{{ $suppliers->supplier_name }}</option>
					            	@endforeach

					            </select>
					        	</div>
			   	 		</div>

						   
						    <div class="form-group">
						      <label class="control-label col-sm-4" for="quantity">Purchases Quantity:</label>
						      <div class="col-sm-8">          
						        <input type="text" class="form-control" id="quantity" placeholder="Enter product Description" name="quantity"  >
						      </div>
						    </div>
						 
				       <div class="form-group">
						      <label class="control-label col-sm-4" for="buy_price">Buy Price:</label>
						      <div class="col-sm-8">          
						        <input type="text" class="form-control" id="buy_price" placeholder="Enter product Buy Price" name="buy_price" >
						      </div>
						    </div>

						     <div class="form-group">
						      <label class="control-label col-sm-4" for="sell_price">Sell Price:</label>
						      <div class="col-sm-8">          
						        <input type="text" class="form-control" id="sell_price" placeholder="Enter product Sell Price" name="sell_price">
						      </div>
						    </div>
						  				   
						    <div class="form-group">        
						      <div class="col-sm-offset-4 col-sm-8">
						        <button type="submit" class="btn btn-info">Purches</button>
						  
						        <a href="{{ route('products.list') }}" id="cancel" name="cancel" class="btn btn-danger">Cancel</a>
						      </div>
						    </div>
				 </form>
          			</div>
      			</div>
      		</div>
        </div>


    
        </div>

</div>
	

@endsection


