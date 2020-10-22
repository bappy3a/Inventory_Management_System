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

		<div class="box box-info" style="margin-top:20px;">
			<div class="box-header with-border">
				<h3 class="box-title"><strong>Update Products</strong></h3>
			</div>
			<div class="box-body">
				<a href="{{ route('products.list') }}" class="btn btn-success">View Products</a>
			</div>
			<div class="box-body">
				@include('partials.error')
				@include('partials.message')
				
				<form class="form-horizontal" action="{{ route('products.update', $products->id) }}" method="post">

					@csrf
					<div class="form-group">
						<label class="control-label col-sm-4" for="name">Product Name:</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="name" id="name" placeholder="Enter Product Name"  value="{{ $products->name }}" 
							>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4" for="description">Product Description:</label>
						<div class="col-sm-8">          
							<input type="text" class="form-control" id="description" placeholder="Enter product Description" name="description" value="{{ $products->description }}">
						</div>
					</div>


					<div class="form-group">
						<label class="control-label col-sm-4" for="buy_price">Product Buy Price:</label>
						<div class="col-sm-8">          
							<input type="text" class="form-control" id="buy_price" placeholder="Enter product Buy Price" name="buy_price" value="{{ $products->buy_price }}">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-4" for="sell_price">Product Sell Price:</label>
						<div class="col-sm-8">          
							<input type="text" class="form-control" id="sell_price" placeholder="Enter product Sell Price" name="sell_price" value="{{ $products->sell_price }}">
						</div>
					</div>

					

					<div class="form-group">
						<label class="control-label col-sm-4" for="unit">Product Unit:</label>
						<div class="col-sm-8">          
							<input type="text" class="form-control" id="unit" placeholder="Enter Product Unit" name="unit" value="{{ $products->unit }}">
						</div>
					</div>
					
					
					<div class="form-group">        
						<div class="col-sm-offset-4 col-sm-8">
							<button type="submit" class="btn btn-info">Update</button>
							
							<a href="{{ route('products.list') }}" id="cancel" name="cancel" class="btn btn-danger">Cancel</a>
						</div>
					</div>
				</form>
			</div>
		</div>


		
	</div>

</div>


@endsection