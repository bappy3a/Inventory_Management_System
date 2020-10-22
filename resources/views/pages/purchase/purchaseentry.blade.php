@extends('layouts.master')

@section('content')

	
<div class="row " >
	
	<div class="col-md-2"></div>
	<div class="col-md-8" style="margin-top: 20px;">
		
	</div>
</div>

<div class="row">


<div class="col-md-5">

       	<div class="box box-info" style="margin-top:20px;">
          <div class="box-header with-border">
            <h3 class="box-title"><strong>PURCHASE ENTRY</strong></h3>
          </div>
          
          <div class="box-body">
          	@include('partials.error')
          	@include('partials.message')
            
				 <form class="form-horizontal" action="{{ route('crm.client.store') }}" method="post">

				 	@csrf
						    <div class="form-group">
						      <label class="control-label col-sm-4" for="company_name">Date</label>
						      <div class="col-sm-8">
						        <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Enter company name" 
						        >
						      </div>
						    </div>

						     <div class="form-group">
						      <label class="control-label col-sm-4" for="supplier_name">supplier Name</label>
						      <div class="col-sm-8">
						        <input type="text" class="form-control" name="supplier_name" id="supplier_name" placeholder="Enter supplier name" 
						        >
						      </div>
						    </div>

						     <div class="form-group">
						      <label class="control-label col-sm-4" for="quantity">Quantity</label>
						      <div class="col-sm-8">
						        <input type="text" class="form-control" name="quantity" id="quantity" placeholder="Enter quantity" 
						        >
						      </div>
						    </div>

						    <div class="form-group">
						      <label class="control-label col-sm-4" for="rate">Total</label>
						      <div class="col-sm-8">
						        <input type="text" class="form-control" name="total" id="total" placeholder="Enter total" 
						        >
						      </div>
						    </div>

						    <div class="form-group">
						      <label class="control-label col-sm-4" for="rate">Description</label>
						      <div class="col-sm-8">
						        <input type="text" class="form-control" name="description" id="description" placeholder="Enter description" 
						        >
						      </div>
						    </div>


						    <div class="form-group">        
						      <div class="col-sm-offset-4 col-sm-8">
						        <button type="submit" class="btn btn-info">Submit</button>
						        <a href="{{ route('products.list') }}" id="cancel" name="cancel" class="btn btn-danger">Cancel</a>
						        
						       
						      </div>
						    </div>
				  </form>
          </div>
        </div>


    
        </div>

        <div class="col-md-7">

      <div class="box box-info" style="margin-top:20px;">
          <div class="box-header with-border">
            <h3 class="box-title"><strong>RECENT PURCHASE HISTORY </strong></h3>
          </div>
          
        	
        	<table class="table table-bordered">
        		<thead>
        			<th>SL</th>
        			<th>V.NO</th>
        			<th>Supplier Name</th>
        			<th>Date</th>
        			<th>Item Name</th>
        			<th>Account</th>
        			<th>Action</th>
        		</thead>
        	</table>


        </div>

    </div>

</div>
	

@endsection