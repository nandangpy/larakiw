<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Barang;
use App\Models\Kategoribarang;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('barang')->insert([
            [
                'uid_b' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'uid_bk' => Kategoribarang::all()->random()->uid_bk,
                'nama_barang' => 'Tamiya',
                'deskripsi_barang' => 'Tamiya Menang-menangan.',
                'harga_barang' => 25000,
                'stok_barang' => 25,
                'foto_barang' => "2.jpg",
                'slug' => 'tamiya',
            ],
            [
                'uid_b' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'uid_bk' => Kategoribarang::all()->random()->uid_bk,
                'nama_barang' => 'Robot',
                'deskripsi_barang' => 'Robot Wani ..!!!',
                'harga_barang' => 20000,
                'stok_barang' => 20,
                'foto_barang' => "1.jpg",
                'slug' => 'robot',
            ],
            [
                'uid_b' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'uid_bk' => Kategoribarang::all()->random()->uid_bk,
                'nama_barang' => 'Boneka',
                'deskripsi_barang' => 'Boneka Buaya.',
                'harga_barang' => 15000,
                'stok_barang' => 5,
                'foto_barang' => "3.jpg",
                'slug' => 'boneka',
            ],
            [
                'uid_b' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'uid_bk' => Kategoribarang::all()->random()->uid_bk,
                'nama_barang' => 'Mobil Remot',
                'deskripsi_barang' => 'Mobil Remot Terbaru.',
                'harga_barang' => 50000,
                'stok_barang' => 5,
                'foto_barang' => "4.jpg",
                'slug' => 'mobil-remot',
            ],
            [
                'uid_b' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'uid_bk' => Kategoribarang::all()->random()->uid_bk,
                'nama_barang' => 'Bola',
                'deskripsi_barang' => 'Bola Lapangan Besar.',
                'harga_barang' => 50000,
                'stok_barang' => 5,
                'foto_barang' => "5.jpg",
                'slug' => 'bola',
            ],
            
        ]);
    }
}
