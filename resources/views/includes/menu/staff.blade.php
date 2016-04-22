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
                <li class="site-menu-item has-sub {{ $controller =='DepartmentController' ? 'active open' : '' }}">
                    <a href="javascript:void(0)" data-slug="layout">
                    <i class="site-menu-icon fa-pencil-square-o"></i>
                    <span class="site-menu-title">Purchasing Order</span>
                    <span class="site-menu-arrow"></span>
                    </a>
                    <ul class="site-menu-sub">
                        <li class="site-menu-item {{ $controller == 'DepartmentController' && ($action =='create' || $action == 'edit') ? 'active' : '' }}">
                            <a class="animsition-link" href="{{ url('department/create') }}">
                            <i class="site-menu-icon " aria-hidden="true"></i>
                            <span class="site-menu-title">Create PO</span>
                            </a>
                        </li>
                        <li class="site-menu-item {{ $controller == 'DepartmentController' && ($action =='index' || $action == 'show') ? 'active' : '' }}">
                            <a class="animsition-link" href="{{ url('department') }}">
                            <i class="site-menu-icon " aria-hidden="true"></i>
                            <span class="site-menu-title">List PO</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="site-menu-item has-sub {{ $controller =='ProductController' ? 'active open' : '' }}">
                    <a href="javascript:void(0)" data-slug="layout">
                    <i class="site-menu-icon fa-pencil-square"></i>
                    <span class="site-menu-title">Delivery Order</span>
                    <span class="site-menu-arrow"></span>
                    </a>
                    <ul class="site-menu-sub">
                        <li class="site-menu-item {{ $controller == 'ProductController' && ($action =='create' || $action == 'edit') ? 'active' : '' }}">
                            <a class="animsition-link" href="{{ url('product/create') }}">
                            <i class="site-menu-icon " aria-hidden="true"></i>
                            <span class="site-menu-title">Create DO</span>
                            </a>
                        </li>
                        <li class="site-menu-item {{ $controller == 'ProductController' && ($action =='index' || $action == 'show') ? 'active' : '' }}">
                            <a class="animsition-link" href="{{ url('product') }}">
                            <i class="site-menu-icon " aria-hidden="true"></i>
                            <span class="site-menu-title">List DO</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>