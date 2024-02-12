<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <a href="/" class="navbar-brand sidebar-gone-hide">DioMart</a>


    <div class="nav-collapse">
        <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
            <i class="fas fa-ellipsis-v"></i>
        </a>
        <ul class="navbar-nav">
            <li class="nav-item active"><a href="/" class="nav-link">Beranda</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Tentang Kami</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Kontak</a></li>
        </ul>
    </div>

    <form class="form-inline ml-auto">
        <ul class="navbar-nav">
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                        class="fas fa-search"></i></a></li>
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
                <div class="dropdown-title">Logged in 5 min ago</div>
                <a href="features-profile.html" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>
                <div class="dropdown-divider"></div>

                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item text-danger">
                        <i class="text-danger fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>

                {{-- <a href="#" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a> --}}
            </div>
        </li>
        @endguest


    </ul>
</nav>