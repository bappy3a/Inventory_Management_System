@extends('layouts.master')

@section('content')
	
<div class="row " >
	
	<div class="col-md-2"></div>
	<div class="col-md-8" style="margin-top: 20px;">
		
	</div>
</div>

<div class="row">

<div class="col-md-2"></div>

      <div class="col-md-8">

       	<div class="box box-info" style="margin-top:20px;">
          <div class="box-header with-border">
            <h3 class="box-title"><strong>Add New Client</strong></h3>
          </div>
          <div class="box-body">
            <a href="{{ route('crm.client.list') }}" class="btn btn-success">View Client</a>
          </div>
          <div class="box-body">
          	@include('partials.error')
          	@include('partials.message')
            
				 <form class="form-horizontal" action="{{ route('crm.client.store') }}" method="post">

				 	@csrf
						    <div class="form-group">
						      <label class="control-label col-sm-4" for="company_name">Company Name</label>
						      <div class="col-sm-8">
						        <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Enter company name" 
						        >
						      </div>
						    </div>

						     <div class="form-group">
						      <label class="control-label col-sm-4" for="Proprietor_name">Proprietor Name*</label>
						      <div class="col-sm-8">
						        <input type="text" class="form-control" name="Proprietor_name" id="Proprietor_name" placeholder="Enter Proprietor name" 
						        >
						      </div>
						    </div>

						    <div class="form-group">
						      <label class="control-label col-sm-4" for="phone_no1">Phone No 1*  </label>
						      <div class="col-sm-8">
						        <input type="number" class="form-control" name="phone_no1" id="phone_no1" placeholder="Enter Phone No" 
						        >
						      </div>
						    </div>

						    <div class="form-group">
						      <label class="control-label col-sm-4" for="phone_no2">Phone No 2  </label>
						      <div class="col-sm-8">
						        <input type="number" class="form-control" name="phone_no2" id="phone_no2" placeholder="Enter Phone No" 
						        >
						      </div>
						    </div>

						     <div class="form-group">
						      <label class="control-label col-sm-4" for="email">Email</label>
						      <div class="col-sm-8">          
						        <input type="text" class="form-control" id="email" placeholder="Enter product email" name="email">
						      </div>
						    </div>

						    <div class="form-group">
						      <label class="control-label col-sm-4" for="address">Address</label>
						      <div class="col-sm-8">          
						        <input type="text" class="form-control" id="address" placeholder="Enter product address" name="address">
						      </div>
						    </div>

						     <div class="form-group">
						      <label class="control-label col-sm-4" for="city">City</label>
						      <div class="col-sm-8">          
						        <input type="text" class="form-control" id="city" placeholder="Enter product city" name="city">
						      </div>
						    </div>
						    
						    <div class="form-group">
						      <label class="control-label col-sm-4" for="postal_code">Zip/Postal Code</label>
						      <div class="col-sm-8">          
						        <input type="text" class="form-control" id="postal_code" placeholder="Enter Product postal_code" name="postal_code">
						      </div>
						    </div>

						     <div class="form-group">
						      <label class="control-label col-sm-4" for="postal_code">Country</label>
						      <div class="col-sm-8">          
						        <select class="form-control" name="country">
						        	<option value="Bangladesh">Bangladesh</option>
						        </select>
						      </div>
						    </div>
						    
						   
						    <div class="form-group">        
						      <div class="col-sm-offset-4 col-sm-8">
						        <button type="submit" class="btn btn-info">Add Client</button>
						        <a href="{{ route('products.list') }}" id="cancel" name="cancel" class="btn btn-danger">Cancel</a>
						        
						       
						      </div>
						    </div>
				  </form>
          </div>
        </div>


    
        </div>

</div>
	

@endsection