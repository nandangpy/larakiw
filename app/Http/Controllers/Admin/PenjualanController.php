<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

        // dd($totalPendapatan);
        $pdf = Pdf::loadView('pages.print.print-laporan', [
            'laporanPeriode' => $laporanPeriode,
            'fromDate' => $fromDate,
            'toDate' => $toDate,
            'totalPendapatan' => $totalPendapatan
        ]);
        $docName = $toDate . '-' . 'Laporan-All';
        return $pdf->stream($docName);
    }
}
