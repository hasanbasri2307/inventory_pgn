<div class="site-menubar-body">
    <div>
        <div>
            <ul class="site-menu">
                <li class="site-menu-category">Navigation</li>
                <li class="site-menu-item {{ $controller == 'HomeController' ? 'active' : '' }}">
                    <a class="animsition-link" href="{{ url('home') }}">
                        <i class="site-menu-icon wb-home" ></i>
                        <span class="site-menu-title">Home</span>
                    </a>
                </li>
                <li class="site-menu-item has-sub {{ $controller =='CategoryController' ? 'active open' : '' }}">
                    <a href="javascript:void(0)" data-slug="layout">
                    <i class="site-menu-icon fa-archive"></i>
                    <span class="site-menu-title">Product Category</span>
                    <span class="site-menu-arrow"></span>
                    </a>
                    <ul class="site-menu-sub">
                        <li class="site-menu-item {{ $controller == 'CategoryController' && ($action =='create' || $action == 'edit') ? 'active' : '' }}">
                            <a class="animsition-link" href="{{ url('category/create') }}">
                            <i class="site-menu-icon " aria-hidden="true"></i>
                            <span class="site-menu-title">Create Product Category</span>
                            </a>
                        </li>
                        <li class="site-menu-item {{ $controller == 'CategoryController' && ($action =='index' || $action == 'show') ? 'active' : '' }}">
                            <a class="animsition-link" href="{{ url('category') }}">
                            <i class="site-menu-icon " aria-hidden="true"></i>
                            <span class="site-menu-title">List Product Category</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="site-menu-item has-sub {{ $controller =='DepartmentController' ? 'active open' : '' }}">
                    <a href="javascript:void(0)" data-slug="layout">
                    <i class="site-menu-icon fa-building"></i>
                    <span class="site-menu-title">Department</span>
                    <span class="site-menu-arrow"></span>
                    </a>
                    <ul class="site-menu-sub">
                        <li class="site-menu-item {{ $controller == 'DepartmentController' && ($action =='create' || $action == 'edit') ? 'active' : '' }}">
                            <a class="animsition-link" href="{{ url('department/create') }}">
                            <i class="site-menu-icon " aria-hidden="true"></i>
                            <span class="site-menu-title">Create Department</span>
                            </a>
                        </li>
                        <li class="site-menu-item {{ $controller == 'DepartmentController' && ($action =='index' || $action == 'show') ? 'active' : '' }}">
                            <a class="animsition-link" href="{{ url('department') }}">
                            <i class="site-menu-icon " aria-hidden="true"></i>
                            <span class="site-menu-title">List Department</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="site-menu-item has-sub {{ $controller =='ProductController' ? 'active open' : '' }}">
                    <a href="javascript:void(0)" data-slug="layout">
                    <i class="site-menu-icon fa-cart-plus"></i>
                    <span class="site-menu-title">Product</span>
                    <span class="site-menu-arrow"></span>
                    </a>
                    <ul class="site-menu-sub">
                        <li class="site-menu-item {{ $controller == 'ProductController' && ($action =='create' || $action == 'edit') ? 'active' : '' }}">
                            <a class="animsition-link" href="{{ url('product/create') }}">
                            <i class="site-menu-icon " aria-hidden="true"></i>
                            <span class="site-menu-title">Create Product</span>
                            </a>
                        </li>
                        <li class="site-menu-item {{ $controller == 'ProductController' && ($action =='index' || $action == 'show') ? 'active' : '' }}">
                            <a class="animsition-link" href="{{ url('product') }}">
                            <i class="site-menu-icon " aria-hidden="true"></i>
                            <span class="site-menu-title">List Product</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="site-menu-item has-sub {{ $controller =='UserController' ? 'active open' : '' }}">
                    <a href="javascript:void(0)" data-slug="layout">
                    <i class="site-menu-icon fa-user"></i>
                    <span class="site-menu-title">User</span>
                    <span class="site-menu-arrow"></span>
                    </a>
                    <ul class="site-menu-sub">
                        <li class="site-menu-item {{ $controller == 'UserController' && ($action =='create' || $action == 'edit') ? 'active' : '' }}">
                            <a class="animsition-link" href="{{ url('user/create') }}">
                            <i class="site-menu-icon " aria-hidden="true"></i>
                            <span class="site-menu-title">Create User</span>
                            </a>
                        </li>
                        <li class="site-menu-item {{ $controller == 'UserController' && ($action =='index' || $action == 'show') ? 'active' : '' }}">
                            <a class="animsition-link" href="{{ url('user') }}">
                            <i class="site-menu-icon " aria-hidden="true"></i>
                            <span class="site-menu-title">List User</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="site-menu-item has-sub {{ $controller =='VendorController' ? 'active open' : '' }}">
                    <a href="javascript:void(0)" data-slug="layout">
                    <i class="site-menu-icon fa-university"></i>
                    <span class="site-menu-title">Vendor</span>
                    <span class="site-menu-arrow"></span>
                    </a>
                    <ul class="site-menu-sub">
                        <li class="site-menu-item {{ $controller == 'VendorController' && ($action =='create' || $action == 'edit') ? 'active' : '' }}">
                            <a class="animsition-link" href="{{ url('vendor/create') }}">
                            <i class="site-menu-icon " aria-hidden="true"></i>
                            <span class="site-menu-title">Create Vendor</span>
                            </a>
                        </li>
                        <li class="site-menu-item {{ $controller == 'VendorController' && ($action =='index' || $action == 'show') ? 'active' : '' }}">
                            <a class="animsition-link" href="{{ url('vendor') }}">
                            <i class="site-menu-icon " aria-hidden="true"></i>
                            <span class="site-menu-title">List Vendor</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="site-menu-item has-sub {{ $controller =='RequestOrderController' ? 'active open' : '' }}">
                    <a href="javascript:void(0)" data-slug="layout">
                    <i class="site-menu-icon fa-pencil"></i>
                    <span class="site-menu-title">Request Order</span>
                    <span class="site-menu-arrow"></span>
                    </a>
                    <ul class="site-menu-sub">
                        
                        <li class="site-menu-item {{ $controller == 'RequestOrderController' && ($action =='create' || $action == 'edit') ? 'active' : '' }}">
                            <a class="animsition-link" href="{{ url('request-order/create') }}">
                            <i class="site-menu-icon " aria-hidden="true"></i>
                            <span class="site-menu-title">Create RO</span>
                            </a>
                        </li>
                       
                        <li class="site-menu-item {{ $controller == 'RequestOrderController' && ($action =='index' || $action == 'show') ? 'active' : '' }}">
                            <a class="animsition-link" href="{{ url('request-order') }}">
                            <i class="site-menu-icon " aria-hidden="true"></i>
                            <span class="site-menu-title">List RO</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="site-menu-item has-sub {{ $controller =='PurchaseOrderController' ? 'active open' : '' }}">
                    <a href="javascript:void(0)" data-slug="layout">
                    <i class="site-menu-icon fa-pencil-square-o"></i>
                    <span class="site-menu-title">Purchasing Order</span>
                    <span class="site-menu-arrow"></span>
                    </a>
                    <ul class="site-menu-sub">
                       
                        <li class="site-menu-item {{ $controller == 'PurchaseOrderController' && ($action =='create' || $action == 'edit') ? 'active' : '' }}">
                            <a class="animsition-link" href="{{ url('purchase-order/create') }}">
                            <i class="site-menu-icon " aria-hidden="true"></i>
                            <span class="site-menu-title">Create PO</span>
                            </a>
                        </li>
                        
                        <li class="site-menu-item {{ $controller == 'PurchaseOrderController' && ($action =='index' || $action == 'show') ? 'active' : '' }}">
                            <a class="animsition-link" href="{{ url('purchase-order') }}">
                            <i class="site-menu-icon " aria-hidden="true"></i>
                            <span class="site-menu-title">List PO</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="site-menu-item has-sub {{ $controller =='DeliveryOrderController' ? 'active open' : '' }}">
                    <a href="javascript:void(0)" data-slug="layout">
                    <i class="site-menu-icon fa-pencil-square"></i>
                    <span class="site-menu-title">Delivery Order</span>
                    <span class="site-menu-arrow"></span>
                    </a>
                    <ul class="site-menu-sub">
                        <li class="site-menu-item {{ $controller == 'DeliveryOrderController' && ($action =='create' || $action == 'edit') ? 'active' : '' }}">
                            <a class="animsition-link" href="{{ url('delivery-order/create') }}">
                            <i class="site-menu-icon " aria-hidden="true"></i>
                            <span class="site-menu-title">Create DO</span>
                            </a>
                        </li>
                        <li class="site-menu-item {{ $controller == 'DeliveryOrderController' && ($action =='index' || $action == 'show') ? 'active' : '' }}">
                            <a class="animsition-link" href="{{ url('delivery-order') }}">
                            <i class="site-menu-icon " aria-hidden="true"></i>
                            <span class="site-menu-title">List DO</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="site-menu-item {{ $controller == 'StockController' ? 'active' : '' }}">
                    <a class="animsition-link" href="{{ url('stock') }}">
                        <i class="site-menu-icon wb-pie-chart" ></i>
                        <span class="site-menu-title">Stock</span>
                    </a>
                </li>
                                <li class="site-menu-item has-sub {{ $controller =='ReportController' ? 'active open' : '' }}">
                    <a href="javascript:void(0)" data-slug="layout">
                    <i class="site-menu-icon wb-pie-chart"></i>
                    <span class="site-menu-title">Report</span>
                    <span class="site-menu-arrow"></span>
                    </a>
                    <ul class="site-menu-sub">
                        <li class="site-menu-item {{ $controller == 'ReportController' && ($action =='stock' || $action == 'doStock') ? 'active' : '' }}">
                            <a class="animsition-link" href="{{ url('report/stock') }}">
                            <i class="site-menu-icon " aria-hidden="true"></i>
                            <span class="site-menu-title">Stock</span>
                            </a>
                        </li>
                        <li class="site-menu-item {{ $controller == 'ReportController' && ($action =='requestOrder' || $action == 'doRequestOrder') ? 'active' : '' }}">
                            <a class="animsition-link" href="{{ url('report/request-order') }}">
                            <i class="site-menu-icon " aria-hidden="true"></i>
                            <span class="site-menu-title">Request Order</span>
                            </a>
                        </li>
                        <li class="site-menu-item {{ $controller == 'ReportController' && ($action =='purchaseOrder' || $action == 'doPurchaseOrder') ? 'active' : '' }}">
                            <a class="animsition-link" href="{{ url('report/purchase-order') }}">
                            <i class="site-menu-icon " aria-hidden="true"></i>
                            <span class="site-menu-title">Purchase Order</span>
                            </a>
                        </li>
                        <li class="site-menu-item {{ $controller == 'ReportController' && ($action =='deliveryOrder' || $action == 'doDeliveryOrder') ? 'active' : '' }}">
                            <a class="animsition-link" href="{{ url('report/delivery-order') }}">
                            <i class="site-menu-icon " aria-hidden="true"></i>
                            <span class="site-menu-title">Delivery Order</span>
                            </a>
                        </li>

                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>