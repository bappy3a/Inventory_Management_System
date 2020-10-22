@extends('layouts.master')

@section('content')        
        
     

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info" style=" margin-top:20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="box-header with-border">
            <h3 class="box-title"><strong>All Invoice List</strong></h3>
          </div>
            <div class="box-body">
            <a href="" class="btn btn-success" >Add New Invoice</a>
          </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="myTable" class="table table-bordered table-hover table-striped table-condensed" >
                      <thead>
                        <tr>
                          <th style="width: 5%">SL</th>
                          <th style="width: 10%">Invoice ID</th>
                          <th style="width: 10%">Date</th>
                          <th>Comapany Name</th>
                          <th style="width: 8%">Total</th>
                          <th style="width: 9%">Discount</th>
                          <th style="width: 10%">payment</th>
                          <th style="width: 7%">Due</th>
                          <th style="width: 8%">Status</th>
                          <th>More Option</th>
                        </tr>
                      </thead>

                      <tbody>
                       
            @foreach($invoice_list as $invoice)               
                        <tr>
                            <td style="text-align: center;"> {{ $loop->index +1 }}</td>

                           <td style="text-align: center;"> {{ $invoice->invoice_id }} </td>

                           <td style="text-align: center;"> {{ $invoice->created_at->toDatestring() }} </td>

                           <td style="text-align: center;"> {{ $invoice->client->Proprietor_name }} </td>

                           <td style="text-align: center;"> {{ $invoice->total }} </td>
                          
                          <td style="text-align: center;">
                           {{ App\Models\Sale::where('invoice_id', $invoice->invoice_id)->get()->sum('discount_price') }}
                          </td>

                           <td style="text-align: center;"> {{ $invoice->paid }} </td>

                           <td style="text-align: center;">  {{ $invoice->due }}</td>

                          <td>

  
                            @if ( $invoice->due  != 0)
                            <span style="background-color: #ffc107;" class="badge badge-warning">partial paid</span>
                            @else
                             <span style="background-color: #28a745;" class="badge badge-success">Paid</span>
                            @endif
                            
                          </td>


                          <td style="text-align: center;">
                            <a href="{{ route('invoice', $invoice->invoice_id) }}" class="btn btn-info btn-sm">Invoice</a>
                            <a href="#deleteModal{{ $invoice->invoice_id }}" class="btn btn-danger btn-sm" data-toggle="modal" >Delete</a>


                             <!--Delete Modal -->

                              <div class="modal fade" id="deleteModal{{ $invoice->invoice_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Warrning!!</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                          Are You sure to Delete this invoice? No backup option!!
                                          </div>
                                          <div class="modal-footer">
                                             <form action="{{ route('invoice.delete', $invoice->id) }}" method="post">
                                            {{ csrf_field() }}
                                           <button type="submit" class="btn btn-danger">Yes</button>
                                           <button class="btn btn-secondary" data-dismiss="modal">No</button>
                                          </form>
                                            
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                          </td>

                         
                        </tr>

                  @endforeach
                       
                 
                      </tbody>
                    </table>
                  </div>
                </div>
   </div>
 </div>
</section>

@endsection

@section('scripts')
<script>

</script>
@endsection