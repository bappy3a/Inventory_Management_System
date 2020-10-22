@extends('layouts.master')

@section('content')        



<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title"><strong>User List</strong></h3>
        </div>
        <div class="box-body">
         <a href="" class="btn btn-success" >Add Permission Page</a>
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
              <th style="width: 10%">Address</th>
              <th style="width: 8%">Access status</th>
              <th style="width: 20%">Action</th>
            </tr>
          </thead>

          <tbody>
            @foreach($user_list as $user_list)
            <tr>
              <td>{{ $loop->index+1 }}</td>
              <td>{{ $user_list->name }}</td>
              <td>{{ $user_list->phone_no }}</td>
              <td>{{ $user_list->email }}</td>
              <td>{{ $user_list->Address }}</td>
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

      <div class="box-body ">

        <form action="{{ route('permission.update', $user->id) }}" method="post">
          @csrf

          <table id="" class="table table-bordered table-hover" >
            <thead>
              <tr>
                
                <th style="width: 10%">User Name</th>
                
                <th style="width: 8%">Status</th>
                <th style="width: 8%">Action</th>
                
              </tr>
            </thead>

            <tbody>
             
              <tr>
                
                <td>{{ $user->name }}</td>
                <td>
                  <select name="status">
                    <option value="0"

                    <?php if ($user->status == 0): ?>
                     <?php echo 'selected'; ?>
                   <?php endif ?>

                   >Super Admin</option>
                   <option value="1"

                   <?php if ($user->status == 1): ?>
                     <?php echo 'selected'; ?>
                   <?php endif ?>

                   >Admin</option>
                   <option value="2">User Admin</option>
                 </select>

               </td>
               
               <td>
                
                <button type="submit"  class="btn btn-primary btn-sm" >Update Purmission</button>
                
              </td>
            </tr>
            
          </tbody>

        </table>

      </form>
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
</style>

@endsection
