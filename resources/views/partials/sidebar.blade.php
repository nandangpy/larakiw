<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li>
                <a href="" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">
        @auth
        @if (Auth()->user())
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{asset('assets/img/avatar/avatar-2.png')}}" class="rounded-circle mr-1" />
                <div class="d-sm-none d-lg-inline-block">
                    <div class="d-sm-none d-lg-inline-block">Hallo, {{ auth()->user()->name }}</div>
                </div>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-divider"></div>

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

        @endauth
    </ul>
</nav>

<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href=""><img src="{{asset('assets/img/logo-kiwkiw@.png')}}" alt="logo" width="130" height="35px"></a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href=""><img src="{{asset('assets/img/logokota.png')}}" alt="logo" width="40" height="35px"></a>
        </div>

        <ul class="sidebar-menu">
            <hr>
            @if (Auth()->user()->role == 'admin')
            <li class="nav-item {{ (request()->is('admin/home*')) ? 'active' : '' }}">
                <a href="{{route('dashboard-admin')}}" class="nav-link">
                    <i class="fas fa-fire"></i>
                    <span>Dashboard Admin</span>
                </a>
            </li>

            <li class="nav-item {{ (request()->is('admin/kategoribarang*')) ? 'active' : '' }}">
                <a href="{{route('kategoribarang.index')}}" class="nav-link">
                    <i class="fas fa-fire"></i>
                    <span>Kategori Barang</span>
                </a>
            </li>

            <li class="nav-item {{ (request()->is('admin/barang*')) ? 'active' : '' }}">
                <a href="{{route('barang.index')}}" class="nav-link">
                    <i class="fas fa-fire"></i>
                    <span>Barang</span>
                </a>
            </li>

            <li class="nav-item {{ (request()->is('admin/transaksi*')) ? 'active' : '' }}">
                <a href="{{route('transaksi')}}" class="nav-link">
                    <i class="fas fa-fire"></i>
                    <span>Transaksi</span>
                </a>
            </li>

            <li class="nav-item {{ (request()->is('admin/penjualan*')) ? 'active' : '' }}">
                <a href="{{route('penjualan')}}" class="nav-link">
                    <i class="fas fa-fire"></i>
                    <span>Penjualan</span>
                </a>
            </li>
            @endif
    </aside>
</div>