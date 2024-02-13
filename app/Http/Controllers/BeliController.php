<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Barang;
use App\Models\Saldo;
use App\Models\Transaksi;

class BeliController extends Controller
{
    //
    public function beli(string $id)
    {
        //
        $data = Barang::findOrFail($id);
        return view('pages.public.beli', compact('data'));
    }

    public function belimainan(Request $request, string $id)
    {
        if (Auth::check()) {
            $data = Barang::findOrFail($id);
            $userSaldo = Saldo::select('total_saldo')->where('id', Auth::id())->first();
            $totalHarga = $data->harga_barang * $request->get('jumlah_unit');

            if ($userSaldo['total_saldo'] < $totalHarga) {
                echo "isi saldo";
                // REDIRECT KE SALDO
            } else {
                // Kurangi Saldo
                $sisaSaldo = $userSaldo['total_saldo'] - $totalHarga;
                // Kurangi Stok
                $sisaStok = $data->stok_barang - $request->get('jumlah_unit');

                // dd();
                $validator = Validator::make(request()->all(), [
                    'jumlah_unit' => 'required',
                    'alamat' => 'required|max:225',
                ]);

                if ($validator->fails()) {
                    return back()->withErrors($validator->errors())->withInput();
                } else {

                    DB::table('saldo')->where('id', Auth::id())->update(['total_saldo' => $sisaSaldo]);
                    DB::table('barang')->where('uid_b', $data->uid_b)->update(['stok_barang' => $sisaStok]);
                    $data = new Transaksi();
                    $data->id = Auth::id();
                    $data->uid_b = $id;
                    $data->jumlah_item = $request->get('jumlah_unit');
                    $data->total_harga = $totalHarga;
                    $data->alamat_pembeli = $request->get('alamat');
                    $data->status = 'DIBAYAR';
                    $data->save();
                    return redirect()->route('pesanan-saya')->with('msg', "Data Berhasil Disimpan");
                }
            }
            
        } else {
            return redirect('/auth/login');
        }
        // dd($request->all());
    }
}
