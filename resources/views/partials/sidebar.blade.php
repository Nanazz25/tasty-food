<aside class="left-sidebar">
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="{{ route('dashboard') }}" class="text-nowrap logo-img">
                <img src="{{ asset('assets/images/logos/logo.svg') }}" alt="Logo" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-6"></i>
            </div>
        </div>
        <nav class="sidebar-nav overflow-visible h-auto">

            <ul id="sidebarnav">

                {{-- Section: HOME --}}
                <li class="nav-small-cap">
                    <iconify-icon icon="solar:home-2-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                    <span class="hide-menu">Dashboard</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('dashboard') }}">
                        <i class="ti ti-atom"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                {{-- Section: MANAJEMEN PENGGUNA --}}
                @if (allowedRoles('akses_roles') || allowedRoles('akses_users'))
                    <li class="nav-small-cap">
                        <iconify-icon icon="solar:user-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                        <span class="hide-menu">Manajemen Pengguna</span>
                    </li>

                    @if (allowedRoles('akses_roles'))
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('roles.index') }}">
                                <i class="ti ti-users"></i>
                                <span class="hide-menu">Kelola Role</span>
                            </a>
                        </li>
                    @endif

                    @if (allowedRoles('akses_users'))
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('users.index') }}">
                                <i class="ti ti-user-check"></i>
                                <span class="hide-menu">Kelola Pengguna</span>
                            </a>
                        </li>
                    @endif
                @endif

                {{-- Section: KONTEN WEBSITE --}}
                @if (
                    allowedRoles('akses_berita') ||
                    allowedRoles('akses_galeri') ||
                    allowedRoles('akses_tentang') ||
                    allowedRoles('akses_kontak')
                )
                    <li class="nav-small-cap">
                        <iconify-icon icon="solar:document-text-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                        <span class="hide-menu">Konten Website</span>
                    </li>

                    @if (allowedRoles('akses_berita'))
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('berita.index') }}">
                                <i class="ti ti-news"></i>
                                <span class="hide-menu">Berita</span>
                            </a>
                        </li>
                    @endif

                    @if (allowedRoles('akses_galeri'))
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('galeri.index') }}">
                                <i class="ti ti-photo"></i>
                                <span class="hide-menu">Galeri</span>
                            </a>
                        </li>
                    @endif

                    @if (allowedRoles('akses_tentang'))
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('tentang.index') }}">
                                <i class="ti ti-info-circle"></i>
                                <span class="hide-menu">Tentang Kami</span>
                            </a>
                        </li>
                    @endif

                    @if (allowedRoles('akses_kontak'))
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('kontak.index') }}">
                                <i class="ti ti-message-dots"></i>
                                <span class="hide-menu">Kontak</span>
                            </a>
                        </li>
                    @endif
                @endif

            </ul>
        </nav>
    </div>
</aside>
