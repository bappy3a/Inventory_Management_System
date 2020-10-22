@extends('layouts.master')

@section('content')        



<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title"><strong>User List</strong></h3>
        </div>
        <div class="box-body ">

          <a href="" class="btn btn-primary">Add New User</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body ">
          <table id="" class="table table-bordered table-hover" >
            <thead>
              <tr>
                <th style="width: 5%">SL</th>
                <th style="width: 10%">User Name</th>
                <th style="width: 8%">phone</th>
                <th style="width: 10%">Email</th>
                <th style="width: 6%">Status</th>
                <th style="width: 8%">Access status</th>
                <th style="width: 20%">Action</th>
              </tr>
            </thead>

            <tbody>
              @foreach($user_lists as $user_list)
              <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{ $user_list->name }}</td>
                <td>{{ $user_list->phone_no }}</td>
                <td>{{ $user_list->email }}</td>
                <td>
                  
                      @if($user_list->isOnline())
                        <span class="online"></span> Online
                      @else
                       <span class="offline"></span>  Offline
                      @endif


                </td>
                <td>

                  @if($user_list->status == 0)
                  <span class="badge badge-danger">Super Admin</span>
                  @elseif($user_list->status == 1)
                  Admin
                  @else
                  General
                  @endif
                </td>
                <td>
                  <a href="" class="btn btn-primary btn-sm">Update Profile</a>
                  <a href="{{ route('permission', $user_list->id) }}" class=" btn bg-olive btn-sm">Permission</a>
                  <a href="" class="btn btn-danger btn-sm">Delete</a>
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

@section('styles')

<style>
  table tr td{
    text-align: center;
  }

  .online {
  height: 10px;
  width: 10px;
  background-color: green;
  border-radius: 50%;
  display: inline-block;
}

.offline {
  height: 10px;
  width: 10px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
}


</style>

@endsection