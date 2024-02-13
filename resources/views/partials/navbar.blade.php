<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <a href="/" class="navbar-brand sidebar-gone-hide">DioMart</a>


    <div class="nav-collapse">
        <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="">
            <i class="fas fa-ellipsis-v"></i>
        </a>
        <ul class="navbar-nav">
            <li class="nav-item {{ (request()->is('/')) ? 'active' : '' }}"><a href="/" class="nav-link">Beranda</a></li>
            <li class="nav-item {{ (request()->is('tentang')) ? 'active' : '' }}"><a href="{{route('tentang-kami')}}"
                    class="nav-link">Tentang Kami</a></li>
            <li class="nav-item {{ (request()->is('kontak')) ? 'active' : '' }}"><a href="{{route('kontak-kami')}}"
                    class="nav-link">Kontak</a></li>
        </ul>
    </div>

    <form class="form-inline ml-auto">
        <ul class="navbar-nav">
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none">
                    <i class="fas fa-search"></i></a></li>
        </ul>

    </form>


    <ul class="navbar-nav navbar-right">

        @guest

        <li><a href="{{ route('login') }}" class="nav-link"><i class="fas fa-sign-out-alt"></i> LOGIN</a></li>

        @else
        <li class="dropdown">
            <a href="" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">Hi !!</div>
                <a href="{{route('pesanan-saya')}}" class="dropdown-item has-icon {{ (request()->is('pesanan-saya*')) ? 'active' : '' }}">
                    <i class="fas fa-shopping-bag"></i> Pesanan Saya
                </a>
                <a href="{{route('historypembelian-saya')}}" class="dropdown-item has-icon {{ (request()->is('historypembelian-saya*')) ? 'active' : '' }}">
                    <i class="fas fa-archive"></i> Riwayat Belanja
                </a>
                <div class="dropdown-divider"></div>

                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item text-danger">
                        <i class="text-danger fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </li>
        @endguest


    </ul>
</nav>