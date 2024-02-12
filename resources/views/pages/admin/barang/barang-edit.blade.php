@extends('layouts.back-main')

@section('container')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Edit Barang Mainan</h1>
        </div>

        <div class="row mt-4 d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="card card-primary">

                    <form method="POST" action="{{route('barang.update', [$data->uid_b])}}" method="POST"
                        enctype="multipart/form-data">{{method_field("PUT")}}@csrf
                        <div class="card-body">

                            <div class="form-group row">
                                <label for="id_jenis_barang"
                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Jenis Barang<span style="color:red;">*</span>
                                </label>
                                <div class="col-8">
                                    <select class="form-control select2" name="id_jenis_barang" id="id_jenis_barang">
                                        @foreach ($datajenis as $item)
                                        <option value="{{ $item->uid_bk }}" {{ $item->uid_bk == $data->uid_bk ?
                                            'selected' : ''}}> {{ $item->nama_kategori}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_jenis_barang')
                                    <span class="has-error">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nama_barang" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Nama Barang<span style="color:red;">*</span>
                                </label>
                                <div class="col-8">
                                    <input id="nama_barang" type="text"
                                        class="form-control @error('nama_barang')is-invalid @enderror"
                                        name="nama_barang" value="{{ $data->nama_barang }}">
                                    @error('nama_barang')
                                    <span class="has-error">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="deskripsi_barang"
                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Deskripsi<span style="color:red;">*</span>
                                </label>
                                <div class="col-8">
                                    <textarea id="deskripsi_barang" type="text"
                                        class="form-control @error('deskripsi_barang')is-invalid @enderror"
                                        name="deskripsi_barang" value="{{ old('deskripsi_barang') }}"
                                        style="height:50px;">{!!$data->deskripsi_barang!!}</textarea>
                                    @error('deskripsi_barang')
                                    <span class="has-error">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="harga_barang" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Harga<span style="color:red;">*</span>
                                </label>
                                <div class="col-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Rp</div>
                                        </div>
                                        <input id="harga_barang" type="number" min="1"
                                            class="form-control currency @error('harga_barang')is-invalid @enderror"
                                            name="harga_barang" value="{{ $data->harga_barang }}">
                                    </div>
                                    @error('harga_barang')
                                    <span class="has-error">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="stok_barang" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Stok<span style="color:red;">*</span>
                                </label>
                                <div class="col-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-th-large"></i></div>
                                        </div>
                                        <input id="stok_barang" type="number" min="1"
                                            class="form-control currency @error('stok_barang')is-invalid @enderror"
                                            name="stok_barang" value="{{ $data->stok_barang }}">
                                    </div>
                                    @error('stok_barang')
                                    <span class="has-error">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row{{ $errors->has('gambar_barang') ? ' has-error' : '' }}">
                                <label for="gambar_barang"
                                    class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar
                                </label>
                                <div class="col-8">
                                    <input id="gambar_barang" name="gambar_barang" type="file" class="form-control">
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        Pastikan ekstensi file [.jpeg .jpg atau .png]
                                    </small>
                                    @error('gambar_barang')
                                    <span class="has-error">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        <img src="{{asset('storage/uploads/images/barang/'.$data->foto_barang)}}"
                                            width="70px" height="70px" alt="foto lama">
                                        Gambar saat ini.
                                    </small>
                                </div>
                            </div>


                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary btn-sm">
                                Simpan
                            </button>

                            <a href="{{route('barang.index')}}" class="btn btn-danger btn-sm">
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