<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon"
                            data-feather="menu"></i></a></li>

            </ul>
            <form method="POST" action="{{ route('logout') }}" id="auto-logout">
                @csrf
                <button type="submit" class="btn btn-gradient-warning"
                    onclick="event.preventDefault(); this.closest('form').submit();">
                    Keluar
                    <i class="fa-solid fa-right-from-bracket"></i>
                </button>
            </form>
        </div>
        <ul class="nav navbar-nav align-items-center ms-auto">
            <li class="nav-item dropdown dropdown-user">
                <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none">
                        <span class="user-name fw-bolder">{{ Auth::user()->name }}</span>
                        <span class="user-status">{{ Auth::user()->role }}</span>
                    </div>
                    <span class="avatar">
                        @if (!Auth::user()->biodata)
                            <img src="{{ asset('storage/gambar/users/user_default.png') }}" alt="profile"
                                height="40" width="40">
                        @else
                            <img src="{{ asset('storage/gambar/users/' . auth()->user()->biodata->image) }}"
                                alt="profile" height="40" width="40">
                        @endif
                        <span class="avatar-status-online"></span>
                    </span>
                </a>
            </li>
        </ul>
    </div>
</nav>
