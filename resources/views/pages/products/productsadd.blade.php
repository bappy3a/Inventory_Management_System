@extends('layouts.master')

@section('content')

	
<div class="row " >
	
	<div class="col-md-3"></div>
	<div class="col-md-6" style="margin-top: 20px;">
		
	</div>
</div>

<div class="row">

<div class="col-md-3"></div>

      <div class="col-md-6">

       	<div class="box box-info" style=" margin-top:20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
          <div class="box-header with-border">
            <h3 class="box-title"><strong>New Products</strong></h3>
          </div>
          <div class="box-body">
            <a href="{{ route('products.list') }}" class="btn btn-success">View Product</a>
          </div>
          <div class="box-body">
          	@include('partials.error')
          	@include('partials.message')
            
				 <form class="form-horizontal" action="{{ route('products.store') }}" method="post">

				 	@csrf
						    <div class="form-group">
						      <label class="control-label col-sm-4" for="name">Product Name:</label>
						      <div class="col-sm-8">
						        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Product Name" 
						        >
						      </div>
						    </div>
						    <div class="form-group">
						      <label class="control-label col-sm-4" for="description">Product Description:</label>
						      <div class="col-sm-8">          
						        <input type="text" class="form-control" id="description" placeholder="Enter product Description" name="description">
						      </div>
						    </div>
						    
						    <div class="form-group">
						      <label class="control-label col-sm-4" for="unit">Product Unit:</label>
						      <div class="col-sm-8">          
						        <input type="text" class="form-control" id="unit" placeholder="Enter Product Unit" name="unit">
						      </div>
						    </div>
						    <br>
						   
						    <div class="form-group">        
						      <div class="col-sm-offset-4 col-sm-8">
						        <button type="submit" class="btn btn-info">Add Product</button>
						         <button type="submit" class="btn btn-warning">Reset</button>
						        <a href="{{ route('products.list') }}" id="cancel" name="cancel" class="btn btn-danger">Cancel</a>
						        
						       
						      </div>
						    </div>
				  </form>
          </div>
        </div>


    
        </div>

</div>
	

@endsection