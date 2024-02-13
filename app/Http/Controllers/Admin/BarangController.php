<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Barang;
use App\Models\Kategoribarang;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Barang::all();
        return view('pages.admin.barang.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $datajenis = Kategoribarang::all();
        return view('pages.admin.barang.barang-create', compact('datajenis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make(request()->all(), [
            'id_jenis_barang' => 'required|exists:kategoribarang,uid_bk',
            'nama_barang' => 'required|regex:/^[\pL\s\-]+$/u|unique:barang|max:100',
            'deskripsi_barang' => 'required|max:255',
            'harga_barang' => 'required|regex:/^\d{1,13}(\.\d{1,4})?$/',
            'stok_barang' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'gambar_barang' => 'required|max:255|mimes:jpeg,png,jpg,svg',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        } else {

            $data = new Barang();
            $data->uid_bk = $request->get('id_jenis_barang');
            $data->nama_barang = $request->get('nama_barang');
            $data->deskripsi_barang = $request->get('deskripsi_barang');
            $data->slug = Str::slug($request->nama_barang);
            $data->harga_barang = $request->get('harga_barang');
            $data->stok_barang = $request->get('stok_barang');
            
            if ($request->hasfile('gambar_barang')) {
                $image = $request->file('gambar_barang');
                $image_name = bin2hex(time() . '-barang') . '.' . $image->getClientOriginalExtension();
                Storage::putFileAs('public/uploads/images/barang/', $image, $image_name);
                $data->foto_barang = $image_name;
            }

            $data->save();
            return redirect()->route('barang.index')->with('msg', "Data Berhasil Disimpan");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = Barang::findOrFail($id);
        return view('pages.admin.barang.barang-detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = Barang::findOrFail($id);
        $datajenis = Kategoribarang::all();
        return view('pages.admin.barang.barang-edit', compact('data', 'datajenis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validator = Validator::make(request()->all(), [
            'id_jenis_barang' => 'required|exists:kategoribarang,uid_bk',
            'nama_barang' => 'required|regex:/^[\pL\s\-]+$/u|max:100',
            'deskripsi_barang' => 'required|max:255',
            'harga_barang' => 'required|regex:/^\d{1,13}(\.\d{1,4})?$/',
            'stok_barang' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'gambar_barang' => 'max:255|mimes:jpeg,png,jpg,svg',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        } else {
            $data = Barang::findOrFail($id);
            $data->uid_bk = $request->get('id_jenis_barang');
            $data->nama_barang = $request->get('nama_barang');
            $data->deskripsi_barang = $request->get('deskripsi_barang');
            $data->slug = Str::slug($request->nama_barang);
            $data->harga_barang = $request->get('harga_barang');
            $data->stok_barang = $request->get('stok_barang');

            if ($request->hasfile('gambar_barang')) {
                $image = $request->file('gambar_barang');
                File::delete(public_path("/storage/uploads/images/barang/" . $data->foto_barang));
                $image_name = bin2hex(time() . '-barang') . '.' . $image->getClientOriginalExtension();
                Storage::putFileAs('public/uploads/images/barang/', $image, $image_name);
                $data->foto_barang = $image_name;
            }
            $data->save();
            return redirect()->route('barang.index')->with('msg', "Data, Berhasil Diubah.!!!");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = Barang::findOrFail($id);
        $data->delete();
        return redirect()->route('barang.index')->with('msg', "Data, Berhasil Dihapus.!!!");
    }
}
