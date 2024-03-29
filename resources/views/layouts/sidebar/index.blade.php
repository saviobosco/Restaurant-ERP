<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config("app.name") }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('sell.create') }}" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Sell
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('receipts.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Receipts
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('productCategories.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Product Categories
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('products.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Products
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('customers.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Customers
                        </p>
                    </a>
                </li>


<!--

                <li class="nav-item has-treeview {{ (str_contains(request()->path(), 'inventory')) ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ (str_contains(request()->path(), 'inventory')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Inventory
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('inventoryItems.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All items</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('inventoryItemTypes.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All item types</p>
                            </a>
                        </li>
&lt;!&ndash;                        <li class="nav-item">
                            <a href="{{ route('stocks.history') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Stock Histories</p>
                            </a>
                        </li>&ndash;&gt;
                    </ul>
                </li>
-->

<!--                <li class="nav-item has-treeview {{ (str_contains(request()->path(), 'customers')) ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ (str_contains(request()->path(), 'customers')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Customers
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('customers.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All customers</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('customers.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>New Customer</p>
                            </a>
                        </li>
                    </ul>
                </li>-->


<!--
                <li class="nav-item has-treeview {{ (str_contains(request()->path(), 'data-center')) ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ (str_contains(request()->path(), 'data-center')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-database"></i>
                        <p>
                            Data Center
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('items.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Items</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('categories.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Categories</p>
                            </a>
                        </li>
&lt;!&ndash;                        <li class="nav-item">
                            <a href="{{ route('item_categories.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Item Attributes</p>
                            </a>
                        </li>&ndash;&gt;
                        <li class="nav-item">
                            <a href="{{ route('partners.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Partners</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Office documents</p>
                            </a>
                        </li>
                    </ul>
                </li>
-->

<!--                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link {{ (str_contains(request()->path(), 'users')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Staffs
                        </p>
                    </a>
                </li>-->

                <li class="nav-header">APPS</li>
                <li class="nav-item">
                    <a href="{{ route("inventoryItems.index") }}" class="nav-link">
                        <i class="nav-icon fas fa-database"></i>
                        <p>
                            Inventory
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route("inventoryItemTypes.index") }}" class="nav-link">
                        <i class="nav-icon fas fa-database"></i>
                        <p>
                            Inventory Category
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
