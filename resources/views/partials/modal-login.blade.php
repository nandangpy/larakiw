<!--modal style 3 start -->
<!-- login modal 3 -->
<div id="loginModal" class="modal-style-3 dark modal ">
    <div class="modal-dialog modal-login">
        <div class="modal-content pt-3">
            <div class="modal-header p-0">
                <!-- include your company logo here  -->
                <h4 class="modal-title"><img src="{{asset('assets/img/logokota.png')}}" width="150px" height="100"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>

            <div class="modal-body">
                <p class="ml-3 font-italic">SELAMAT DATANG</p>

                <hr>
                <!-- dont forget to add action and action method  -->
                <form method="POST" action="/auth/login">@csrf
                    <div class="form-group">
                        <input id="email" type="email" class="form-control @error('email')is-invalid @enderror"
                            placeholder="Masukan Email" name="email" value="{{ old('email') }}">
                        <i class="ti-email"></i>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="password" type="password" class="form-control @error('password')is-invalid @enderror"
                            placeholder="Masukan Password" name="password" value="{{ old('password') }}">
                        <i class="ti-lock"></i>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>

                    {{-- <div class="row">
                        <div class="col text-left">
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="item_checkbox"
                                    name="item_checkbox" value="option1">
                                <span class="custom-control-label">&nbsp;Remember Me</span>
                            </label>
                        </div>
                        <div class="col text-right">
                            <a href="" class="text-danger">Forgot Password ?</a>
                        </div>
                    </div> --}}
                    <div class="form-group text-center mt-3">
                        <!-- submit button -->
                        <button id="signup-button" type="submit" class="btn btn-primary btn-signin">Masuk</button>
                    </div>
                </form>
            </div>

            @if (session()->has('success'))
            @elseif(session()->has('loginError'))
            <div class="text-center mb-2"><Strong style="color:rgb(255, 56, 56)">Email password Salah !</Strong></div>
            @endif
            <div class="text-center mb-3">Belum punya akun? <a class="register" href="#registerModal"
                    data-dismiss="modal" data-toggle="modal"><strong style="color: #0051e1">Daftar</strong></a>
            </div>
        </div>
    </div>
</div>

<!-- register modal 3 -->
<div id="registerModal" class="modal-style-3 dark modal ">
    <div class="modal-dialog modal-login">
        <div class="modal-content pt-3">
            <div class="modal-header p-0">
                <!-- add your own logo here  -->
                <h4 class="modal-title "><img src="{{asset('assets/img/logo-srm.png')}}" width="150px" height="39"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p class="ml-3 font-italic">DAFTAR SEKARANG</p>
                <hr>


                <form method="POST" action="/register">@csrf
                    <div class="form-group">
                        <input id="nama_lengkap" type="text"
                            class="form-control @error('nama_lengkap')is-invalid @enderror" name="nama_lengkap"
                            placeholder="Nama Anda" value="{{ old('nama_lengkap') }}">
                        <i class="ti-user"></i>
                        @error('nama_lengkap')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- <div class="form-group">
                        <input id="nohp" type="text" class="form-control @error('nohp')is-invalid @enderror" name="nohp"
                            placeholder="Nomer Telpon Anda" value="{{ old('nohp') }}">
                        <i class="ti-mobile"></i>
                        @error('nohp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div> --}}

                    {{-- <div class="form-group">
                        <input id="alamat" type="text" class="form-control @error('alamat')is-invalid @enderror"
                            name="alamat" placeholder="Alamat Anda" value="{{ old('alamat') }}">
                        <i class="ti-location-pin"></i>
                        @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div> --}}


                    <div class="form-group">
                        <input id="email_anda" type="email"
                            class="form-control @error('email_anda')is-invalid @enderror" name="email_anda"
                            placeholder="Email Anda" value="{{ old('email_anda') }}">
                        <i class="ti-email"></i>
                        @error('email_anda')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="password_anda" type="password"
                            class="form-control @error('password_anda')is-invalid @enderror" name="password_anda"
                            placeholder="Password" value="{{ old('password_anda') }}">
                        <i class="ti-lock"></i>
                        @error('password_anda')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="repassword" type="password"
                            class="form-control @error('repassword')is-invalid @enderror" placeholder="Ulangi Password"
                            name="repassword" value="">
                        <i class="ti-eye"></i>
                        @error('repassword')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group text-center mt-3">
                        <button id="signup-button" type="submit" class="btn btn-primary btn-signin">Daftar</button>
                    </div>
                </form>
                <div class="text-center mb-3">Sudah punya akun? <a class="login" href="#loginModal" data-dismiss="modal"
                        data-toggle="modal"><strong style="color: #0051e1">Masuk</strong></a></div>
            </div>
        </div>
    </div>
</div>

<!--modal style 3 end -->