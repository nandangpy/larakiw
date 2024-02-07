<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'email' => 'tokopadio@gmail.com',
                'password' => Hash::make('tokopadio123'),
                'role' => 1,
                'name' => 'Admin tokopadio',
            ] ,
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'email' => 'nandang.own@gmail.com',
                'password' => Hash::make('12345'),
                'role' => 0,
                'name' => 'Nandang',
            ] ,
        ]);
    }
}
