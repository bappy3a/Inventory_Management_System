@extends('layouts.master')

@section('content')        
        
     

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info" style=" margin-top:20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="box-header with-border">
            <h3 class="box-title"><strong>Products List</strong></h3>
          </div>
            <div class="box-body">
            <a href="{{ route('products.add') }}" class="btn btn-success" >Add New Product</a>
          </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-hover" id="myTable">
                      <thead>
                        <tr>
                          <th>SL</th>
                          <th>Producr Name</th>
                          <th>Description</th>
                          <th>Buy Price</th>
                          <th>Sell Price</th>
                          <th>Quantity</th>
                          <th>Unit</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      @php 
                      $total_buy_price=0; 
                      $total_sell_price=0; 
                      $total_quantity=0; 
                      @endphp
                    <tbody>
                        @foreach($products as $product)

                        <tr>
                          <td>
                           {{ $loop->index +1 }}
                          </td>
                           <td>
                           {{ $product->name }}
                          </td>
                          
                          <td>
                           {{ $product->description }}
                          </td>
                          <td>
                             {{ $product->buy_price }}
                          </td>
                          @php 
                                 $total_buy_price += $product->buy_price;
                          @endphp
                          <td>
                          {{ $product->sell_price }}
                          </td>
                          @php 
                                 $total_sell_price += $product->sell_price;
                          @endphp
                          <td>
                           {{ $product->quantity }}
                          </td>
                          @php 
                                 $total_quantity += $product->quantity;
                          @endphp
                          <td>
                           {{ $product->unit }}
                          </td>
                          <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                            <a href="#deleteModal{{ $product->id }}" class="btn btn-danger" data-toggle="modal" ><i class="fas fa-trash-alt"></i> Delete </a>
                            <!--Delete Modal -->

                              <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Warrning!!</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                          Are You sure to Delete this product? No backup option!!
                                          </div>
                                          <div class="modal-footer">
                                             <form action="{{ route('products.delete', $product->id) }}" method="post">
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
                      <tbody>
                        
                        <tr>
                        <td colspan="3" ><strong style="float: right;">Total</strong></td>
                        <td> {{ $total_buy_price }} </td>
                        <td> {{ $total_sell_price }} </td>
                        <td> {{ $total_quantity }} </td>
                        
                      </tr>
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
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
@endsection