@extends('layouts.master')

@section('content')

	


<div class="content">
      <div class="row">
        <div class="col-xs-12">
       	<div class="box box-info" style="margin-top:20px;">
          <div class="box-header with-border">
            <h3 class="box-title"><strong>Create New Invoice</strong></h3>
          </div>

          @include('partials.error')
          @include('partials.message')
  
          
      <div class="row">
      			
      	<div class="col-md-1"></div>
      	<div class="col-md-9">
      				
 <div class="box-body">
          	
            
	<form class="form-horizontal" action="" method="post">

				 	@csrf
		<div class="row">
			<div class="box-body ">
				<table class="table table-bordered table-hover" >
					<tbody>
						<tr>
							<td> <strong>Search Client</strong></td>
							<td> 
								
								<div class="col-md-5">
								<select class="select2 form-control" name="client_id" id="client_id"  >
						            	<option value="0"> No Client is Selected</option>
						            	@foreach($client as $client)
						            	<option   value="{{ $client->id }}">{{ $client->phone_no1 }}</option>
						            	@endforeach
						            </select><br>
						          or  <a style="margin-top: 10px;" href="{{ route('crm.client.add') }}"> add new client</a> 
						         </div> 
							</td>
						</tr>

						<tr>
							<td><b>Client Information:</b> </td>
							<td>
								
				   	 				<div id="client_info">
				   	 					<div id="client_name"></div>
				   	 					<div id="client_phone"></div>
				   	 					<div id="client_address"></div>

				   	 				</div>
				   	 			
							</td>
						</tr>
					</tbody>
				</table> 

				</div>		
			</div>		

		<div class="row">
			<div class="box-body ">
              <table class=" table table-bordered table-hover">
                      <thead style="background-color: #d7f4e3;">
                        <tr>
                          <th>Product Item</th>
                          <th>Description</th>
                          <th>Stock</th>
                          <th>Price</th>
                          <th>Quantity</th>
                          <th>Unit</th>
                          <th>Total</th>
                          <th></th>

                        </tr>
                      </thead>
                      
                     <tbody>
                     	<tr>
	                     	<td>
	                     		
	                     			<select class="select2 form-control" name="product_id" id="product_id"  >
						            	<option >No Product Selected</option>
						            	@foreach($products as $product)
							            <option   value="{{ $product->id }}">{{ $product->name }}</option>
							            	@endforeach
						            	
	                     		</div>
	                     		           		
	                     	</td>
	                     	<td id="description"></td>
	                     	<td id="stock"></td>
	                     	<td id="price"></td>
	                     	<td><input min="1"  type="number" name="quantity" id="quantity"></td>
	                     	
	                     	<td id="unit"></td>
	                     	<td id="total"></td>
	                     	
                       </tr>

                    
                     </tbody>                                
              </table>
            </div>
		</div>

		<div class="row">
			<div class="col-md-9">
				<table class="table " >
                        <tr style="float: left;">
	                        <td><b>Discount</b></td>               
	                        <td><input id="discount" min="0"  type="number" name="discount"></td>
                      </tr> 
                </table>
			</div>
			<div class="col-md-3">
	
		       <table class="table " >
                        <tr style="float: right;">
	                        <td ><h4><b>Total :</b></h4>
	                       
	                        <td><h4><b  id="total_price" ></b> </h4>
                      </tr> 
                </table>
                    
			</div>
		</div>

		<div class="row">
			<div class="box-body">

				<button type="submit" class="btn btn-success">Create Invoice</button>
				<a href="{{ route('products.list') }}" id="cancel" name="cancel" class="btn btn-danger">Cancel</a>
			</div>
		</div>


</div>


						   
				
				 </form>
          			</div>
      			</div>
      		</div>
        </div>

    </div>
    
 </div>

</div>
</div>
	
@endsection

@section('scripts')


<script>
	// Create Invoice search Client start

	$("#client_id").change(function(){

		var client_id = $("#client_id").val();
		if (client_id != 0) {
			//send an ajax request to server with this division
	
		$.get( "http://127.0.0.1:8000/get-client/"+client_id, function( data ) {

			data = JSON.parse(data)
			//console.log(data);

			data.forEach(function(element){

                    client_name = "<b>"+"Client Name: "+"</b>"+element.Proprietor_name;
                    client_phone = "<b>"+"Phone No: "+"</b>"+element.phone_no1;
                    client_address = "<b>"+"Address: "+"</b>"+element.address;
               });
			$("#client_name").html(client_name);
			$("#client_phone").html(client_phone);
			$("#client_address").html(client_address);
			
		});
	}else{

		$("#client_info").html("");
	}
});

	//END

// Product Item add

$("#product_id").change(function(){

		var product_id = $("#product_id").val();
		//alert(product_id)
		if (product_id != 0) {
			//send an ajax request to server with this division
	
		$.get( "http://127.0.0.1:8000/get-product/"+product_id, function( data ) {

			data = JSON.parse(data)
			console.log(data);

			data.forEach(function(element){

                     description =element.description;
                     stock =element.quantity;
                     price =element.sell_price;
                     unit =element.unit;
                     
                     
            });

					$("#description").html(description);
					$("#stock").html(stock);
					$("#price").html(price);
					$("#quantity").val("1");
					$("#unit").html(unit);
					$("#total").html(price);
					$("#total_price").html(price);

					
			
		});
	}else{

		$("#client_info").html("");
	}
});

//multi Quantity and price
	

	$("#quantity").change(function(){


		var total = 0;
		price = $("#price").text();
		quantity = $("#quantity").val();
		discount = $("#discount").val();
		total = price * quantity;
		total_price = price * quantity - discount;
		$("#total").html(total);
		$("#total_price").html(total_price);
		
	});

	//discount

	$("#discount").change(function(){
		var total = 0;
		total = $("#total").text();
		discount = $("#discount").val();
		total =total - discount;
		$("#total_price").html(total);
		
		
		
	});
		
	
	
</script>

@endsection


