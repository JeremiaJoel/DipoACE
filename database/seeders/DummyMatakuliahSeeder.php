<?php

namespace Database\Seeders;
use App\Models\matakuliah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyMatakuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $matakuliah = [
            // ['nama' => 'Struktur Data', 'kodemk' => 'PAIK6301', 'jurusan' => 'Informatika', 'sks' => 4, 'semester' => 3, 'jenis_matkul' => 'Wajib'],
            // ['nama' => 'Sistem Operasi', 'kodemk' => 'PAIK6302', 'jurusan' => 'Informatika', 'sks' => 3, 'semester' => 3, 'jenis_matkul' => 'Wajib'],
            // ['nama' => 'Basis Data', 'kodemk' => 'PAIK6303', 'jurusan' => 'Informatika', 'sks' => 4, 'semester' => 3, 'jenis_matkul' => 'Wajib'],
            // ['nama' => 'Metode Numerik', 'kodemk' => 'PAIK6304', 'jurusan' => 'Informatika', 'sks' => 3, 'semester' => 3, 'jenis_matkul' => 'Wajib'],
            // ['nama' => 'Interaksi Manusia dan Komputer', 'kodemk' => 'PAIK6305', 'jurusan' => 'Informatika', 'sks' => 3, 'semester' => 3, 'jenis_matkul' => 'Wajib'],
            // ['nama' => 'Statistika', 'kodemk' => 'PAIK6306', 'jurusan' => 'Informatika', 'sks' => 2, 'semester' => 3, 'jenis_matkul' => 'Wajib'],

            // ['nama' => 'Pemrograman Berorientasi Objek', 'kodemk' => 'PAIK6401', 'jurusan' => 'Informatika', 'sks' => 3, 'semester' => 4, 'jenis_matkul' => 'Wajib'],
            // ['nama' => 'Jaringan Komputer', 'kodemk' => 'PAIK6402', 'jurusan' => 'Informatika', 'sks' => 3, 'semester' => 4, 'jenis_matkul' => 'Wajib'],
            // ['nama' => 'Manajemen Basis Data', 'kodemk' => 'PAIK6403', 'jurusan' => 'Informatika', 'sks' => 3, 'semester' => 4, 'jenis_matkul' => 'Wajib'],
            // ['nama' => 'Gravika dan Komputasi Visual', 'kodemk' => 'PAIK6404', 'jurusan' => 'Informatika', 'sks' => 3, 'semester' => 4, 'jenis_matkul' => 'Wajib'],
            // ['nama' => 'Rekayasa Perangkat Lunak', 'kodemk' => 'PAIK6405', 'jurusan' => 'Informatika', 'sks' => 3, 'semester' => 4, 'jenis_matkul' => 'Wajib'],
            // ['nama' => 'Sistem Cerdas', 'kodemk' => 'PAIK6406', 'jurusan' => 'Informatika', 'sks' => 3, 'semester' => 4, 'jenis_matkul' => 'Wajib'],

            // ['nama' => 'Pengembangan Berbasis Platform', 'kodemk' => 'PAIK6501', 'jurusan' => 'Informatika', 'sks' => 4, 'semester' => 5, 'jenis_matkul' => 'Wajib'],
            // ['nama' => 'Komputasi Tersebar dan Paralel', 'kodemk' => 'PAIK6502', 'jurusan' => 'Informatika', 'sks' => 3, 'semester' => 5, 'jenis_matkul' => 'Wajib'],
            // ['nama' => 'Sistem Informasi', 'kodemk' => 'PAIK6503', 'jurusan' => 'Informatika', 'sks' => 3, 'semester' => 5, 'jenis_matkul' => 'Wajib'],
            // ['nama' => 'Proyek Perangkat Lunak', 'kodemk' => 'PAIK6504', 'jurusan' => 'Informatika', 'sks' => 3, 'semester' => 5, 'jenis_matkul' => 'Wajib'],
            // ['nama' => 'Machine Learning', 'kodemk' => 'PAIK6505', 'jurusan' => 'Informatika', 'sks' => 3, 'semester' => 5, 'jenis_matkul' => 'Wajib'],
            // ['nama' => 'Keamanan dan Jaminan Informasi', 'kodemk' => 'PAIK6506', 'jurusan' => 'Informatika', 'sks' => 3, 'semester' => 5, 'jenis_matkul' => 'Wajib'],
            // ['nama' => 'Kewirausahaan', 'kodemk' => 'UUW00008', 'jurusan' => 'Informatika', 'sks' => 2, 'semester' => 5, 'jenis_matkul' => 'Wajib'],

            ['nama' => 'Olahraga', 'kodemk' => 'UUW00001', 'jurusan' => 'Informatika', 'sks' => 1, 'semester' => 5, 'jenis_matkul' => 'Wajib'],

        ];

        foreach($matakuliah as $key => $val){
            matakuliah::create($val);
        }
    }
}