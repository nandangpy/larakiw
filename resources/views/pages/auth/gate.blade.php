@extends('layouts.auth')
<style>
    .password-input {
        position: relative;
        width: 100%
    }

    .password-input .field-icon {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
    }
    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
        }
</style>

@section('content')
    {{-- REGISTER --}}
    <div class="form-container sign-up">
        <form action="/auth/register" method="POST">
            @csrf
            <div class="social-icons">
                <img src="{{asset('assets/img/logo-kiwkiw@.png')}}" alt="Logo" style="width: 50%;" class="center">
            </div>
            <span>or use your email for registeration</span>
            <input type="text" placeholder="Name" name="nama_lengkap">
            <input type="email" placeholder="Email" name="email_anda">
            <div class="password-input">
                <input type="password" placeholder="Password" id="passwordR" name="password_anda">
                <span toggle="#passwordR" class="eye-toggle fa fa-eye-slash field-icon toggle-password"></span>
            </div>
            

        <button type="submit">Daftar</button>
    </form>
</div>


    {{-- LOGIN --}}
    <div class="form-container sign-in">
        <form method="POST" action="/auth/login">
            @csrf
            {{-- <h1 class="text-center">TOKO PAK DIO</h1> --}}
            <div class="social-icons">
                <img src="{{asset('assets/img/logo-kiwkiw@.png')}}" alt="Logo" style="width: 50%;" class="center">
            </div>
            <span>Gunakan Email Password</span>
            <input id="email" type="email" class="form-control @error('email')is-invalid @enderror"
                placeholder="Masukan Email" name="email" value="{{ old('email') }}">
            <div class="password-input">
                <input id="password" type="password"
                    class="form-control password-field @error('password') is-invalid @enderror"
                    placeholder="Masukan Password" name="password" value="{{ old('password') }}">
                <span toggle="#password" class="eye-toggle fa fa-eye-slash fa-fw field-icon toggle-password"></span>
            </div>
            <button>Masuk</button>
            @if (session()->has('success'))
            @elseif(session()->has('loginError'))
                <div class="text-center mb-2"><span style="color:rgb(255, 56, 56)">Email atau Password Salah !</span></div>
            @endif
        </form>
    </div>

    <div class="toggle-container">
        <div class="toggle">
            <div class="toggle-panel toggle-left">
                <h1>TOKO MAINAN</h1>
                <p>Selamat berbelanja di TOKO PAKDIO</p>
                <button class="hidden" id="login">Masuk</button>
            </div>
            <div class="toggle-panel toggle-right">
                <p>Daftar disini jika tidak punya akun</p>
                <button class="hidden" id="register">Daftar</button>
            </div>

        </div>
    </div>
</div>
</div>
@endsection