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