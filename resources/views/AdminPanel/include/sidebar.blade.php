<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
{{--    <a href="../../index3.html" class="brand-link">--}}
{{--        <img src="" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">--}}
        <span class="brand-text font-weight-light" style="color: white; font-weight: bolder">Druto IT</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset(auth()->user()->image)}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('admin.profile') }}" class="d-block">{{auth()->user()->name}}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{route('admin.dashboard')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
{{--                            <span class="right badge badge-danger">New</span>--}}
                        </p>
                    </a>
 <!--                </li>
               <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            <i class="right fas fa-angle-left"></i>
                       </p>
                    </a>
                   <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../charts/chartjs.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ChartJS</p>
                           </a>
                        </li>
                        <li class="nav-item">
                            <a href="../charts/flot.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                               <p>Flot</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../charts/inline.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Inline</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../charts/uplot.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>uPlot</p>
                            </a>
                        </li>
                    </ul>
                    </li>
 -->
                <li class="nav-header">Sections</li>
               {{--  <li class="nav-item">
                    <a href="{{route('admin.homes')}}" class="nav-link">
                        <i class="nav-icon fa fa-home text-danger"></i>
                        <p class="text">Home</p>
                    </a>
                </li> --}}



                <li class="nav-item menu-open">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fa fa-tasks text-success"></i>
                      <p>
                        Product Management
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('banner.index')}}" class="nav-link pl-5">
                                <i class="nav-icon fa fa-list-alt text-primary"></i>
                                <p>Banner</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.category')}}" class="nav-link pl-5">
                                <i class="nav-icon fa fa-list-alt text-primary"></i>
                                <p>category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.subcategory')}}" class="nav-link pl-5">
                                <i class="nav-icon fa fa-list-alt text-success"></i>
                                <p>Sub category</p>
                            </a>
                        </li>

                         <li class="nav-item">
                            <a href="{{ route('admin.brand') }}" class="nav-link pl-5">
                                <i class="nav-icon fa fa-star text-warning"></i>
                                <p>Brand</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.color') }}" class="nav-link pl-5">
                                <i class="nav-icon fa fa-globe text-primary"></i>
                                <p>Color</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.size') }}" class="nav-link pl-5">
                                <i class="nav-icon fa fa-th-large text-danger"></i>
                                <p>Size</p>
                            </a>
                        </li>

                         <li class="nav-item">
                            <a href="{{ route('admin.product') }}" class="nav-link pl-5">
                                <i class="nav-icon fa fa-tasks text-success"></i>
                                <p>Product list</p>
                            </a>
                        </li>
                    </ul>  
                </li>

                <li class="nav-item menu-open">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fa fas fa-database"></i>
                      <p>
                        Stock Management
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{ route('stock.index') }}" class="nav-link pl-5">
                            <p>Stock Products</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('stock.details.product') }}" class="nav-link pl-5">
                          <p>Size & Color Stock</p>
                        </a>
                      </li>
                    </ul>  
                </li>

                <li class="nav-item menu-open">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fa fa-globe text-primary"></i>
                      <p>
                        Order
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{ route('admin.order') }}" class="nav-link pl-5">
                            <p>Order List</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('panding.order-list') }}" class="nav-link pl-5">
                            <p>Pending Order List</p>
                        </a>
                        <a href="{{ route('confirm.order-list') }}" class="nav-link pl-5">
                            <p>Confiram Order List</p>
                        </a>
                      
                        <a href="{{ route('success.order-list') }}" class="nav-link pl-5">
                            <p>Success Order List</p>
                        </a>
                        <a href="{{ route('cancel.order-list') }}" class="nav-link pl-5">
                          <p>Cancel Order List</p>
                        </a>
                      </li>
                    </ul>  
                </li>

                <li class="nav-item menu-open">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fa fas fa-cog"></i>
                      <p>
                      Settings
                      </p>
                      <i class="right fas fa-angle-left"></i>
                    </a>
                     <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{ route('setting.genarel') }}" class="nav-link pl-5">
                            <p>Genarel Settings</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('setting.email') }}" class="nav-link pl-5">
                            <p>Email Settings</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="" class="nav-link pl-5">
                            <p>Payment Settings</p>
                             <i class="right fas fa-angle-left"></i>
                        </a>

                        <ul class="nav nav-treeview">
                          <li class="nav-item">
                            <a href="{{ route('setting.payment.stripe') }}" class="nav-link pl-5">
                                <i class="fab fa-cc-stripe pr-2"></i>
                                <p>Stripe</p>
                            </a>
                          </li>
                         
                          <li class="nav-item">
                            <a href="{{ route('setting.payment.paypal') }}" class="nav-link pl-5">
                                <i class="fab fa-cc-paypal pr-2"></i>
                                <p>Paypal</p>
                            </a>
                          </li>
                           <li class="nav-item">
                            <a href="{{ route('setting.payment.sslcommerz') }}" class="nav-link pl-5">
                                 <i class="fab fa-expeditedssl pr-2"></i>
                                <p>SSLCommerz</p>
                            </a>
                          </li>
                        </ul>
                      </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
