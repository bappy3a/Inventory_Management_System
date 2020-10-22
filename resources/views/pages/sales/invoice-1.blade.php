@extends('layouts.master')

@section('content')        

<section class="content" >
      <div class="row ">
        <div class="col-md-12"  >
          <div class="box box-info" style="padding-right: 50px; padding-left: 30px;">
            
          
		<section>
				<div class="row" >
						<div style="float: left; margin-bottom: 15px;">
							<img src="{{ asset('images/logo/logo.png')}}" width="20%">
						</div>

						<div style="float:left; ; margin-bottom: 15px;">
							<h3 style="color: red; float: ;">Demo Tech & Engineering Shop</h3>
							<p style="float:; ;"><span style="color: #3c8dbc;  font-weight: bold;">Head Office:</span> Multiplan Center, Shop No: #510, Road No: 19 Elephent Road, Dhaka 1210 </p>
					
							<p style="float:; ;" ><span style="color: #3c8dbc; font-weight: bold;">Service Center: </span> Multiplan Center, Shop No: #510, Road No: 19 Elephent Road, Dhaka 1210
							</p>
						
						</div>
						<div class="col-md-12">

							<p style=""><span style="color: #3c8dbc;  font-weight: bold;">Accounting Billing Software</span></p>
							<p style=""><span style="color: #3c8dbc;  font-weight: bold;">Phone No: </span> 01798659099</p>
							<p style=""><span style="color: #3c8dbc;  font-weight: bold;"></span> Dhaka</p>
						
						</div> 
				</div>
		</section>


		<hr>
		<section>
					<div  class="row" style="padding-left: 20px;">
						<div style="float:left ; margin-bottom: 15px;">
							<div><span><b> {{ $payment->client->company_name }} </b> </span></div>
							<div><span><b>{{ $payment->client->Proprietor_name }} </b> </span></div>
							<div>{{ $payment->client->phone_no1 }}</div>
						</div>

						<div style="float: right; margin-bottom: 15px; padding-right: 20px">
							<div><span><b>Invoice Id:</b> </span> {{ $payment->invoice_id }}</div>
							<div><span><b>Date:</b> </span> {{ $payment->created_at->format('d-m-Y') }}</div>
							<div><span><b>Served By: </b> </span> {{ App\Models\Sale::where('invoice_id', $payment->invoice_id)->first()->user_id }}</div>
						
						</div>
					</div>
		<section>

				<div class="row" style="padding-bottom: 40px;">
					<div class="col-md-12 table-responsive-sm" style="margin-bottom: 50px;">
					   <table class="table" style="border:2px solid #ddd;">
						<thead>
							<tr>
								<th class="center">SN</th>
								<th>Item</th>
								<th>Description</th>
								<th>Quantity</th>
								<th>Price</th>
								<th class="right">Discount(%)</th>
								<th class="right">Unit</th>
								<th class="right">Total</th>
							</tr>
						</thead>
					<tbody>
				@php 
					$Product_price = 0;
					$Product_price_after_dis = 0;
					$discount = 0;
				@endphp
				 @foreach($invoice as $invoice) 
					<tr>
						<td class="center"> {{ $loop->index +1 }}</td>
						<td class="left strong"> {{ $invoice->product->name }}</td>
						<td class="left">{{ $invoice->product->description}}</td>
						<td class="right">{{ $invoice->quantity}}</td>
						<td class="center">{{ $invoice->product->sell_price}}</td>

						@php 
								$Product_price +=  $invoice->product->sell_price * $invoice->quantity; 
						@endphp
						<td class="right">{{ $invoice->discount_price}}</td>
						@php 
								$discount +=  $invoice->discount_price; 
						@endphp
						<td class="right">{{ $invoice->product->unit }}</td>
						<td class="right">{{ $invoice->amount}}</td>
						@php	
							$Product_price_after_dis +=  $invoice->amount; 
						@endphp
						

					</tr>


				 @endforeach

					</tbody>
					<tfoot>
						<tr>
							<td style="border:none;"></td>
							<td style="border:none;"></td>
							<td style="border:none;"></td>
							<td style="border:none;"></td>
							<td style="border:none;"></td>
							<td style="border:none;"></td>
							<td  style="border:none;"></td>
							<td  style="border:none;"></td>					
						</tr>
						

						<tr>
							<td style="border:none;"></td>
							<td style="border:none;"></td>
							<td style="border:none;"></td>
							<td style="border:none;"></td>
							<td style="border:none;"></td>
							<td style="border:none;"></td>
						<td class="left">
							<strong>Subtotal</strong>
							</td>
							<td class="right" >{{ $payment->total }} Tk</td>

						</tr>

						<tr>
							<td style="border:none;"></td>
							<td style="border:none;"></td>
							<td style="border:none;"></td>
							<td style="border:none;"></td>
							<td style="border:none;"></td>
							<td style="border:none;"></td>
							<td class="left" style="border:none;">
							<strong>Discount ({{ $discount }}%)</strong>
							</td>
							<td class="right" style="border:none;">{{ $Product_price - $Product_price_after_dis }} Tk </td>
						</tr>

						<tr> 
							<td style="border:none;"></td>
							<td style="border:none;"></td>
							<td style="border:none;"></td>
							<td style="border:none;"></td>
							<td style="border:none;"></td>
							<td style="border:none;"></td>
							<td class="left" style="border:none;">
							<strong>Payment</strong>
							</td>
							<td class="right" style="border:none;">{{ $payment->paid }} Tk</td>
						</tr>

						<tr>
							<td style="border:none;"></td>
							<td style="border:none;"></td> 
							<td style="border:none;"></td>
							<td style="border:none;"></td>
							<td style="border:none;"></td>
							<td style="border:none;"></td>
							<td class="left" style="border:none;">
							<strong>Invoice Due</strong>
							</td>
							<td class="right" style="border:none;">{{ $payment->due }} Tk</td>
						</tr>

						<tr>
							<td style="border:none;"></td>
							<td style="border:none;"></td>
							<td style="border:none;"></td>
							<td style="border:none;" ></td>
							<td style="border:none;"></td>
							<td style="border:none;"></td>
							<td style="border:none;" class="left" >
							<strong>Previous Due</strong>
							</td>
							<td style="border:none;" class="right">{{ App\Models\Payment::where('client_id', $payment->client_id)->get()->sum('due') - $payment->due }} Tk</td>
						</tr>

						<tr>
							<td style="border:none;"></td>
							<td style="border:none;"></td>
							<td style="border:none;"></td>
							<td style="border:none;" ></td>
							<td style="border:none;"></td>
							<td style="border:none;"></td>
							<td style="border:none;" class="left" >
							<strong>Total Due</strong>
							</td>
							<td style="border:none;" class="right">{{ App\Models\Payment::where('client_id', $payment->client_id)->get()->sum('due') }} Tk</td>
						</tr>

					</tfoot>

					</table>

						<p style="text-align: center; color: #737477;">Please Make cheque Payable To Accounting Inventory Software</p>

						<hr>
									
						
					</div>
					
					<div class="col-md-3">d</div>
					<div class="col-md-2 " style="text-align: left;">Client Signature</div>
					<div class="col-md-2 " style="text-align: center;">Verify By</div>
					<div class="col-md-2 " style="text-align: right;">For Billing</div>

				</div>
		

			</div>
		</div>
	</div>

</section>

@endsection