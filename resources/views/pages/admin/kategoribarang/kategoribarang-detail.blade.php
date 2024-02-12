@extends('layouts.back-main')

@section('container')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Datail Kategori</h1>
        </div>
        {{-- --}}

        <div class="row d-flex justify-content-center mt-5">
            <div class="col-lg-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Kategori Mainan</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">

                                <table class="table-borderless">
                                    <tbody style="height: 60px">
                                        <tr>
                                            <th scope="row">Nama Kategori</th>
                                            <td>: {{ $data->nama_kategori }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                    <div class="card-footer">
                        <a href="{{route('kategoribarang.index')}}" class="btn btn-danger text-right"><i
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