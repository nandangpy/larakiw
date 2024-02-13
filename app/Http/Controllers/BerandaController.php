<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Barang;
use App\Models\Kategoribarang;


class BerandaController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {

        $active = 'barang';
        $data = Barang::with('Kategoribarang')->paginate(2);
        return view('pages.public.index', compact('active', 'data'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function tentangkami(): View
    {
        $active = 'tentang';
        return view('pages.public.tentang', compact('active'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function kontakkami(): View
    {
        $active = 'kontak';
        return view('pages.public.kontak', compact('active'));
    }
}
