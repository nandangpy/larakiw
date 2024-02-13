<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf;

class PenjualanController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Transaksi::with('barang')->whereIn('status', ['DITERIMA'])->get();
        return view('pages.admin.penjualan.index', compact('data'));
    }

    public function filterperiode(Request $request)
    {

        $tglAwal = $request->get('fromDate');
        $tglAkhir = $request->get('toDate');

        $data = Transaksi::with('barang')->whereIn('status', ['DITERIMA'])
            ->whereBetween('created_at', [$tglAwal, $tglAkhir])
            ->orderBy('created_at', 'ASC')
            ->get();

        return view('pages.admin.penjualan.index', [
            'data' => $data
        ]);
    }

    public function cetaklaporanperiode(Request $request)
    {

        $fromDate = $request->get('tglAwal');
        $toDate = $request->get('tglAkhir');

        $laporanPeriode = Transaksi::with('barang')->whereIn('status', ['DITERIMA'])
            ->whereBetween('created_at', [$fromDate, $toDate])
            ->orderBy('created_at', 'ASC')
            ->get();

        $totalPendapatan = $laporanPeriode->sum('total_harga');

        $pdf = Pdf::loadView('pages.print.print-laporan', [
            'laporanPeriode' => $laporanPeriode,
            'fromDate' => $fromDate,
            'toDate' => $toDate,
            'totalPendapatan' => $totalPendapatan
        ]);
        $docName = $toDate . '-' . 'Laporan-All';
        return $pdf->stream($docName);
    }

    public function cetaklaporanharian()
    {

        $tanggal = Carbon::today();
        $laporanPeriode = Transaksi::with('barang')->whereIn('status', ['DITERIMA'])->whereDate('created_at', $tanggal)->get();
        $totalPendapatan = $laporanPeriode->sum('total_harga');

        $pdf = Pdf::loadView('pages.print.print-laporan', [
            'laporanPeriode' => $laporanPeriode,
            'toDate' => $tanggal,
            'totalPendapatan' => $totalPendapatan
        ]);
        $docName = $tanggal . '-' . 'Laporan-Harian';
        return $pdf->stream($docName);
    }

    public function cetaklaporanbulanan()
    {

        $bulanIni = Carbon::now()->format('m');
        $laporanPeriode = Transaksi::with('barang')->whereIn('status', ['DITERIMA'])->whereMonth('created_at', $bulanIni)->get();
        $totalPendapatan = $laporanPeriode->sum('total_harga');

        // dd(Carbon::createFromFormat('!m', $bulanIni)->format('F'));
        $pdf = Pdf::loadView('pages.print.print-laporan', [
            'laporanPeriode' => $laporanPeriode,
            'toMonth' => Carbon::createFromFormat('!m', $bulanIni)->format('F'),
            'totalPendapatan' => $totalPendapatan
        ]);
        $docName = $bulanIni . '-' . 'Laporan-Bulanan';
        return $pdf->stream($docName);
    }
}
