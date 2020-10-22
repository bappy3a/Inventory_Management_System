@extends('layouts.master')


@section('content')

<section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

<section class="content-header">

<marquee behavior="scroll" direction="left"><b>Last Sale Product :</b> {{ App\Models\Sale::latest()->first()->product->name }} </marquee>
<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Hello Admin!</strong> Have a Nice Day!
</div>
      
    </section>



<section class="content-header ">


  <div class="row">

   <div class="container-fluid">
        <div class="col-lg-4 col-xs-6 ">
          <!-- small box -->
          <div class="small-box" style="background-color: #29cdf2;">
            <div class="inner">
              <h3>৳ {{ App\Models\Payment::totalinvoice() }}</h3>

              <p >Invoice Amount</p>
            </div>
            <div class="icon">
              <img src="images/dashboard/bill.png" width="80">
            </div>
            <a href="{{ route('sale.newinvoice') }}" class="small-box-footer">Create Invoice <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box" style="background-color: #24b54d;">
            <div class="inner">
              <h3>৳ {{ App\Models\Payment::totalrecieveinvoice()}}</h3>

              <p>Receive Amount</p>
            </div>
            <div class="icon">
             <img src="images/dashboard/income.png" width="80">
            </div>
            <a href="#" class="small-box-footer">New Receive<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box " style="background-color: #ED9121;">
            <div class="inner">
              <h3>৳ {{ App\Models\Payment::totaldueinvoice()}}</h3>

              <p>Total Due Amount</p>
            </div>
            <div class="icon">
             <img src="images/dashboard/due.png" width="80">
            </div>
            <a href="#" class="small-box-footer">Due Report <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box" style="background-color: #e24441;">
            <div class="inner">
              <h3>৳ {{ App\Models\Payment::totaltodayinvoice() }}</h3>

              <p>Today Received</p>
            </div>
            <div class="icon">
             <img src="images/dashboard/recieve.png" width="80">
            </div>
            <a href="#" class="small-box-footer">Recieve Report <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box " style="background-color: #008080">
            <div class="inner">
              <h3>65</h3>

              <p>Today Expenses</p>
            </div>
            <div class="icon">
             <img src="images/dashboard/expense.png" width="80">
            </div>
            <a href="#" class="small-box-footer">Expenses Report<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>


      <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box " style="background-color: #18A689">
            <div class="inner">
              <h3>{{ App\Models\Sale::totaltodaysale() }}</h3>

              <p>Today Sales</p>
            </div>
            <div class="icon">
             <img src="images/dashboard/shopping.png" width="80">
            </div>
            <a href="#" class="small-box-footer">Sales Report <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>


       

        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box " style="background-color: #41e2bf">
            <div class="inner">
              <h3>{{ App\Models\CrmClient::totalclient() }}</h3>

              <p>Total Customers </p>
            </div>
            <div class="icon">
              <img src="images/dashboard/card.png" width="80">
            </div>
            <a href="#" class="small-box-footer">Add Customers <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>


         <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box " style="background-color: #643fcc;">
            <div class="inner">
              <h3>{{ App\Models\CrmSupplier::totalsupplier() }}</h3>

              <p>Total Suppliers</p>
            </div>
            <div class="icon">
             <img src="images/dashboard/card.png" width="80">
            </div>
            <a href="#" class="small-box-footer">Add Supplier <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
   </div>
</div>
     </section>







@endsection


@section('scripts')

<script>
  

  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);
</script>

@endsection