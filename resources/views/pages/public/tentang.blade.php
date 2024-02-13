@extends('layouts.front-main')

@section('container')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row-12">

            <h2 class="section-title">Tentang Kami</h2>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>VISI</h4>
                        </div>
                        <div class="card-body">
                            <p>Sunt in culpa qui officia deserunt mollit anim id est laborum:</p>
                            <ul>
                                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</li>
                                <li>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>MISI</h4>
                        </div>
                        <div class="card-body">
                            <p>Sunt in culpa qui officia deserunt mollit anim id est laborum:</p>
                            <ol>
                                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</li>
                                <li>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</li>
                                <li>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</li>
                                <li>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</li>
                                <li>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</li>
                                <li>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>
                                <li>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</li>
                            </ol>
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