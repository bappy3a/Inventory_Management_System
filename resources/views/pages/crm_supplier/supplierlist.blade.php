@extends('layouts.master')

@section('content')        
        
     

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header with-border">
            <h3 class="box-title"><strong>Supplier List</strong></h3>
          </div>
            <div class="box-body">
            <a href="{{ route('crm.supplier.add') }}" class="btn btn-success" >Add New Supplier</a>
          </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="myTable" class="table table-bordered table-hover" >
                      <thead>
                        <tr>
                          <th style="width: 10%">SL</th>
                          <th style="width: 10%">UserId</th>
                          <th style="width: 30%">Description</th>
                          <th style="width: 20%">Account</th>
                          <th style="width: 10%">Details</th>
                          <th style="width: 10%">Action</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach($suppliers as $supplier)

                        <tr>
                          <td>
                           {{ $loop->index +1 }}
                          </td>

                           <td>
                          SC0{{ $supplier->id }}
                          </td>
                          
                          <td>
                          <strong>Company Name: </strong>{{ $supplier->supplier_name }} <br>
                          <strong>Email: </strong>{{ $supplier->email }}<br>
                          <strong>Phone No: </strong>{{ $supplier->phone_no1 }}<br>
                          </td>

                          <td>

                            <strong>Total Amount:  </strong><br>

                           <strong>Payment:  </strong>  <br>                     
                            <span class="badge badge-warning" style="background-color: #f44b42;"><strong>Due Amount</span> :</strong> <br>

                            

                          </td>


                          <td>
                          <a href="{{ route('crm.supplier.edit',$supplier->id) }}" class="btn btn-info"><i class="fas fa-info-circle"></i>  Details</a>
                          </td>

                          <td>
                            
                            <a href="#deleteModal{{ $supplier->id }}" class="btn btn-danger" data-toggle="modal" ><i class="fas fa-trash-alt"></i> Delete </a>


                            <!--Delete Modal -->

                              <div class="modal fade" id="deleteModal{{ $supplier->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel" style="color: red">Warrning!!</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                          Are You sure to Delete this Supplier? No backup option!!
                                          </div>
                                          <div class="modal-footer">
                                             <form action="{{ route('crm.supplier.delete', $supplier->id) }}" method="post">
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