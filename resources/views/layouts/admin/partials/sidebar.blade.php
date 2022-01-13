<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">                
                <li
                    class="sidebar-item {{ request()->is('admin/dashboard*') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard.index') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                    
                <li
                    class="sidebar-item {{ request()->is('admin/categories*') ? 'active' : '' }}">
                    <a href="{{ route('admin.categories.index') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Categories</span>
                    </a>
                </li>

                <li
                    class="sidebar-item {{ request()->is('admin/discounts*') ? 'active' : '' }}">
                    <a href="{{ route('admin.discounts.index') }}" class='sidebar-link'>
                        <i class="bi bi-wallet-fill"></i>
                        <span>Discounts</span>
                    </a>
                </li>

                <li
                    class="sidebar-item {{ request()->is('admin/products*') ? 'active' : '' }}">
                    <a href="{{ route('admin.products.index') }}" class='sidebar-link'>
                        <i class="bi bi-collection-fill"></i>
                        <span>Products</span>
                    </a>
                </li>
        
                <li class="sidebar-title">User Seetings</li>
                
                <li
                    class="sidebar-item ">
                    <a href="index.html" class='sidebar-link'>
                        <i class="bi bi-person-fill"></i>
                        <span>Profile</span>
                    </a>
                </li>

                <li
                class="sidebar-item ">
                <a href="index.html" class='sidebar-link'>
                    <i class="bi bi-door-open-fill"></i>
                    <span>Log Out</span>
                </a>
                </li>
               
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>