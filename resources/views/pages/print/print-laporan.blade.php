<!DOCTYPE html>
<html>

<head>
    <title>Laporan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
        .center {
            text-align: center;
        }

        .right {
            text-align: right;
        }

        .full {
            width: 100%;
        }

        .wrapper {
            padding-left: 30px;
            padding-right: 30px;
        }

        .underline {
            text-decoration: none;
        }

        .bt-1 {
            border-top: 1px solid black;

        }

        .bb-1 {
            border-bottom: 1px solid black;
        }

        .bb-2 {
            border-bottom: 2px solid black;
        }

        .mt-1 {
            margin-top: 3px
        }

        .mt-1 {
            margin-bottom: 3px
        }

        table tr td,
        table tr th {
            font-size: 9pt;
        }

        table tr th {
            font-weight: bold;
        }
    </style>

</head>

<body>
    <div class="center full" style="margin-top: 0px">
        <img style="display:inline-block; float:left;" src="assets/img/logo-kiwkiw@.png" alt="" width="151" height="90">

        <h5><strong>TOKO PAKDIO</strong></h5>
        <p>Jalan Sawah No.2B, Pegirian, Surabaya. <br>
            Telp: (021) 231074433 <br>
            Email: nandang@tokopakdio.com</p>
        <div class="bb-1" style="margin-top: 0px"></div>
        <div class="bb-2" style="margin-top: 1px"></div>
        <h5 class="mt-5"><strong><u>LAPORAN PENJUALAN PERIODE {{date('d-F-Y', strtotime($fromDate)) }} - {{date('d-F-Y', strtotime($toDate)) }} </u></strong>
        </h5>
    </div>
    <div class="wrapper bb-1">
        <table class="table table-bordered">
            <thead>
                <tr style="background-color: #6a7faf;">
                    <th scope="col">No. Order</th>
                    <th scope="col">Barang</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Harga</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($laporanPeriode))
                @foreach ($laporanPeriode as $data)
                <tr>
                    <td>{{ $data->uid_tr }}</td>
                    <td>{{ $data->barang['nama_barang'] }}</td>
                    <td>{{date('d-F-Y', strtotime($data->created_at)) }}</td>
                    <td>{{ $data->jumlah_item }}</td>
                    <td>@currency( $data->total_harga )</td>
                </tr>
                @endforeach
                @else
                @endif
            </tbody>

            <tfoot>
                <tr>
                    <th colspan="4" style="float: right;" class="right">Total Pendapatan :</th>
                    <th>@currency($totalPendapatan)</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="center mt-1">
        <p style="font-size: 10px;">Copyright © Nandangsec</p>
    </div>
</body>

</html>