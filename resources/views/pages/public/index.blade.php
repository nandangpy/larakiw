@extends('layouts.front-main')

@section('container')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row-12">
            <div class="card">
                <div class="card-header">
                    <h4>Toko Mainan</h4>
                </div>
                <div class="card-body">
                    <nav class="navbar bg-primary">
                        <a class="navbar-brand" href="#">My App</a>
                        <form class="form-inline">
                            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-dark" type="submit">Search</button>
                        </form>
                    </nav>
                </div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Product</h2>

            <div class="row">

                @foreach ($data as $itemdata)
                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                    <article class="article">
                        <div class="article-header">
                            <div class="article-image"
                                data-background="{{asset('storage/uploads/images/barang/'.$itemdata->foto_barang)}}">
                            </div>
                            <div class="article-title">
                                <h2><a href="#">{{ $itemdata->nama_barang }}</a></h2>
                            </div>
                        </div>
                        <div class="article-details">
                            <p>{!! $itemdata->deskripsi_barang !!}</p>
                            {{-- <br> --}}
                            <h5>@currency($itemdata->harga_barang)</h5>
                            <div class="article-cta">
                                <a href="{{ route('beli', $itemdata->uid_b) }}" class="btn btn-primary">Beli</a>
                            </div>
                        </div>
                    </article>
                </div>
                @endforeach
            </div>

            <div class="row">
                <nav aria-label="...">
                    <ul class="pagination">
                        @if ($data->onFirstPage())
                            <li class="page-item disabled">
                                <a class="page-link" href="" tabindex="-1">Previous</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $data->previousPageUrl() }}" tabindex="-1">Previous</a>
                            </li>
                        @endif
                    
                        @for ($i = 1; $i <= $data->lastPage(); $i++)
                                <li class="page-item {{ $data->currentPage() == $i ? 'active' : '' }}"> 
                                    <a class="page-link" href="{{ $data->url($i) }}"> {{ $i }} </a>
                                </li>
                        @endfor

                        @if ($data->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $data->nextPageUrl() }}" tabindex="-1">Next</a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <a class="page-link" href="" tabindex="-1">Next</a>
                            </li>
                        @endif
                    </ul>
                </nav>
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