     <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">

        <div class="user-panel" style=" overflow: visible;" >
          <div class="pull-left image">
            <img src="images/default/avatar.png" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>{{ Auth::user()->name }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>




        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN MENU</li>

          <li>
            <a href="{{ route('index') }}">
              <i class="fa fa-tachometer-alt"></i>
              <span>Dashboard</span>
            </a>
          </li>




          <li class="treeview">
            <a href="#">
              <i class="far fa-handshake"></i>
              <span >CRM</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">

              <li><a href="{{ route('crm.client.add') }}"><i class="fa fa-circle-o"></i>Add New Client</a></li>
              <li><a href="{{ route('crm.client.list') }}"><i class="fa fa-circle-o"></i>Client List</a></li>
              <li><a href="{{ route('crm.supplier.add') }}"><i class="fa fa-circle-o"></i>Add Supplier</a></li>
              <li><a href="{{ route('crm.supplier.list') }}"><i class="fa fa-circle-o"></i>Supplier Details</a></li>
            </ul>
          </li>

          <li class="treeview">
            <a href="#">

              <i class="fas fa-file-invoice-dollar"></i>
              <span > Bill/Invoice</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ route('sale.newinvoice') }}"><i class="fa fa-circle-o"></i>New Invoice</a></li>
              <li><a href="{{ route('sale.invoice_list') }}"><i class="fa fa-circle-o"></i>Invoice List</a></li>
              <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i>Invoice Item List</a></li>
            </ul>
          </li>


          <li class="treeview">
            <a href="#">
             <i class="fas fa-poll"></i>
             <span > Products</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('products.add') }}"><i class="fa fa-circle-o"></i>Products Entry</a></li>
            <li><a href="{{ route('products.production.entry') }}"><i class="fa fa-circle-o"></i>Purchases Product</a></li>
            <li><a href="{{ route('products.list') }}"><i class="fa fa-circle-o"></i>Products List</a></li>
            <li><a href="{{ route('products.stock') }}"><i class="fa fa-circle-o"></i>Stock Report</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i>Purchases Report</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i>Delete production</a></li>
          </ul>
        </li>


        <li class="treeview">
          <a href="#">
           <i class="fas fa-shopping-bag"></i>
           <span > Office Purchase</span>
           <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('purchase.entry') }}"><i class="fa fa-circle-o"></i>Purchase Entry</a></li>
          <li><a href=""><i class="fa fa-circle-o"></i>Purchases Product</a></li>

        </ul>
      </li>


      <li class="treeview">
        <a href="#">
         <i class="fas fa-bug"></i>
         <span > Due Reports</span>
         <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ route('sale.invoice.due') }}"><i class="fa fa-circle-o"></i>All Due Report</a></li>
        <li><a href="{{ route('sale.invoice.due.customer') }}"><i class="fa fa-circle-o"></i>Customer Wise Due Report</a></li>


      </ul>
    </li>

    <li class="treeview">
      <a href="#">
       <i class="fas fa-bug"></i>
       <span >Sales Report</span>
       <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="{{ route('sale.daily_sale') }}"><i class="fa fa-circle-o"></i>Daily Sale</a></li>
      <li><a href="{{ route('sale.daily_sale.customer') }}"><i class="fa fa-circle-o"></i>Customer Wise</a></li>
      <li><a href="{{ route('sale.daily_sale.product') }}"><i class="fa fa-circle-o"></i>Product Wise</a></li>


    </ul>
    </li>


     <li class="treeview">
      <a href="#">
      <i class="fas fa-cogs"></i>
      <span>Setting</span>
       <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      @cannot('isUserAdmin')
      <li><a href="{{ route('permission.userlist') }}">User Permissions</a></li>
      @endcan


    </ul>
    </li>


    <li class="treeview">
      <a style=""  href="{{ route('logout') }}"
      onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">
      <i class="fas fa-sign-out-alt"></i>
      <span>Logout</span>
      
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
   
    </li>


    </ul>
    </section>
    <!-- /.sidebar -->
    </aside>