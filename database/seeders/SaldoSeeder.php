<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SaldoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('saldo')->insert([

            [
                'uid_s' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'id' => User::where('name', 'Nandang')->first()['id'],
                'total_saldo' => 500000,
            ],
        ]);
    }
}
