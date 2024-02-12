@extends('layouts.front-main')

@section('container')
<!-- Main Content -->
<div class="main-content">
    <section class="section">

        <div class="section-body">
            <div class="invoice">
                <div class="invoice-print">

                <form method="POST" action="{{route('beli-mainan', [$data->uid_b])}}" method="POST" enctype="multipart/form-data">{{method_field("PUT")}}@csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row mt-4">
                                <div class="col-lg-8">
                                    <div class="section-title">{{ $data->nama_barang}}</div>
                                    <p class="section-lead">{{ $data->deskripsi_barang}}.</p>
                                    <div class="images">
                                        <img src="{{asset('storage/uploads/images/barang/'.$data->foto_barang)}}" width="200px" alt="visa">
                                    </div>
                                </div>
                                <div class="col-lg-4 text-right">
                                    <div class="invoice-detail-item">

                                    </div>
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-value">@currency( $data->harga_barang ) /Pcs</div>
                                    </div>
                                    <hr class="mt-2 mb-2">
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Masukan Jumlah & Alamat Pengiriman:</div>

                                        <div class="invoice-detail-value invoice-detail-value-lg">
                                            <div class="form-group row">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">Jumlah Pcs<span style="color:red;">*</span></div>
                                                    </div>
                                                    <input id="jumlah_unit" type="number" min="1" max="{{ $data->stok_barang}}"
                                                        class="form-control currency @error('jumlah_unit')is-invalid @enderror"
                                                        name="jumlah_unit" value="1">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">Alamat<span style="color:red;">*</span></div>
                                                    </div>
                                                    <input id="alamat" type="text" class="form-control @error('alamat')is-invalid @enderror"
                                                        name="alamat" value="{{ old('alamat') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="text-md-right">
                    <div class="float-lg-left mb-lg-0 mb-3"></div>
                    <a href="/" class="btn btn-danger btn-icon icon-left"><i class="fas fa-times"></i> Batal</a>
                    @auth
                    <button class="btn btn-primary btn-icon icon-left"><i class="fas fa-credit-card"></i> Bayar Sekarang</button>
                    @else
                    <a href="{{route('login')}}" class="btn btn-success btn-icon icon-left"><i class="fas fa-sign-out-alt"></i> Lakukan login terlebih dahulu</a>
                    @endauth
                </div>
                </form>
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