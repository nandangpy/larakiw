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
            <h1>Kategori Barang</h1>
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
                        <a href="{{ route('kategoribarang.create') }}" class="btn btn-primary mb-4"><i
                                class="fas fa-plus-circle"></i> Jenis Kategori</a>

                        <div class="table-responsive">
                            <table class="table table-bordered table-md" id="tblkate">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Kategori Barang</th>
                                        <th class="text-center">Aksi</th>
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
                                            {{ $item->nama_kategori }}
                                        </td>

                                        <td class="text-center">
                                            <form action="{{ route('kategoribarang.destroy', $item->uid_bk) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('kategoribarang.show', $item->uid_bk) }}"
                                                    class="btn btn-sm btn-info"><i class="fas fa-info-circle"></i></a>
                                                <a href="{{ route('kategoribarang.edit', $item->uid_bk) }}"
                                                    class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                                <button type="submit" class="btn btn-sm btn-danger"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
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
@endsection



{{-- Jika ada script tambahan Libreri --}}
@section('js-libraies')
<script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>

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

{{-- Jika ada script tambahan Specifik --}}
@section('js-specific')
{{-- <script src="/assets/js/chartJS-module.js">
</script> --}}
@endsection