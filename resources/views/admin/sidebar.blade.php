<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Menu
                    </li>


                    {{--                                        <li class="nav-item ">--}}
                    {{--                                            <a class="nav-link" href="{{ url('admin') }}"><i class="fa fa-fw fa-database"></i>sdssssssdd</a>--}}
                    {{--                                        </li>--}}

                    @include('admin.admin_components.sidebar_item', ['title'=>"Home", 'url'=>"admin", 'icon_class' => 'fa fa-fw fa-home', 'show_badge'=> false] )
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" aria-expanded="false"
                           data-target="#submenu-orders" aria-controls="submenu-1"><i class="fa fa-fw fa-briefcase"></i>Orders</a>
                        <div id="submenu-orders" class="submenu collapse" style="">
                            <ul class="nav flex-column">
                                @include('admin.admin_components.sidebar_item', ['title'=>"Add a new Order", 'url'=>"orders/create", 'icon_class' => 'fa fa-fw fa-plus', 'show_badge'=> false] )
                                @include('admin.admin_components.sidebar_item', ['title'=>"View all Orders", 'url'=>"orders", 'icon_class' => 'fa fa-fw fa-eye', 'show_badge'=> false] )
                                @include('admin.admin_components.sidebar_item', ['title'=>"Available Orders", 'url'=>"admin/orders/available", 'icon_class' => 'fa fa-fw fa-gift', 'show_badge'=> true, 'badge_value'=>"$counts->available", 'badge_class'=>'badge-success'] )
                                @include('admin.admin_components.sidebar_item', ['title'=>"Awarded Orders", 'url'=>"admin/orders/awarded", 'icon_class' => 'fa fa-fw fa-calendar-times', 'show_badge'=> true, 'badge_value'=>"$counts->awarded", 'badge_class'=>'badge-success'] )
                                @include('admin.admin_components.sidebar_item', ['title'=>"Under Revision", 'url'=>"admin/orders/revision", 'icon_class' => 'fa fa-fw fa-clipboard-check', 'show_badge'=> true, 'badge_value'=>"$counts->revision", 'badge_class'=>'badge-success'] )
                                @include('admin.admin_components.sidebar_item', ['title'=>"Completed Orders", 'url'=>"admin/orders/completed", 'icon_class' => 'fa fa-fw fa-check', 'show_badge'=> true, 'badge_value'=>"$counts->completed", 'badge_class'=>'badge-success'] )
                                @include('admin.admin_components.sidebar_item', ['title'=>"Paid Orders", 'url'=>"admin/orders/paid", 'icon_class' => 'fa fa-fw fa-money-bill-alt', 'show_badge'=> true, 'badge_value'=>"$counts->paid", 'badge_class'=>'badge-success'] )
                                @include('admin.admin_components.sidebar_item', ['title'=>"Cancelled Orders", 'url'=>"admin/orders/cancelled", 'icon_class' => 'fa fa-fw fa-question-circle', 'show_badge'=> true, 'badge_value'=>"$counts->cancelled", 'badge_class'=>'badge-success'] )
                                @include('admin.admin_components.sidebar_item', ['title'=>"Rejected Orders", 'url'=>"admin/orders/rejected", 'icon_class' => 'fa fa-fw fa-recycle', 'show_badge'=> true, 'badge_value'=>"$counts->rejected", 'badge_class'=>'badge-success'] )
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" aria-expanded="false"
                           data-target="#submenu-sources" aria-controls="submenu-1"><i class="fa fa-fw fa-database"></i>Sources</a>
                        <div id="submenu-sources" class="submenu collapse" style="">
                            <ul class="nav flex-column">
                                @include('admin.admin_components.sidebar_item', ['title'=>"Add a Source", 'url'=>"sources/create", 'icon_class' => 'fa fa-fw fa-plus', 'show_badge'=> false,] )
                                @include('admin.admin_components.sidebar_item', ['title'=>"View Sources", 'url'=>"sources", 'icon_class' => 'fa fa-fw fa-eye', 'show_badge'=> false,] )
                            </ul>
                        </div>
                    </li>
                    <li class="nav-divider">
                        Financials
                    </li>

                    @include('admin.admin_components.sidebar_item', ['title'=>"Writer Earnings", 'url'=>"earnings", 'icon_class' => 'fa fa-fw fa-home', 'show_badge'=> false] )
                    @include('admin.admin_components.sidebar_item', ['title'=>"Other Financials", 'url'=>"financials", 'icon_class' => 'fa fa-fw fa-home', 'show_badge'=> false] )
                    @include('admin.admin_components.sidebar_item', ['title'=>"Issue Advances/Fines", 'url'=>"advances", 'icon_class' => 'fa fa-fw fa-home', 'show_badge'=> false] )

                </ul>
            </div>
        </nav>
    </div>
</div>
