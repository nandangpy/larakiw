<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf;

class TransaksisayaController extends Controller
{
    //
    public function transaksisaya()
    {
        //
        $data = Transaksi::with('barang')->where('id', Auth::user()->id)->whereIn('status', ['DIBAYAR', 'DIKIRIM'])->get();
        return view('pages.public.pesanan-saya', compact('data'));
    }

    public function pesananditerima(Request $request, string $id)
    {
        //
        DB::table('transaksi')->where('uid_tr', $id)->update(['status' => 'DITERIMA']);
        return redirect()->route('historypembelian-saya')->with('msg', "Pesanan Selesai");
    }

    public function cetakinvoice(string $id)
    {
        //
        $invoicePesanan = Transaksi::with('barang')->where('uid_tr', $id)->whereIn('status', ['DIBAYAR'])->first();
        $pdf = Pdf::loadView('pages.print.print-invoice', ['invoicePesanan' => $invoicePesanan]);
        $docName = $invoicePesanan->uid_tr . '-' . 'Invoice';
        return $pdf->stream($docName);
    }
}
