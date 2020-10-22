@extends('layouts.master')

@section('content')        
        
   

<section class="content">
      <div class="row" >
        <div class="col-xs-12">
          <div class="box box-info" style=" margin-top:20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding: 10px;">
            <div class="box-header with-border">
            <h3 class="box-title"><strong>Customer Wise Due Report</strong></h3>
          </div>


          <div class="box-body">
                <div class="row">
                  <div class="col-md-12" style="text-align: center"> 
                    Accounting Billing Inventory Softwere <br>
                    <span style="font-size: 25px;">Customer Wise Due Reports</span>
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

            <form action="{{ route('sale.invoice.due.customer.search') }}" method="get">
              <div class="row" style="margin-bottom: 50px;">

            <div class="col-md-12" >
                  
                  
            <div class="col-md-5">
             
                <select class="select2 form-control" name="client_id" id="client_id"  >
                          <option > </option>
                          @foreach($client as $client)
                          <option   value="{{ $client->id }}">{{ $client->phone_no1 }} ({{ $client->Proprietor_name }})</option>
                          @endforeach
                        </select>

            </div>

            <div class="col-md-2"> 
              <input type="submit" value="Filter" class="btn btn-primary">
            </div>
                </div>
              </div>

              </form>

         

          @if ($invoice_list_show != 0)

              <table border="1" width="100%" style="margin-bottom: 100px;" >
                      <thead>
                        <tr>
                          <th>SL</th>
                          <th>Name</th>
                          <th>Cell Number</th>
                          <th>Sales Amounnt</th>
                          <th>Collection</th>
                          <th style="background-color:#f49d41; color: white;">Due Amount</th>
                        </tr>
                      </thead>
                    
                    <tbody>
                       
                     @foreach($client_due as $client_due)
                        <tr>
                          
                         
                           <td  style="text-align: center;">
                           {{ $loop->index+1 }}
                          </td>
                          
                          <td style="text-align: center;">
                           {{ $client_due->Proprietor_name }}
                          </td>

                            <td style="text-align: center;">
                            {{ $client_due->phone_no1 }}
                            </td>
                           
                            <td style="text-align: center;">

                               {{ App\Models\Payment::saleAmount($client_due->id) }}
                            </td>


                            <td style="text-align: center;">
                                {{ App\Models\Payment::collection($client_due->id) }} 
                             </td>

                              <td style="text-align: center;">
                                {{ App\Models\Payment::due($client_due->id) }} 
                             </td>

                           
                        </tr>
                       @endforeach
                 
                      </tbody>
 
                    </table>

                  @endif

                  </div>

                   
                  </div>

                </div>
   </div>
 </div>
</section>
          

@endsection

