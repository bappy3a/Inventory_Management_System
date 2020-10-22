
@extends('layouts.master')

@section('content')   

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
           

		    <div id="container" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
		      <section id="memo">
		        <div class="logo">
		          <img data-logo="{company_logo}" />
		        </div>

		        
		        <div class="company-info">
		          <div>Demo Store</div>

		          <br />
		          
		          <span>227 Elephen Road, Road no #206, Dhaka</span>
		          <span>1210</span>

		          <br />
		          
		          <span>+8801798659099</span>
		          <span>- admin@demostore.coom</span>
		          <span>- demostore.com</span>
		        </div>

		      </section>

		      <section id="invoice-title-number">
		      
		        <span id="title">INVOICE</span>
		        <span id="number">#{{ strtoupper($payment->invoice_id) }}</span>
		        
		      </section>
		      
		      <div class="clearfix"></div>
		      
		      <section id="client-info">
		        <span>TO</span>
		        <div>
		          <span class="bold">{{ $payment->client->company_name }}</span>
		        </div>
		        
		        <div>
		          <span>{{ $payment->client->Proprietor_name }}</span>
		        </div>
  	        
		        <div>
		          <span>{{ $payment->client->phone_no1 }}</span>
		        </div>
		        
		        <div>
		          <span>{{ $payment->client->email }}</span>
		        </div>
		        
		      </section>
		      
		      <div class="clearfix"></div>
		      
		      <section id="items">
		        
		        <table cellpadding="0" cellspacing="0">
		        
		          <tr>
		            <th>S/N</th> 
		            <th>Item</th>
		            <th>Description</th>
					<th>Quantity</th>
					<th>Price</th>
		            <th>Discount(%)</th>
		            <th>Unit</th>
		            <th>Total</th>
		          </tr>

		         @php 
					$Product_price = 0;
					$Product_price_after_dis = 0;
					$discount = 0;
				@endphp
				 @foreach($invoice as $invoice) 
		          
		          <tr data-iterate="item">
		            	<td style="text-align: center;"> {{ $loop->index +1 }}</td>
						<td style="text-align: center;"> {{ $invoice->product->name }}</td>
						<td style="text-align: center;">{{ $invoice->product->description}}</td>
						<td style="text-align: center;">{{ $invoice->quantity}}</td>
						<td style="text-align: center;">{{ $invoice->product->sell_price}}</td>

						@php 
								$Product_price +=  $invoice->product->sell_price * $invoice->quantity; 
						@endphp
						<td style="text-align: center;">{{ $invoice->discount_price}}</td>
						@php 
								$discount +=  $invoice->discount_price; 
						@endphp
						<td style="text-align: center;">{{ $invoice->product->unit }}</td>
						<td style="text-align: center;">{{ $invoice->amount}}</td>
						@php	
							$Product_price_after_dis +=  $invoice->amount; 
						@endphp
		          </tr>


		          @endforeach
		          
		        </table>
		        
		      </section>
		      
		      <section id="sums">
		      
		        <table cellpadding="0" cellspacing="0">
		          <tr>
		            <th>Subtotal</th>
		            <td>{{ $payment->total }} Tk</td>
		          </tr>
		          
		          <tr data-iterate="tax">
		            <th>Discount ({{ $discount }}%) </th>
		            <td>{{ $Product_price - $Product_price_after_dis }} Tk</td>
		          </tr>

		          <tr data-iterate="tax">
		            <th>Payment</th>
		            <td>{{ $payment->due }} Tk</td>
		          </tr>

		          <tr data-iterate="tax">
		            <th>Invoice Due</th>
		            <td>{{ $payment->due }} Tk</td>
		          </tr>

		          <tr data-iterate="tax">
		            <th>Previous Due</th>
		            <td>{{ App\Models\Payment::where('client_id', $payment->client_id)->get()->sum('due') - $payment->due }} Tk</td>
		          </tr>
		          
		          
		          <tr class="amount-total">
		            <th>Total</th>
		            <td>{{ $payment->total }} Tk</td>
		          </tr>
		          <tr class="amount-total">
		            <th>AMOUNT DUE</th>
		            <td>{{ App\Models\Payment::where('client_id', $payment->client_id)->get()->sum('due') }} Tk</td>
		          </tr>

		          
		          
		        </table>

		        <div class="clearfix"></div>
		        
		      </section>
		      
		      <div class="clearfix"></div>

		      <section id="invoice-info">
		        <div>
		          <span>Issued on : </span> <span>{{ $payment->created_at->format('d-m-Y') }}</span>
		        </div>
		        <div>
		          <span>Due on :</span> <span>{{ $payment->created_at->format('d-m-Y') }}</span>
		        </div>

		        <div>
		          <span>Served By :</span> <span>{{ App\Models\Sale::where('invoice_id', $payment->invoice_id)->first()->user_id }}</span>
		        </div>

		        <br />

		        <div>
		          <span>Currency</span> <span>Taka</span>
		        </div>
		        
		        
		      </section>
		      
		      <section id="terms">

		        <div class="notes">Thank you very much. We really appreciate your business.
                    Please send payments before the due date.</div>

		        <br />

		      </section>

		      <div class="clearfix"></div>

		      <div class="thank-you">THANKS</div>

		      <div class="clearfix"></div>
		    </div>

		   </div>
		</div>
	</div>


@endsection