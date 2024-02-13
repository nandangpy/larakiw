@extends('layouts.back-main')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap4.min.css">

@stop

@section('container')
<!-- Main Content -->
<div class="main-content">

    <section class="section">
        <div class="section-header">
            <h1>Data Barang Terjual</h1>
        </div>
        <div class="row mt-4">
            <div class="col">
                @session('msg')
                <div class="alert alert-primary alert-dismissible fade show mt-2" role="alert">
                    {{ session('msg') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endsession

                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="card-body">
                                <form action="" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col form-group mb-0">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        Tanggal Awal
                                                    </div>
                                                </div>
                                                <input type="date" class="form-control datepicker" name="fromDate" required>
                                            </div>
                                        </div>
                                        <div class="col form-group mb-0">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        Tanggal Akhir
                                                    </div>
                                                </div>
                                                <input type="date" class="form-control datepicker" name="toDate" required>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="row my-2">
                                        <button type="submit" class="btn btn-outline-success m-1"><i class="fas fa-filter"></i>
                                            filter</button>
        
                                        <a href="" class="btn btn-outline-secondary m-1"><i
                                                class="fas fa-arrows-rotate"></i>
                                            Refresh
                                        </a>
                                        <button type="button" class="btn btn-outline-warning m-1" data-toggle="modal"
                                            data-target="#exampleModalCenter">
                                            <i class="far fa-file-alt"></i> Cetak Periode</button>
        
                                    </div>
                                </form>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-md" id="tblkate">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Barang</th>
                                        <th>Jumlah Item</th>
                                        <th>Total Harga</th>
                                        <th>Status Pesanan</th>
                                        <th class="text-center">Tanggal Order</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if (!empty($data))
                                    @foreach ($data as $item)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>

                                        <td>
                                            {{ $item->barang['nama_barang'] }}
                                        </td>

                                        <td>
                                            {{ $item->jumlah_item}}
                                        </td>

                                        <td>
                                            @currency($item->total_harga)
                                        </td>

                                        <td>
                                            @if ($item->status == 'DITERIMA')
                                            <div class="badge badge-success">Barang Diterima</div>
                                            @else
                                            <div class="badge badge-danger">Proses Pengiriman</div>
                                            @endif
                                        </td>

                                        <td class="text-center">
                                            {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y')}}
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else

                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    {{-- --}}

</div>

<div class="modal fade" tabindex="-1" role="dialog" id="exampleModalCenter">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cetak Periode</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('print-laporan') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    Tanggal Awal
                                </div>
                            </div>
                            <input type="date" class="form-control datepicker" name="tglAwal" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    Tanggal Akhir
                                </div>
                            </div>
                            <input type="date" class="form-control datepicker" name="tglAkhir" required>
                        </div>
                    </div>

                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="submit" class="btn btn-danger"><i class="fas fa-print"></i> Cetak</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection



{{-- Jika ada script tambahan Libreri --}}
@section('js-libraies')
<script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="assets/build/bootstrap-daterangepicker/daterangepicker.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#tblkate').DataTable( {
        pageLength : 5,
        lengthMenu: [[5, 10, 25, -1], [5, 10, 25, 50]],
        "language":{
            "url":"https://cdn.datatables.net/plug-ins/1.13.2/i18n/id.json",
            "sEmptyTable":"Tidak ada data"
        }
        });
        setInterval( function () {
            table.ajax.reload( null, false ); // user paging is not reset on reload
        }, 30000 );
    });
</script>
@endsection