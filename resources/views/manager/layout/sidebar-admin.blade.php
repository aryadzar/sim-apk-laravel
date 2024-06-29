<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('manager_dashboard') ? 'active' : 'collapsed' }}" href="{{ route('manager_dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs(['jadwal_pemeliharaan']) ? '' : 'collapsed' }}" data-bs-target="#data-users-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bar-chart-line"></i><span>Data</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="data-users-nav" class="nav-content collapse {{ request()->routeIs(['jadwal_pemeliharaan', 'detail_pesawat_manager']) ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('jadwal_pemeliharaan') }}" class="{{ request()->routeIs(['jadwal_pemeliharaan', 'user_details', 'detail_pesawat_manager']) ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Jadwal Pemeliharaan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('data_pesawat') }}" class="{{ request()->routeIs('data_pesawat') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Riwayat Teknisi</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Data Nav -->
    </ul>
</aside><!-- End Sidebar-->
