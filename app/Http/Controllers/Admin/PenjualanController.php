<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Transaksi;

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

    public function filterPeriode(Request $request)
    {
        dd($request->all());
        $tglAwal = $request->get('fromDate');
        $tglAkhir = $request->get('toDate');

        $data = Transaksi::with('barang')->whereIn('status', ['DITERIMA'])
            ->whereBetween('created_at', [$tglAwal, $tglAkhir])
            ->orderBy('created_at', 'ASC')
            ->get();
        
        dd($data);
        return view('pages.admin.penjualan.index', [
            'data' => $data
        ]);
    }
}
