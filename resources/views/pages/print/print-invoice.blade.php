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

        .mt-5 {
            margin-top: 10px
        }

        .mt-1 {
            margin-bottom: 3px
        }

        .left {
            text-align: left;
        }

        table tr th {
            font-weight: bold;
        }

        table.header td,
        table.header th {
            border: 0px solid rgb(150, 150, 150);
            font-size: 10pt;
        }

        table.report {
            border-collapse: collapse;
        }

        table.report td,
        table.report th {
            border: 1px solid rgb(150, 150, 150);
            border-right: 0px solid;
            padding: 5px;
            font-size: 12pt;
        }


        table.report td.no-bottom {
            border-bottom: 0px solid;
        }

        table.report td.no-top {
            border-top: 0px solid;
        }


        table.report td.no-left {
            border-left: 0px solid;
        }

        td.small {
            min-width: 100px;
        }

        td.normal {
            min-width: 200px;
        }

        td.middle {
            min-width: 300px;
        }

        td.extended {
            min-width: 400px;
        }

        td.strong {
            font-weight: bold;
            font-size: 10pt;
        }

        td.vatop {
            vertical-align: text-top !important;
        }
    </style>

</head>

<body>
    <div class="mt-5">
        <table class="header full">

            <tr>
                <td rowspan="2" class="extended"><img style="display:inline-block;" src="assets/img/logo-srm.png" alt=""
                        width="170" height="80"></td>
                <td>
                    <h5><strong>TOKO PAKDIO</strong></h5>
                </td>
            </tr>
            <tr>
                <td class="normal">
                    Jalan Gubeng Kertajaya IX No.5B, Airlangga, Kec. Gubeng, Kota Surabaya. <br>
                    Telp: (031) 80202023 <br>
                    Email: sysadmin@srm.com <br>
                </td>
            </tr>
        </table>
    </div>


    <div class="wrapper mt-1">
        <h3><strong style="color: grey;">INVOICE</strong></h3>
        <table class="report full">
            <tr class="title">
                <td class="normal no-bottom no-left">Kepada</td>
                <td class="small no-bottom">Refrensi</td>
                <td class="small no-bottom">Tanggal Order</td>
            </tr>
            {{-- <tr>
                <td class="no-left no-top">
                    {{ $invoicePesanan->nama_lengkap }} <br>
                    {{ $invoicePesanan->alamat_customer }} <br>
                    Telp: {{ $invoicePesanan->nohp }} <br>
                    Email: {{ $invoicePesanan->email }}
                </td>
                <td class="no-top vatop">
                    {{ $invoicePesanan->order_number }}
                </td>

                <td class="no-top vatop">
                    {{ Carbon\Carbon::parse($invoicePesanan->order_date)->format('j F Y') }}
                </td>
            </tr> --}}
        </table>
    </div>

    <div class="wrapper mt-5">
        <table class="table table-bordered">
            <thead>
                <tr style="background-color: #e61c23; color: white">
                    <th scope="col">Merek</th>
                    <th scope="col">Product / Unit</th>
                    <th scope="col">Transmisi</th>
                    <th scope="col">Warna</th>
                    <th scope="col">Harga</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"> {{ $invoicePesanan->uid_tr }}</th>
                    {{-- <td> {{ $invoicePesanan->nama_mobil }}</td>
                    <td> @if ($invoicePesanan->transmisi == 'A') Automatic @else Manual @endif</td>
                    <td> {{ $invoicePesanan->warna_mobil }} </td> --}}
                    <td> @currency( $invoicePesanan->total_harga ) </td>
                </tr>
            </tbody>
        </table>

        <div class="mt-1" style="float: right;">
            {{-- <p class="center"><u>{{ $invoicePesanan->nama_staff }}</u><br><i>SUMBER REJEKI MOBIL</i></p> --}}
        </div>
    </div>
</body>

</html>