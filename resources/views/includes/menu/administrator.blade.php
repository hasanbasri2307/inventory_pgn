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
            </ul>
        </div>
    </div>
</div>