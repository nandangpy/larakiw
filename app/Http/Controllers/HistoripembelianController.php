<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Transaksi;

class HistoripembelianController extends Controller
{
    //
    public function historypembelian()
    {
        //
        $data = Transaksi::with('barang')->where('id', Auth::user()->id)->whereIn('status', ['DITERIMA'])->get();
        return view('pages.public.historypembelian', compact('data'));
    }
}
