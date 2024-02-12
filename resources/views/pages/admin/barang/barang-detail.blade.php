@extends('layouts.back-main')

@section('container')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Datail Barang</h1>
        </div>
        {{-- --}}

        <div class="row d-flex justify-content-center mt-5">
            <div class="col-lg-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Detail Mainan</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <table class="table-borderless">
                                    <tbody style="height: 60px">
                                        <tr>
                                            <th scope="row">Nama Barang</th>
                                            <td>: {{ $data->nama_barang }}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">Harga</th>
                                            <td>: @currency($data->harga_barang)</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">Stok</th>
                                            <td>: {{ $data->stok_barang }} Unit</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">Deskripsi</th>
                                            <td>: {{ $data->deskripsi_barang }}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                            <div class="col-sm-6">

                                <div class="card">
                                    <div class="chocolat-parent">
                                        <a href="{{asset('storage/uploads/images/barang/'.$data->foto_barang)}}"
                                            class="chocolat-image" title="Lihat">
                                            <div data-crop-image="100">
                                                <img alt="image"
                                                    src="{{asset('storage/uploads/images/barang/'.$data->foto_barang)}}"
                                                    class="img-fluid">
                                            </div>
                                        </a>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="card-footer">
                        <a href="{{route('barang.index')}}" class="btn btn-danger text-right"><i
                                class="fa-regular fa-circle-left"></i>
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection