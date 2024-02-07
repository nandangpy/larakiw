<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('berita_kategori')->insert([
            [
                'uid_bk' => '990dcd0b-123x-123e-ifa2-894ead20a223',
                'kategori_nama' => 'Teknologi',
                // 'slug' => 'teknologi',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ], [
                'uid_bk' => '990dcd0b-123x-123e-ifa2-894ead20a224',
                'kategori_nama' => 'Ekonomi',
                // 'slug' => 'ekonomi',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);

        DB::table('berita')->insert([
            [
                'uid_b' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'uid_bk' => '990dcd0b-123x-123e-ifa2-894ead20a223',
                'title' => 'Perang Cyber Israel dan Pelestina',
                'slug' => 'perang-cyber-israel-dan-pelestina',
                'content' => 'Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. eget tortor risus. Vivamus magna justo, lacinia eget consectetur sed,convallis at tellus. Vivamus suscipit tortor eget felis porttitor volutpat.Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent sapien massa, convallis',
                'status' => 'A',
                'published_at' => Carbon::now()->format('Y-m-d'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ], [
                'uid_b' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'uid_bk' => '990dcd0b-123x-123e-ifa2-894ead20a224',
                'title' => 'Uang Anggaran Naik Bismillah',
                'slug' => 'uang-anggaran-naik-bismillah',
                'content' => 'Convallis a pellentesque nec, egestas non nisi. eget tortor risus. Vivamus magna justo, lacinia eget consectetur sed,convallis at tellus. Vivamus suscipit tortor eget felis porttitor volutpat.Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent sapien massa, convallis',
                'status' => 'A',
                'published_at' => Carbon::now()->format('Y-m-d'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
