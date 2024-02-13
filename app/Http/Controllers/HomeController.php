<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Transaksi;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return redirect(session()->get('url.intended'));
        // return view('pages.public.index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome(): View
    {
        $jumlahTransaksibulanini = Transaksi::whereYear('created_at', Carbon::now()->year)
                    ->whereMonth('created_at', Carbon::now()->month)->where('status', 'DITERIMA')->count();
        // Sales Bulan Ini
        $totalSalesbulanini = Transaksi::whereYear('created_at', Carbon::now()->year)
                    ->whereMonth('created_at', Carbon::now()->month)->where('status', 'DITERIMA')->sum('total_harga');

        // Sales Bulan Lalu
        $totalSalesbulanlalu = Transaksi::whereYear('created_at', Carbon::now()->subMonth()->year)
                    ->whereMonth('created_at', Carbon::now()->subMonth()->month)->sum('total_harga');

        $transaksibaru = Transaksi::with('barang')->where('status', 'DIBAYAR')->latest()->limit(3)->get();

        // dd($transaksibaru);
        return view('pages.admin.index', compact(
            'totalSalesbulanini',
            'totalSalesbulanlalu',
            'jumlahTransaksibulanini',
            'transaksibaru',
        ));
    }

}
