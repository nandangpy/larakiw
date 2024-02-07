@extends('layouts.back-main')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap4.min.css">
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
                {{-- @if (session('msg'))
                    <div class="alert alert-primary alert-dismissible fade show mt-2" role="alert">
                        {{ session('msg') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif --}}

                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('kategoribarang.create') }}" class="btn btn-primary mb-4"><i class="fas fa-plus-circle"></i> Jenis Kategori</a>

                        <div class="table-responsive">
                            <table class="table table-bordered table-md" id="#table-1">
                                <tbody>
                                    <tr>
                                        <th>No.</th>
                                        <th>Kategori Barang</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                    
                                    @if (!empty($data))
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                {{ $item->nama_kategori }}
                                            </td>
                                            
                                            {{-- @php
                                                $detail = DB::table('detail_transaksi')
                                                    ->where('id_layanan', $data->id_layanan)
                                                    ->first();
                                            @endphp --}}
                                            <td>
                                                <form action="{{ route('kategoribarang.destroy', $data->uid_bk) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('kategoribarang.show', $data->uid_bk) }}"
                                                        class="btn btn-sm btn-info"><i class="fas fa-info-circle"></i></a>
                                                    <a href="{{ route('kategoribarang.edit', $data->uid_bk) }}"
                                                        class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                                    @if (empty($detail))
                                                        <button type="submit"
                                                            class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                                    @else
                                                    @endif
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
{{-- <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js">
</script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap4.min.js">
</script> --}}
@endsection

{{-- Jika ada script tambahan Specifik --}}
@section('js-specific')
{{-- <script src="/assets/js/chartJS-module.js">

</script> --}}
<script>
    $(document).ready(function() {
        $("#table-1").dataTable({
            "columnDefs": [
                { "sortable": false, "targets": [2,3] }
            ]
        });
    });
</script>

@endsection

@push('scripts')
<script src="{{ asset('backoffice/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
<script src="{{ asset('backoffice/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
<script src="{{ asset('backoffice/js/pages/simple-datatables.js') }}"></script>
@endpush