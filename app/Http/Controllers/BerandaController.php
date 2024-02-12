<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Barang;
use App\Models\Kategoribarang;


class BerandaController extends Controller
{
    //
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {

        $active = 'barang';
        $data = Barang::with('Kategoribarang')->get();

        return view('pages.public.index', compact('active', 'data'));
    }
}
