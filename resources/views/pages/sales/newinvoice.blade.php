@extends('layouts.master')

@section('content')

	


<div class="content" >
      <div class="row">
        <div class="col-xs-12">
       	<div class="box box-info" style=" margin-top:20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
          <div class="box-header with-border">
            <h3 class="box-title"><strong>Create New Invoice</strong></h3>
          </div>

          @include('partials.error')
          @include('partials.message')
  
          
      <div class="row">
      			
      	
      	<div class="col-md-12">
      				
 			<div class="box-body">

 				@include('partials.error')
         		@include('partials.message')

          	
            
				<form class="form-horizontal" action="{{ route('sale.newinvoice.store')}}" method="post">

					@csrf

					<div class="row">
						<div class="box-body">
						<div class="col-md-2">
							<strong>Search Customer</strong>
						</div>
						<div class="col-md-3">
							<div >
								<select class="select2 form-control" name="client_id" id="client_id"  >
						            	<option > </option>
						            	@foreach($client as $client)
						            	<option   value="{{ $client->id }}">{{ $client->phone_no1 }}</option>
						            	@endforeach
						            </select><br>
						          or  <br><a style="margin-top: 10px;" href="{{ route('crm.client.add') }}"> add new customer</a> 
						         </div> 
						</div>

						<div class="col-md-4" >
							<b id="title-customer"></b>
							<div id="client_info">
							   	 <div id="client_name"></div>
							   	 <div id="client_phone"></div>
							   	 <div id="client_address"></div>

							</div>
						</div>

						<div class="col-md-3 ">
							<div class="clock">
								<div id="Date"></div>
								<ul>
								<li id="hours"></li>
								<li id="point">:</li>
								<li id="min"></li>
								<li id="point">:</li>
								<li id="sec"></li>
								</ul>
							</div>
						</div>
				</div>
			</div>		

		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10">
			<div class="box-body table-responsive">
              <table class=" table table-bordered table-hover" >
                      <thead style="background-color: ">
                        <tr>
                          <th width="30%">Product Item</th>                 
                          <th width="10%">Stock</th>
                          <th width="10%">Price</th>
                          <th width="10%">Quantity</th>
                          <th width="10%">Discount( % )</th>
                          <th width="10%">Total</th>
                          <th width="5%" id="addrow" style="text-align: center; "><a  class="btn btn-success btn-sm"><i class="fas fa-plus"></i></a></th>

                        </tr>
                      </thead>
                      
                     <tbody>
                     	<tr >
	                     	<td>
	                     			<select class="form-control" name="product_id[]" id="product_id"  >
						            	<option value="0" selected="true" disabled="true" >Select Product</option>
						            	@foreach($products as $product)
							            <option   value="{{ $product->id }}">{{ $product->name }}</option>
							            	@endforeach
							         </select>
        		
	                     	</td>
	                     	<td><input style=" cursor: default; background-color: white; " class="form-control" type="number" name="stock" id="stock" readonly="true"></td>
	                     	<td><input class="form-control" min="0"  type="text" name="price[]" id="price"></td>
	                     	<td><input class="form-control" min="1"  type="text" name="quantity[]" id="quantity"></td>
	                     	<td><input class="form-control" min="0"  type="text" name="discount[]" id="discount"></td>
	    					<td><input class="form-control" style=" cursor: default; background-color: white; " min="0"  type="number" name="amount[]" id="amount" readonly="true"></td>	                  
	                     	<td style="text-align: center;"><a  class="btn btn-danger btn-sm" id="remove"> <i class="fas fa-times"></i> </a> </td>	                     
                        </tr>



                    
                     </tbody> 
                     
                     <tfoot>

                     	<tr>
                     		<td style="border:none;"></td>               
                     		<td style="border:none;"></td>               
                     		<td style="border:none;"></td>               
                     		<td style="border:none;"></td>               
                     		<td style="border:none;"><h4><b>Total</b></h4></td>
                     		<td><input class="form-control" style=" cursor: default; background-color: white; " min="0"  type="text" name="total" id="total" readonly="true"></td>
                     		<td></td>
                     	</tr>

                     	<tr>
                     		             
                     		<td style="border:none;" class=""><label class="form-control" ><strong>Payment Type</strong></label>
                     				<select class="form-control" name="payment_method" id="payment_method"  >
						            	<option selected="true" disabled="true" >Select Payment Method</option>
						            	<option value="cash" >Cash</option>
						            	
							         </select>
                     		</td>                                
                     	</tr>

                     	<tr>
                     		             
                     		<td style="border:none;" class="bg-success"><label class="form-control" ><strong>Payment</strong></label><input class="form-control" min="0"  type="text" name="payment" id="payment"></td>

                     		<td style="border:none;" class="bg-warning"><label  class="form-control"><strong>Due</strong></label><input style="background-color: white; cursor: default;" class="form-control"  type="text" name="due" id="due" readonly="true"></td>               
                     	</tr>

                     
                     </tfoot>                               
              </table>

              <div class="box-body mt-4" >
              <button type="submit" id="test" class="btn btn-success">Create Invoice</button>
				<a href="{{ route('products.list') }}" id="cancel" name="cancel" class="btn btn-danger">Cancel</a>
				</div>
            </div>
          </div>
          <div class="col-md-1"></div>
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
	/*...................Create Invoice search Client (without page refresh).............................*/
 
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
			
			$("#title-customer").html("Customer Information:");
			$("#client_name").html(client_name);
			$("#client_phone").html(client_phone);
			$("#client_address").html(client_address);
			
		});
	}else{

		$("#client_info").html("");
	}
});



/*...................Product Price and stock get (without page refresh).............................*/
 
	$('tbody').delegate('#product_id', 'change', function(){


		var tr = $(this).parent().parent();
		var product_id = tr.find('#product_id').val();

	//send an ajax request to server 
	
		$.get( "http://127.0.0.1:8000/get-product/"+product_id, function( data ) {

			data = JSON.parse(data)
			console.log(data);

			data.forEach(function(element){
         
                     stock =element.quantity;
                     price =element.sell_price;
            });
            	tr.find('#stock').val(stock);
            	tr.find('#price').val(price);
			
		});
	
});

/*.....................Focus Price field...............................*/

$('tbody').delegate('#product_id', 'change', function(){
	var tr = $(this).parent().parent();
	tr.find('#quantity').focus();
});


//total single

$('tbody').delegate('#price, #quantity, #discount', 'keyup', function(){
	var tr = $(this).parent().parent();
	var price = tr.find('#price').val();
	var quantity = tr.find('#quantity').val();
	var discount = tr.find('#discount').val();
	var amount = (price * quantity) - (price * quantity * discount)/100;
	tr.find('#amount').val(amount);
	total();
});


/*................................add row.................................*/ 

$('#addrow').on('click',function(){
	addrow(); 
});

/*............................remove row...................................*/

$('body').delegate('#remove','click', function(){

	var l= $('tbody tr').length;

	if (l == 1) {
		alert('you can not remove Last Row');
	}else{

		$(this).parent().parent().remove();
		total();

	}
	
});

/*.............................Payment and due calculate...............................*/



	$('body').delegate('#payment', 'keyup', function(){
		var due = 0;
		var total = $('#total').val();
		var payment = $('#payment').val();
		due = total- payment;
		$('#due').val(due);
	});


/*.............................User Create function...............................*/

//Total amount function
function total(){

	var total = 0;
	$('#amount', 'tr').each(function(){
		var amount = $(this).val()-0;
		total +=amount;
	});

	$('#total').val(total);
}

/*...................................Add Row function..................................*/

function addrow(){
	var tr = '<tr>'+
	                '<td>'+
	                '<select class="form-control" name="product_id[]" id="product_id"  >'+
					'<option value="0" selected="true" disabled="true" >No Product Selected</option>'+
					'@foreach($products as $product)'+
					'<option   value="{{ $product->id }}">{{ $product->name }}</option>'+
					'@endforeach'+
					'</select>'+
	                '</td>'+
	                '<td><input style=" cursor: default; background-color: white;  " class="form-control" type="number" name="stock" id="stock" readonly="true"></td>'+
	                '<td><input class="form-control" min="0"  type="text" name="price[]"   id="price"></td>'+
	                '<td><input class="form-control" min="1"  type="text" name="quantity[]" id="quantity"></td>'+
	                '<td><input class="form-control" min="0"  type="text" name="discount[]" id="discount"></td>'+
	                '<td><input class="form-control" style=" cursor: default; background-color: white; " min="0"  type="number" name="amount[]" id="amount" readonly="true"></td>'+
	                '<td style="text-align: center;"><a href="#" id="remove" class="btn btn-danger btn-sm remove"> <i class="fas fa-times"></i> </a> </td>'+                 
               '</tr>';

        $('tbody').append(tr);
};


 

</script>

@endsection


