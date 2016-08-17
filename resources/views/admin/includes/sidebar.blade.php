<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ URL::to('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Menu</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="{{ Request::is('admin') ? 'active' : '' }}"><a href="{{ route('admin::index') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li class="treeview {{ Request::is('admin/product') || Request::is('admin/product/*') || Request::is('admin/category') || Request::is('admin/category/*') ? 'active' : '' }}">
                <a href="#"><i class="fa fa-book"></i>
                    <span>Catalogue</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('admin/product') || Request::is('admin/product/*') ? 'active' : '' }}"><a href="{{ route('admin::product.index') }}">Products</a></li>
                    <li class="{{ Request::is('admin/category') || Request::is('admin/category/*') ? 'active' : '' }}"><a href="{{ route('admin::category.index') }}">Categories</a></li>
                </ul>
            </li>
            <li class="treeview {{ Request::is('admin/customer') || Request::is('admin/customer/*') || Request::is('admin/address') || Request::is('admin/address/*') ? 'active' : '' }}">
                <a href="{{ route('admin::customer.index') }}"><i class="fa fa-users"></i>
                    <span>Customer</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('admin/customer') || Request::is('admin/customer/*') ? 'active' : '' }}">
                        <a href="{{ route('admin::customer.index') }}">Customers</a>
                    </li>
                    <li class="{{ Request::is('admin/address') || Request::is('admin/address/*') ? 'active' : '' }}">
                        <a href="{{ route('admin::address.index') }}">Addresses</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>