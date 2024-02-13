@extends('layouts.front-main')

@section('container')
<!-- Main Content -->
<div class="main-content">
    <section class="section">

        @session('msg')
        <div class="alert alert-primary alert-dismissible fade show mt-2" role="alert">
            {{ session('msg') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endsession

        <div class="section-body">
            <div class="invoice">
                <div class="invoice-print">
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="section-title">Riwayat Belanja:</div>

                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-md">
                                    <tr>
                                        <th>Barang</th>
                                        <th class="text-center">Jumlah</th>
                                        <th class="text-right">Total Harga</th>
                                        <th class="text-center">Status</th>
                                    </tr>

                                    @foreach ($data as $itemdata)
                                    <tr>
                                        <td>{{ $itemdata->barang['nama_barang'] }}</td>
                                        <td class="text-center">{{ $itemdata->jumlah_item }}</td>
                                        <td class="text-right">@currency( $itemdata->total_harga )</td>
                                        <td class="text-center">
                                            @if ($itemdata->status == 'DITERIMA')
                                            <div class="badge badge-success">Barang Diterima</div>
                                            @else
                                            <div class="badge badge-danger">Barang Ditolak</div>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach

                                </table>
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