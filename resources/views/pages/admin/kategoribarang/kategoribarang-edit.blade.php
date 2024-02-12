@extends('layouts.back-main')

@section('container')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Edit Jenis Mainan</h1>
        </div>

        <div class="row mt-4 d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="card card-primary">

                    <form method="POST" action="{{route('kategoribarang.update', [$data->uid_bk])}}"
                        enctype="multipart/form-data">{{method_field("PUT")}}@csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="nama_kategori"
                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Nama Kategori<span style="color:red;">*</span>
                                </label>
                                <div class="col-8">
                                    <input id="nama_kategori" type="text"
                                        class="form-control @error('nama_kategori')is-invalid @enderror"
                                        name="nama_kategori" value="{{ $data->nama_kategori }}">
                                    @error('nama_kategori')
                                    <span class="has-error">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary btn-sm">
                                Simpan
                            </button>

                            <a href="{{route('kategoribarang.index')}}" class="btn btn-danger btn-sm">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection