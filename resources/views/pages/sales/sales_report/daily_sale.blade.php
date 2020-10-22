@extends('layouts.master')

@section('content')        
        
   

<section class="content">
      <div class="row" style="" >
        <div class="col-xs-12">
          <div class="box box-info" style=" margin-top:20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding: 10px;">
            <div class="box-header with-border">
            <h3 class="box-title"><strong>Daily Sale Report</strong></h3>
          </div>

         
             <div class="box-body">
                <div class="row">
                  <div class="col-md-12" style="text-align: center"> 
                    Accounting Billing Inventory Softwere <br>
                    <span style="font-size: 25px;">Daily Sale Reports</span>
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
            <!-- /.box-header -->
      <div class="box-body" style="margin-bottom: 100px;">
  
    <form method="get" action="{{ route('sale.daily_sale.search') }}">
              <div class="row">
                  <div class="col-md-4">
                    <div class="form-group"> <!-- Date input -->
                      <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" />
                    </div>
                  </div>

                  <div class="col-md-4">
                    
                    <div class="form-group"> <!-- Date input -->
                      
                      <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" />
                    </div>
                  </div>
                  <div class="col-md-2"> 

                    <div class="form-group"> <!-- Submit button -->
                     <input type="submit" name="filter" id="filter" value="Filter" class="btn btn-primary" />
                    </div>
                </div>
              </div>

        </form>


         

            <div class="box-body" id="order_table">
              <table border="1" width="100%">
                      <thead>
                        <tr>
                          <th style="width: 5%">SL</th>
                          <th style="width: 10%">Invoice ID</th>
                          <th style="width: 10%">Date</th>
                          <th style="width: 12%">Customer Name</th>
                          <th style="width: 12%">Item</th>
                          <th style="width: 6%">Quantity</th>
                          <th style="width: 8%">Rate</th>
                          <th style="width: 5%">Discount</th>
                          <th style="width: 8%">Total Bill</th>
                          <th style="width: 8%">Payment</th>
                          <th style="width: 8%">due</th>
                          <th style="width: 8%">Profit</th>
                        </tr>
                      </thead>

                      <tbody>
                       
            @foreach($sale_list as $invoice)               
                        <tr>
                            <td style="text-align: center;"> {{ $loop->index +1 }}</td>

                           <td style="text-align: center;"> {{ $invoice->invoice_id }} </td>

                           <td style="text-align: center;"> {{ $invoice->created_at->toDatestring() }} </td>

                           <td style="text-align: center;"> {{ $invoice->client->Proprietor_name }} </td>

                          <td style="text-align: center;" > 
                            @foreach(App\Models\Sale::where('invoice_id', $invoice->invoice_id)->get() as $product_in)

                            <span>{{ $product_in->product->name }}</span> <br><br>
                            
                            @endforeach
                          

                            </td>
                          
                          <td style="text-align: center;" > 
                            @foreach(App\Models\Sale::where('invoice_id', $invoice->invoice_id)->get() as $product_in)

                            <span> {{ $product_in->quantity }}</span> <br><br>
                            
                            @endforeach
                          

                            </td>

                           
                          <td style="text-align: center;" > 
                            @php 
                            $total_sell=0;
                            $total_buy_price=0;
                            @endphp
                            @foreach(App\Models\Sale::where('invoice_id', $invoice->invoice_id)->get() as $product_in)

                            <span>{{ $product_in->product->sell_price }}</span> <br><br>

                            @php
                            $total_sell += $product_in->product->sell_price;
                            $total_buy_price += $product_in->product->buy_price; 
                            @endphp
                            @endforeach
                          

                            </td>

                            <td style="text-align: center;"> {{ App\Models\Sale::where('invoice_id', $invoice->invoice_id)->get()->sum('discount_price')  }}% </td>


                           <td style="text-align: center;"> {{ App\Models\Payment::where('invoice_id', $invoice->invoice_id)->get()->sum('total')  }}</td>

                            <td style="text-align: center;"> {{ App\Models\Payment::where('invoice_id', $invoice->invoice_id)->get()->sum('due')  }}</td>


                            <td style="text-align: center;"> {{ App\Models\Payment::where('invoice_id', $invoice->invoice_id)->get()->sum('paid')  }}</td>

                            <td style="text-align: center;"> {{  $total_sell - $total_buy_price }} </td>

                          

                        </tr>
                  @endforeach

                      </tbody>
                </table>
           </div>
         </div>
      <div>
</section>

@endsection