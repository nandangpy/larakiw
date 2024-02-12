@extends('layouts.front-main')

@section('container')
<!-- Main Content -->
<div class="main-content">
    <section class="section">

        <div class="section-body">
            <div class="invoice">
                <div class="invoice-print">


                    <div class="row">
                        <div class="col-md-12">
                            <div class="row mt-4">
                                <div class="col-lg-8">
                                    <div class="section-title">Nama Mainan</div>
                                    <p class="section-lead">The payment method that we provide is to make it easier for
                                        you to pay invoices.</p>
                                    <div class="images">
                                        <img src="assets/img/visa.png" alt="visa">
                                    </div>
                                </div>
                                <div class="col-lg-4 text-right">
                                    <div class="invoice-detail-item">

                                    </div>
                                    <div class="invoice-detail-item">
                                        {{-- <div class="invoice-detail-name">Shipping</div> --}}
                                        <div class="invoice-detail-value">Rp. 15.000 /unit</div>
                                    </div>
                                    <hr class="mt-2 mb-2">
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Jumlah Unit:</div>


                                        <div class="invoice-detail-value invoice-detail-value-lg">
                                            <input type="number">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="text-md-right">
                    <div class="float-lg-left mb-lg-0 mb-3">
                        {{-- <button class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i>
                            Print</button> --}}
                    </div>
                    <button class="btn btn-danger btn-icon icon-left"><i class="fas fa-times"></i> Batal</button>
                    <button class="btn btn-primary btn-icon icon-left"><i class="fas fa-credit-card"></i> Bayar
                        Sekarang</button>
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