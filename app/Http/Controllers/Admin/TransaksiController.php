<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $data = Transaksi::with('barang')->whereIn('status', ['DIBAYAR', 'DIKIRIM'])->get();
        return view('pages.admin.transaksi.index', compact('data'));
    }

    public function pesanandikirim(Request $request, string $id)
    {
        //
        DB::table('transaksi')->where('uid_tr', $id)->update(['status' => 'DIKIRIM']);
        return redirect()->route('transaksi')->with('msg', "Status Pesanan Berhasil Di Ubah");
    }
}
