<aside class="left-sidebar">
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="{{ route('dashboard') }}" class="text-nowrap logo-img">
                <img src="{{ asset('assets/images/logos/logo.svg') }}" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-6"></i>
            </div>
        </div>
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                    <span class="hide-menu">Home</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('dashboard') }}">
                        <i class="ti ti-atom"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link justify-content-between" href="{{ route('roles.index') }}">
                        <div class="d-flex align-items-center gap-3">
                            <span><i class="ti ti-users"></i></span>
                            <span class="hide-menu">Roles</span>
                        </div>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link justify-content-between" href="{{ route('users.index') }}">
                        <div class="d-flex align-items-center gap-3">
                            <span><i class="ti ti-user-check"></i></span>
                            <span class="hide-menu">Users</span>
                        </div>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link justify-content-between" href="{{ route('berita.index') }}">
                        <div class="d-flex align-items-center gap-3">
                            <span><i class="ti ti-news"></i></span>
                            <span class="hide-menu">Berita</span>
                        </div>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link justify-content-between" href="{{ route('galeri.index') }}">
                        <div class="d-flex align-items-center gap-3">
                            <span><i class="ti ti-photo"></i></span>
                            <span class="hide-menu">Galeri</span>
                        </div>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link justify-content-between" href="{{ route('tentang.index') }}">
                        <div class="d-flex align-items-center gap-3">
                            <span><i class="ti ti-info-circle"></i></span>
                            <span class="hide-menu">Tentang</span>
                        </div>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link justify-content-between" href="{{ route('kontak.index') }}">
                        <div class="d-flex align-items-center gap-3">
                            <span><i class="ti ti-message-dots"></i></span>
                            <span class="hide-menu">Kontak</span>
                        </div>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>
