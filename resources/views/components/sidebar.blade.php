<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="index.html"><img src="{{asset('mazer/assets/images/logo/logo.png')}}" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                {{-- <li class="sidebar-title">Menu</li> --}}

                <li class="sidebar-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->routeIs('users*') ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}" class='sidebar-link'>
                        <i class="bi bi-person-fill"></i>
                        <span>Users</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->routeIs('categories*') ? 'active' : '' }}">
                    <a href="{{ route('categories.index') }}" class='sidebar-link'>
                        <i class="bi bi-list-ul"></i>
                        <span>Kategori</span>
                    </a>
                </li>
                <li class="sidebar-item {{ request()->routeIs('menus*') ? 'active' : '' }}">
                    <a href="{{ route('menus.index') }}" class='sidebar-link'>
                        <i class="bi bi-cup-straw"></i>
                        <span>Menu</span>
                    </a>
                </li>

                <li class="sidebar-item has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Components</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="component-alert.html">Alert</a>
                        </li>
                    </ul>
                </li>

    

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>