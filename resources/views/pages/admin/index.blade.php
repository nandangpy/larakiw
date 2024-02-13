@extends('layouts.back-main')

@section('container')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
          <h1>Dashboard</h1>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
              <div class="card-icon bg-primary">
                <i class="fas fa-dollar-sign"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Total Sales Bulan Ini</h4>
                </div>
                <div class="card-body">
                  @currency($totalSalesbulanini)
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
              <div class="card-icon bg-success">
                <i class="fas fa-archive"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Barang Terjual Bulan Ini</h4>
                </div>
                <div class="card-body">
                  {{ $jumlahTransaksibulanini }}
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
              <div class="card-icon bg-danger">
                <i class="fas fa-dollar-sign"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Total Sales Bulan Lalu</h4>
                </div>
                <div class="card-body">
                  @currency($totalSalesbulanlalu)
                </div>
              </div>
            </div>
          </div>
          
        </div>
        <div class="row">
          <div class="col-lg-8 col-md-12 col-12 col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4>Statistics</h4>
                <div class="card-header-action">
                  <div class="btn-group">
                    <a href="#" class="btn btn-primary">Week</a>
                    <a href="#" class="btn">Month</a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <canvas id="myChart" height="182"></canvas>
                <div class="statistic-details mt-sm-4">
                  <div class="statistic-details-item">
                    <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 7%</span>
                    <div class="detail-value">$243</div>
                    <div class="detail-name">Dinamis</div>
                  </div>
                  <div class="statistic-details-item">
                    <span class="text-muted"><span class="text-danger"><i class="fas fa-caret-down"></i></span> 23%</span>
                    <div class="detail-value">$2,902</div>
                    <div class="detail-name">Dinamis</div>
                  </div>
                  <div class="statistic-details-item">
                    <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span>9%</span>
                    <div class="detail-value">$12,821</div>
                    <div class="detail-name">Dinamis</div>
                  </div>
                  <div class="statistic-details-item">
                    <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 19%</span>
                    <div class="detail-value">$92,142</div>
                    <div class="detail-name">Dinamis</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-12 col-12 col-sm-12">
            <div class="card">
              <div class="card-header">
                <h4>Transaksi Terbaru</h4>
              </div>
              <div class="card-body">             
                <ul class="list-unstyled list-unstyled-border">

                  @foreach ($transaksibaru as $itemdata)
                  <li class="media">
                    {{-- <img class="mr-3 rounded-circle" width="50" src="assets/img/avatar/avatar-1.png" alt="avatar"> --}}
                    <div class="media-body">
                      <div class="float-right text-primary">{{ $itemdata->jumlah_item }} PCS</div>
                      <div class="media-title"><strong>BARANG: </strong> {{ $itemdata->barang['nama_barang'] }}</div>
                      <span class="text-small text-muted">Sudah Dibayar</span>
                    </div>
                  </li>
                  @endforeach
                </ul>

                <div class="text-center pt-1 pb-1">
                  <a href="{{ route('transaksi')}}" class="btn btn-primary btn-lg btn-round"> Lihat Semua </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</div>
@endsection

{{-- Jika ada script tambahan Libreri --}}
@section('js-libraies')
<script type="text/javascript" src="/assets/build/chartJS/chart.min.js"></script>
@endsection

{{-- Jika ada script tambahan Specifik --}}
@section('js-specific')


@endsection