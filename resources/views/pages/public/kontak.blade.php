@extends('layouts.front-main')

@section('container')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row-12">

            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-md-10 offset-md-1 col-lg-10 offset-lg-1">
                        <div class="login-brand">
                            TOKO PAKDIO
                        </div>

                        <div class="card card-primary">
                            <div class="row m-0">
                                <div class="col-12 col-md-12 col-lg-5 p-0">
                                    <div class="card-header text-center">
                                        <h4>Kontak Kami</h4>
                                    </div>
                                    <div class="card-body">
                                        <form method="">
                                            <div class="form-group floating-addon">
                                                <label>Name</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="far fa-user"></i>
                                                        </div>
                                                    </div>
                                                    <input id="name" type="text" class="form-control" name="name"
                                                        autofocus placeholder="Name">
                                                </div>
                                            </div>

                                            <div class="form-group floating-addon">
                                                <label>Email</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-envelope"></i>
                                                        </div>
                                                    </div>
                                                    <input id="email" type="email" class="form-control" name="email"
                                                        placeholder="Email">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Message</label>
                                                <textarea class="form-control" placeholder="Type your message"
                                                    data-height="150"></textarea>
                                            </div>

                                            <div class="form-group text-right">
                                                <button type="submit" class="btn btn-round btn-lg btn-primary">
                                                    Send Message
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-7 p-0">
                                    <div id="map" class="contact-map"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
<footer class="main-footer">
    <div class="footer-left">
        Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://-">31</a>
    </div>
    <div class="footer-right">

    </div>
</footer>

@endsection


{{-- Jika ada script tambahan Libreri --}}
@section('js-libraies')
{{-- <script type="text/javascript" src="/assets/build/chartJS/chart.min.js"></script> --}}
@endsection

{{-- Jika ada script tambahan Specifik --}}
@section('js-specific')

@endsection