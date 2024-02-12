@extends('layouts.front-main')

@section('container')
<!-- Main Content -->
<div class="main-content">
    <section class="section">

        <div class="section-body">
            <div class="invoice">
                <div class="invoice-print">

                    <div class="row mt-4">
                        <div class="col-md-12">
                          <div class="section-title">Detail Pesanan Anda:</div>

                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-md">
                                    <tr>
                                        <th>Barang</th>
                                        <th class="text-center">Jumlah</th>
                                        <th class="text-right">Total Harga</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-right">Acc Penerimaan Barang</th>
                                    </tr>


                                    @foreach ($data as $itemdata)
                                    <tr>
                                        <td>{{ $itemdata->barang['nama_barang'] }}</td>   
                                        <td class="text-center">{{ $itemdata->jumlah_item }}</td>
                                        <td class="text-right">@currency( $itemdata->total_harga )</td>
                                        <td class="text-center">
                                            @if ($itemdata->status == 'DIBAYAR')
                                            <div class="badge badge-primary">DIBAYAR</div>
                                            @else
                                            <div class="badge badge-primary">DIKIRIM</div>
                                            @endif
                                        </td>

                                        <td class="text-right">
                                            {{-- TAMPIL SAAT STATUS DIKIRIM --}}
                                            @if ($itemdata->status == 'DIBAYAR')
                                            <form method="POST" action="{{route('pesanan-diterima', [$itemdata->uid_tr])}}" method="POST"
                                                enctype="multipart/form-data">{{method_field("PUT")}}@csrf
                                                <button type="submit" class="btn btn-sm btn-info">
                                                    <i class="fas fa-check"></i> Pesanan Diterima
                                                </button>
                                            </form>
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