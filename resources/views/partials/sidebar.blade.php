<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li>
                <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">
        {{-- @auth
        @if (Auth()->user())
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{asset('assets/img/avatar/avatar-1.png')}}" class="rounded-circle mr-1" />

                <div class="d-sm-none d-lg-inline-block">
                    <div class="d-sm-none d-lg-inline-block">Hallo, {{ auth()->user()->role }}</div>
                </div>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-divider"></div>
                @if (Auth()->user()->role == 'partner')
                <a href="{{route('profile.index')}}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>
                @endif

                <a href="/" class="dropdown-item has-icon">
                    <i class="has-icon text-danger fas fa-sign-out-alt"></i> Web Utama
                </a>


                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item text-danger">
                        <i class="has-icon text-danger fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </li>
        @endif
        @else

        @endauth --}}
    </ul>
</nav>

<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href=""><img src="{{asset('assets/img/logo-kiwkiw@.png')}}" alt="logo" width="150" height="75px"></a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href=""><img src="{{asset('assets/img/logokota.png')}}" alt="logo" width="40" height="35px"></a>
        </div>

        <ul class="sidebar-menu">
            <hr>
            @if (Auth()->user()->role == 'admin')
            <li class="nav-item {{ $active == 'home' ? 'active' : '' }}">
                <a href="{{route('dashboard-admin')}}" class="nav-link">
                    <i class="fas fa-fire"></i>
                    <span>Dashboard Admin</span>
                </a>
            </li>

            <li class="nav-item {{ $active == 'kategoribarang' ? 'active' : '' }}">
                <a href="{{route('kategoribarang.index')}}" class="nav-link">
                    <i class="fas fa-fire"></i>
                    <span>Kategori Barang</span>
                </a>
            </li>

            <li class="nav-item {{ $active == 'x' ? 'active' : '' }}">
                <a href="{{route('dashboard-admin')}}" class="nav-link">
                    <i class="fas fa-fire"></i>
                    <span>Barang</span>
                </a>
            </li>

            <li class="nav-item {{ $active == 'x' ? 'active' : '' }}">
                <a href="{{route('dashboard-admin')}}" class="nav-link">
                    <i class="fas fa-fire"></i>
                    <span>Transaksi</span>
                </a>
            </li>

            <li class="nav-item {{ $active == 'x' ? 'active' : '' }}">
                <a href="{{route('dashboard-admin')}}" class="nav-link">
                    <i class="fas fa-fire"></i>
                    <span>Penjulan</span>
                </a>
            </li>
            @endif
            {{-- @if (Auth()->user()->role == 'partner')



            @endif --}}
    </aside>
</div>