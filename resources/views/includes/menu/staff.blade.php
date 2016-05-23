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
                        @if(Auth::user()->role == "staff" and (Auth::user()->dep_id != 8 and Auth::user()->dep_id != 7 ))
                        <li class="site-menu-item {{ $controller == 'RequestOrderController' && ($action =='create' || $action == 'edit') ? 'active' : '' }}">
                            <a class="animsition-link" href="{{ url('request-order/create') }}">
                            <i class="site-menu-icon " aria-hidden="true"></i>
                            <span class="site-menu-title">Create RO</span>
                            </a>
                        </li>
                        @endif
                        <li class="site-menu-item {{ $controller == 'RequestOrderController' && ($action =='index' || $action == 'show') ? 'active' : '' }}">
                            <a class="animsition-link" href="{{ url('request-order') }}">
                            <i class="site-menu-icon " aria-hidden="true"></i>
                            <span class="site-menu-title">List RO</span>
                            </a>
                        </li>
                    </ul>
                </li>
                 @if((Auth::user()->role == "staff" and Auth::user()->dep_id == 8) OR Auth::user()->role =="administrator" )
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
                @endif
                
                <li class="site-menu-item {{ $controller == 'StockController' ? 'active' : '' }}">
                    <a class="animsition-link" href="{{ url('stock') }}">
                        <i class="site-menu-icon wb-pie-chart" ></i>
                        <span class="site-menu-title">Stock</span>
                    </a>
                </li>
                @if(Auth::user()->dep_id== 7)
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
                @endif
            </ul>
        </div>
    </div>
</div>