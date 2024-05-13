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
        DB::table('users')->insert([
            'nip' => '1234',
            'nama' => 'DONI',
            'jabatan' => 'Direktur',
            'password' => Hash::make('123456'),
        ]);
        DB::table('users')->insert([
            'nip' => '1235',
            'nama' => 'DONO',
            'jabatan' => 'Finance',
            'password' => Hash::make('123456'),
        ]);
        DB::table('users')->insert([
            'nip' => '1236',
            'nama' => 'DONA',
            'jabatan' => 'Staff',
            'password' => Hash::make('123456'),
        ]);
    }
}
