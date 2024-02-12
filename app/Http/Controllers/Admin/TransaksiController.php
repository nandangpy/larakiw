<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $active = 'transaksi';
        $data = Transaksi::with('barang')->where('id', Auth::user()->id)->whereIn('status', ['DIBAYAR', 'DIKIRIM'])->get();
        return view('pages.admin.transaksi.index', compact('active', 'data'));
    }
}
