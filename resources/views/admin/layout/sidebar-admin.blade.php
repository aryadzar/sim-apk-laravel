<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin_dashboard') ? 'active' : '' }}" href="{{ route('admin_dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs(['data_users', 'data_pesawat', 'user_details']) ? '' : 'collapsed' }}" data-bs-target="#data-users-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bar-chart-line"></i><span>Data</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="data-users-nav" class="nav-content collapse {{ request()->routeIs(['data_users', 'data_pesawat', 'user_details']) ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('data_users') }}" class="{{ request()->routeIs(['data_users', 'user_details']) ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Data Users</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('data_pesawat') }}" class="{{ request()->routeIs('data_pesawat') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Data Pesawat</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Data Nav -->
    </ul>
</aside><!-- End Sidebar-->
