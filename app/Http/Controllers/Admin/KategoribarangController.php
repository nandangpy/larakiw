<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategoribarang;
use Illuminate\Support\Facades\Validator;

class KategoribarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $active = 'kategoribarang';
        $data = Kategoribarang::all();
        return view('pages.admin.kategoribarang.index', compact('active', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $active = 'kategoribarang';
        return view('pages.admin.kategoribarang.kategoribarang-create', compact('active'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make(request()->all(), [
            'nama_kategori' => 'required|regex:/^[a-zA-Z]+$/u|unique:katekuliner|max:225',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        } else {

            $data = new Kategoribarang();
            $data->nama_kategori = $request->get('nama_kategori');
            $data->save();
            return redirect()->route('kategoribarang.index')->with('msg', "Data Berhasil Disimpan");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = Kategoribarang::findOrFail($id);
        $active = 'kategoribarang';
        return view('pages.admin.kategoribarang.kategoribarang-detail', compact('active', 'data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = Kategoribarang::findOrFail($id);
        $active = 'kategoribarang';
        return view('pages.admin.kategoribarang.kategoribarang-edit', compact('active', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validator = Validator::make(request()->all(), [
            'nama_kategori' => 'required|regex:/^[a-zA-Z]+$/u|unique:katekuliner|max:225',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        } else {
            $data = Kategoribarang::findOrFail($id);
            $data->nama_kategori = $request->get('nama_kategori');
            $data->save();
            return redirect()->route('kategoribarang.index')->with('msg', "Data, Berhasil Diubah.!!!");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = Kategoribarang::findOrFail($id);
        $data->delete();
        return redirect()->route('kategoribarang.index')->with('msg', "Data, Berhasil Dihapus.!!!");
    }
}
