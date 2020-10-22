@extends('layouts.master')

@section('content')        
        
   

<section class="content">
      <div class="row" >
        <div class="col-xs-12">
          <div class="box box-info" style=" margin-top:20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding: 10px;">
            <div class="box-header with-border">
            <h3 class="box-title"><strong>Stock Report</strong></h3>
          </div>

          <div class="box-body">
                <div class="row">
                  <div class="col-md-12" style="text-align: center"> 
                    Accounting Billing Inventory Softwere <br>
                    <span style="font-size: 25px;">(Stock Report)</span>
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
            <div class="box-body">
              <div class="">
              <table border="1" width="100%">
                      <thead>
                        <tr>
                          <th style="width: 5%">SL</th>
                          <th style="width: 12%">Item Name</th>
                          <th style="width: 5%">Unit</th>
                          <th style="width: 7%">Purchese</th>
                          <th style="width: 7%">Seles</th>
                          <th style="width: 7%">Stock</th>
                          <th style="width: 10%">Buy Price</th>
                          <th style="width: 15%">Buy Stk Price</th>
                          <th style="width: 15%">Sell Price</th>
                          <th style="width: 15%">Sell Stk Price</th>
                        </tr>
                      </thead>
                      @php 
                      $total_stock_buy_price=0; 
                      $total_stock_sell_price=0; 
                      @endphp
                    <tbody>
                        @foreach($stock_product as $product)

                        <tr>
                          <td style="text-align: center;">
                           {{ $loop->index +1 }}
                          </td>
                           <td >
                           {{ $product->name }}
                          </td>
                          
                          <td style="text-align: center;">
                           {{ $product->unit }}
                          </td>
                            <td style="text-align: center;">
                             {{ App\Models\Sale::where('product_id', $product->id)->get()->count() + $product->quantity }}
                          </td>
                           
                  
                            <td style="text-align: center;">

                              {{ App\Models\Sale::where('product_id', $product->id)->get()->count() }}
                          
                          </td>


                            <td style="text-align: center;">
                          {{ $product->quantity }}
                          </td>

                          <td style="text-align: center;">
                           {{ $product->buy_price }}
                          </td>

                          <td style="text-align: center;">
                          {{ $product->quantity  * $product->buy_price  }}
                          </td>
                           @php
                             $total_stock_buy_price += $product->quantity  * $product->buy_price ;
                           @endphp

                          <td style="text-align: center;">
                           {{ $product->sell_price}}
                          </td>

                           @php
                             $total_stock_sell_price += $product->sell_price  * $product->quantity;
                           @endphp
                  

                           <td style="text-align: center;">
                          {{ $product->quantity * $product->sell_price }}
                          </td>
                          
                           
                        </tr>
                       
                      @endforeach
                      </tbody>

                      <tfoot>
                        <td colspan="7" style="text-align: right;"><strong>Total</strong></td>
                        <td style="text-align: center;"><strong>
                          {{ $total_stock_buy_price }}
                        </strong></td>
                        <td></td>
                        <td style="text-align: center;"><strong>{{ $total_stock_sell_price }}</strong></td>

                      </tfoot>
                     
                    </table>

                  </div>

                    <a onclick="window.print()" class="btn btn-info"><i class="fas fa-print"></i>Print</a>
                   <!-- <form> 
                      <input type="button" value="Print" onclick="window.print()" /> 
                 </form>  -->
                  </div>

                </div>
   </div>
 </div>
</section>
          

@endsection

@section('scripts')
<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
@endsection