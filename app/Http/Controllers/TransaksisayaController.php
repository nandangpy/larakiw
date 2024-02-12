<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaksi;

class TransaksisayaController extends Controller
{
    //
    public function transaksisaya()
    {
        //
        $active = 'transaksi';
        $data = Transaksi::with('barang')->where('id', Auth::user()->id)->whereIn('status', ['DIBAYAR', 'DIKIRIM'])->get();
        return view('pages.public.pesanan-saya', compact('active', 'data'));
        // return view('pages.public.transaksi');
    }


    public function pesananditerima(Request $request, string $id)
    {
        //
        $active = 'transaksi';
        $data = Transaksi::with('barang')->where('id', Auth::user()->id)->whereIn('status', ['DIBAYAR', 'DIKIRIM'])->get();
        // dd($data);
        return view('pages.public.pesanan-saya', compact('active', 'data'));
        // return view('pages.public.transaksi');
    }
}
