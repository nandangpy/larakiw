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
        $data = Barang::with('Kategoribarang')->latest()->filter(request(['search']))->paginate(4);
        return view('pages.public.index', compact('data'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function tentangkami(): View
    {
        return view('pages.public.tentang');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function kontakkami(): View
    {
        return view('pages.public.kontak');
    }
}
