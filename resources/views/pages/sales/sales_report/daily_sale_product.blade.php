@extends('layouts.master')

@section('content')        
        
   

<section class="content">
      <div class="row" style="" >
        <div class="col-xs-12">
          <div class="box box-info" style=" margin-top:20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding: 10px;">
            <div class="box-header with-border">
            <h3 class="box-title"><strong>Sale Reports</strong></h3>
          </div>

         
             <div class="box-body">
                <div class="row">
                  <div class="col-md-12" style="text-align: center"> 
                    Accounting Billing Inventory Softwere <br>
                    <span style="font-size: 25px;">product Wise Sale Reports</span>
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
  @include('partials.error')
  
    <form method="get" action="{{ route('sale.daily_sale.product.search') }}" >
              
              <div class="row " >
                <div class="col-md-4">
                  <select class="select2_product form-control" name="product_id" id="product_id"  >
                          <option > </option>
                          @foreach($product as $product)
                          <option   value="{{ $product->id }}">{{ $product->name }} </option>
                          @endforeach
                        </select>
                </div>
                
              </div>

              <div class="row " style="margin-top: 10px;">
                  <div class="col-md-4">
                    <div class="form-group"> <!-- Date input -->
                      <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date"  />
                    </div>
                  </div>

                  <div class="col-md-4">
                    
                    <div class="form-group"> <!-- Date input -->
                      
                      <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date"  />
                    </div>
                  </div>
                  
              </div>

              <div class="row">
                
                  <div class="col-md-2"> 
                    <div class="form-group"> <!-- Submit button -->
                     <input type="submit" name="filter" id="filter" value="Filter" class="btn btn-primary" />
                    </div>
                </div>

              </div>

        </form>


          @if( $invoice_list_show != 0)

          <div class="box-body" id="order_table">
              <table border="1" width="100%" >
                      <thead>
                        <tr>
                          <th style="width: 5%">SL</th>
                          <th style="width: 11%">Invoice ID</th>
                          <th style="width: 10%">Date</th>
                          <th style="width: 14%">Item</th>
                          <th style="width: 8%">Quentity</th>
                          <th style="width: 9%">Buy Price</th>
                          <th style="width: 10%">Sales Price</th>
                          <th style="width: 10%">Total Buy Price</th>
                          <th style="width: 10%">Total Sale Price</th>
                          <th style="width: 8%">Profit</th>
                        </tr>
                      </thead>

                      <tbody>
                       
            @foreach($product_list as $product_list)               
                        <tr>
                          <td style="text-align: center;"> {{ $loop->index +1 }}</td>

                          <td style="text-align: center;"> {{ $product_list->invoice_id }} </td>

                           <td style="text-align: center;"> {{ $product_list->created_at->toDatestring() }} </td>

                           <td style="text-align: center;"> {{ $product_list->product->name }} </td>

                           <td style="text-align: center;"> {{ $product_list->quantity }} </td>
                          
                          <td style="text-align: center;"> {{ $product_list->product->buy_price }}</td>

                           <td style="text-align: center;"> {{ $product_list->product->sell_price }} </td>

                           <td style="text-align: center;"> {{ $product_list->product->buy_price * $product_list->quantity }} </td>
                           <td style="text-align: center;"> {{ $product_list->product->sell_price * $product_list->quantity}} </td>

                           <td style="text-align: center;"> {{ ($product_list->product->sell_price * $product_list->quantity) - ($product_list->product->buy_price * $product_list->quantity) }} </td>
                        </tr>
                  @endforeach

                      </tbody>
                </table>
           </div>

           @endif

            
         </div>
      <div>
</section>

@endsection