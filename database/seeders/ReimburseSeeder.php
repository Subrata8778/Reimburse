<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReimburseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reimburses')->insert([
            'tanggal' => '2024-05-09',
            'nama' => 'Perobatan Karyawan',
            'deskripsi' => 'Tambal gigi di dokter',
            'url_file' => 'file/honda_hrv.jpeg',
            'status' => 'Diproses',
            'user_nip' => '1236',
        ]);
        DB::table('reimburses')->insert([
            'tanggal' => '2024-04-29',
            'nama' => 'Makan Karyawan',
            'deskripsi' => 'Makan di restoran',
            'url_file' => 'file/kia_picanto.jpeg',
            'status' => 'Diproses',
            'user_nip' => '1236',
        ]);
        DB::table('reimburses')->insert([
            'tanggal' => '2024-03-19',
            'nama' => 'Transportasi Karyawan',
            'deskripsi' => 'Biaya transportasi dinas',
            'url_file' => 'file/car_branding_jnt.jpeg',
            'status' => 'Diproses',
            'user_nip' => '1236',
        ]);
    }
}
