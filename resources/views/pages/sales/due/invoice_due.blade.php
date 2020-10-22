@extends('layouts.master')

@section('content')        
        
   

<section class="content">
      <div class="row" >
        <div class="col-xs-12">
          <div class="box box-info" style=" margin-top:20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding: 10px;">
            <div class="box-header with-border">
            <h3 class="box-title"><strong>Due Report</strong></h3>
          </div>

          <div class="box-body">
                <div class="row">
                  <div class="col-md-12" style="text-align: center"> 
                    Accounting Billing Inventory Softwere <br>
                    <span style="font-size: 25px;">(All Due Reports)</span>
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
                          <th>SL</th>
                          <th>Name</th>
                          <th>Cell Number</th>
                          <th>Sales Amounnt</th>
                          <th>Collection</th>
                          <th style="background-color:#f49d41; color: white;">Due Amount</th>
                        </tr>
                      </thead>
                    
                    <tbody>
                       
                      @foreach($client as $client)
                        <tr>
                          <td style="text-align: center;">
                          {{ $loop->index +1 }}
                          </td>

                           <td >
                          {{ $client->Proprietor_name }}
                          </td>
                          
                          <td style="text-align: center;">
                           {{ $client->phone_no1 }}
                          </td>

                            <td style="text-align: center;">
                              {{ App\Models\Payment::saleAmount($client->id) }}
                            </td>
                           
                            <td style="text-align: center;">

                                {{ App\Models\Payment::collection($client->id) }}
                            </td>


                            <td style="text-align: center;">
                                 {{ App\Models\Payment::due($client->id) }}
                             </td>

                           
                        </tr>
                       
                  @endforeach
                      </tbody>

                      <tfoot>
                        <td colspan="3" style="text-align: right;"><strong>Total</strong></td>
                        <td style="text-align: center;"><strong>
                          {{ App\Models\Payment::get()->sum('total') }}
                        </strong></td>
                        
                        <td style="text-align: center;"><strong>
                          
                          {{ App\Models\Payment::get()->sum('paid') }}
                        </strong>
                        </td>

                         <td style="text-align: center;"><strong>
                          
                          {{ App\Models\Payment::get()->sum('due') }}
                        </strong></td>

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

