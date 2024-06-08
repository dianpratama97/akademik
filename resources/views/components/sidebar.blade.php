<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    @if (!Auth::user()->biodata)
                        <img src="{{ asset('storage/gambar/users/user_default.png') }}" alt="profile">
                    @else
                        <img src="{{ asset('storage/gambar/users/' . auth()->user()->biodata->image) }}" alt="profile">
                    @endif

                    <span class="login-status online"></span>
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2">{{ Auth::user()->name }}</span>
                    <span class="text-secondary text-small">{{ Auth::user()->role }}</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>


        {{-- users --}}
        <li class="nav-item">
            <a class="nav-link" href="{{ route('users.index') }}">
                <span class="menu-title">Users</span>
                <i class="mdi mdi-account menu-icon"></i>
            </a>
        </li>
       

        {{-- akademik --}}
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#master_akademik" aria-expanded="false"
                aria-controls="master_akademik">
                <span class="menu-title">Master Akademik</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
            </a>
            <div class="collapse" id="master_akademik">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('agama.index') }}">Agama</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('jurusan.index') }}">Jurusan</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('kelas.index') }}">Kelas</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('tahunAjaran.index') }}">Tahun Ajaran</a>
                    </li>
                </ul>
            </div>
        </li>

        {{-- absen --}}
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#master_absensi" aria-expanded="false"
                aria-controls="master_absensi">
                <span class="menu-title">Master Absen</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
            </a>
            <div class="collapse" id="master_absensi">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('absensi.index') }}">Absen</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('absensi.rekap') }}">Rekap</a>
                    </li>
                </ul>
            </div>
        </li>

        {{-- kelulusan --}}
        <li class="nav-item">
            <a class="nav-link" href="{{ route('kelulusan.index') }}">
                <span class="menu-title">Kelulusan Kelas 12</span>
                <i class="mdi mdi-account-multiple menu-icon"></i>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('config.index') }}">
                <span class="menu-title">Pengaturan</span>
                <i class="mdi mdi-brightness-7 menu-icon"></i>
            </a>
        </li>

    </ul>
</nav>
