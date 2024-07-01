<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto"><a class="navbar-brand"
                    href="{{ asset('backend') }}/starter-kit/ltr/vertical-menu-template/">
                    <span class="brand-logo">
                        <i class="fa fa-home"></i>
                    </span>
                    <h3 class="brand-text">SEKOLAH</h3>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i
                        class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i
                        class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc"
                        data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item {{ Request::routeIs('dashboard') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('dashboard') }}">
                    <i class="fa-regular fa-folder"></i>
                    <span class="menu-title text-truncate">Dashboard</span>
                </a>
            </li>
            @if (Auth::user()->role == 'admin')
                <li class=" nav-item {{ Request::routeIs('users*') ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="{{ route('users.index') }}">
                        <i class="fa-regular fa-folder"></i>
                        <span class="menu-title text-truncate">Users</span>
                    </a>
                </li>

                <li class="nav-item has-sub" style=""><a class="d-flex align-items-center" href="#">
                        <i class="fa-regular fa-folder"></i>
                        <span class="menu-title text-truncate">Menu Akademik</span>
                    </a>
                    <ul class="menu-content">
                        <li class="{{ Request::routeIs('agama*') ? 'active' : '' }}">
                            <a class="d-flex align-items-center" href="{{ route('agama.index') }}">
                                <i class="fa-solid fa-arrow-right"></i>
                                <span class="menu-item text-truncate" data-i18n="Collapsed Menu">Agama</span>
                            </a>
                        </li>
                        <li class="{{ Request::routeIs('jurusan*') ? 'active' : '' }}">
                            <a class="d-flex align-items-center" href="{{ route('jurusan.index') }}">
                                <i class="fa-solid fa-arrow-right"></i>
                                <span class="menu-item text-truncate" data-i18n="Collapsed Menu">jurusan</span>
                            </a>
                        </li>
                        <li class="{{ Request::routeIs('kelas*') ? 'active' : '' }}">
                            <a class="d-flex align-items-center" href="{{ route('kelas.index') }}">
                                <i class="fa-solid fa-arrow-right"></i>
                                <span class="menu-item text-truncate" data-i18n="Collapsed Menu">kelas</span>
                            </a>
                        </li>
                        <li class="{{ Request::routeIs('tahunAjaran*') ? 'active' : '' }}">
                            <a class="d-flex align-items-center" href="{{ route('tahunAjaran.index') }}">
                                <i class="fa-solid fa-arrow-right"></i>
                                <span class="menu-item text-truncate" data-i18n="Collapsed Menu">tahun ajaran</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-sub" style=""><a class="d-flex align-items-center" href="#">
                        <i class="fa-regular fa-folder"></i>
                        <span class="menu-title text-truncate">Menu Absen</span>
                    </a>
                    <ul class="menu-content">
                        <li class="{{ Request::routeIs('absensi.index') ? 'active' : '' }}">
                            <a class="d-flex align-items-center" href="{{ route('absensi.index') }}">
                                <i class="fa-solid fa-arrow-right"></i>
                                <span class="menu-item text-truncate" data-i18n="Collapsed Menu">absensi</span>
                            </a>
                        </li>
                        <li class="{{ Request::routeIs('absensi.rekap') ? 'active' : '' }}">
                            <a class="d-flex align-items-center" href="{{ route('absensi.rekap') }}">
                                <i class="fa-solid fa-arrow-right"></i>
                                <span class="menu-item text-truncate" data-i18n="Collapsed Menu">absensi rekap</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class=" nav-item {{ Request::routeIs('kelulusan*') ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="{{ route('kelulusan.index') }}">
                        <i class="fa-regular fa-folder"></i>
                        <span class="menu-title text-truncate">kelulusan</span>
                    </a>
                </li>

                <li class=" nav-item {{ Request::routeIs('config*') ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="{{ route('config.index') }}">
                        <i class="fa-regular fa-folder"></i>
                        <span class="menu-title text-truncate">Pengaturan</span>
                    </a>
                </li>
            @endif

        </ul>
    </div>
</div>
