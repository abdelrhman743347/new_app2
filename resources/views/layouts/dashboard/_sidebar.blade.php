<div class="page-sidebar sidebar" style="">
                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;">
                    <div class="page-sidebar-inner slimscroll" style="overflow: hidden; width: auto; height: 100%;">

                    <ul class="menu accordion-menu">
                        <li class="active">
                            <a href="{{ route('dashboard.index') }}" class="waves-effect waves-button">
                                <span class="menu-icon glyphicon glyphicon-home"></span>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        @if (auth()->user()->hasRole('super_admin'))
                            <li class="">
                                <a href="{{ route('dashboard.users.index') }}" class="waves-effect waves-button">
                                    <span class="menu-icon glyphicon glyphicon-user"></span>
                                    <p>Users</p>
                                </a>
                            </li>        
                        @endif

                        @if (auth()->user()->hasRole('super_admin'))
                            <li class="">
                                <a href="{{ route('dashboard.categories.index') }}" class="waves-effect waves-button">
                                    <span class="menu-icon glyphicon glyphicon-list"></span>
                                    <p>Categories</p>
                                </a>
                            </li>        
                        @endif                        

                        @if (auth()->user()->hasRole('super_admin'))
                            <li class="">
                                <a href="{{ route('dashboard.products.index') }}" class="waves-effect waves-button">
                                    <span class="menu-icon glyphicon glyphicon-list"></span>
                                    <p>Products</p>
                                </a>
                            </li>        
                        @endif                        

                        @if (auth()->user()->hasRole('super_admin'))
                            <li class="">
                                <a href="{{ route('dashboard.orders') }}" class="waves-effect waves-button">
                                    <span class="menu-icon glyphicon glyphicon-list"></span>
                                    <p>Orders</p>
                                </a>
                            </li>        
                        @endif

                    </ul>
                </div>

                <div class="slimScrollBar" style="background: rgb(204, 204, 204); width: 7px; position: absolute; top: 0px; opacity: 0.3; display: none; border-radius: 0px; z-index: 99; right: 0px; height: 1080px;">
                    
                </div>
                <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 0px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 0px;"></div></div><!-- Page Sidebar Inner -->
            </div>