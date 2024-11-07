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
            [
                'nama' => 'Struktur Diskrit',
                'kodemk' => 'PAIK6105',
                'jurusan' => 'Informatika',
                'sks' =>  '4',
                'semester' =>  '1',
                'jenis_matkul' => 'Wajib'
            ],
            [
                'nama' => 'Dasar Sistem',
                'kodemk' => 'PAIK6103',
                'jurusan' => 'Informatika',
                'sks' =>  '3',
                'semester' =>  '1',
                'jenis_matkul' => 'Wajib'
            ],
            [
                'nama' => 'Statistika',
                'kodemk' => 'PAIK6306',
                'jurusan' => 'Informatika',
                'sks' =>  '2',
                'semester' =>  '3',
                'jenis_matkul' => 'Wajib'
            ],
            [
                'nama' => 'Machine Learning',
                'kodemk' => 'PAIK6505',
                'jurusan' => 'Informatika',
                'sks' =>  '3',
                'semester' =>  '5',
                'jenis_matkul' => 'Wajib'
            ],
            [
                'nama' => 'Sistem Informasi',
                'kodemk' => 'PAIK6503',
                'jurusan' => 'Informatika',
                'sks' =>  '3',
                'semester' =>  '5',
                'jenis_matkul' => 'Wajib'
            ],
            [
                'nama' => 'Pengembangan Berbasis Platform',
                'kodemk' => 'PAIK6105',
                'jurusan' => 'Informatika',
                'sks' =>  '4',
                'semester' =>  '5',
                'jenis_matkul' => 'Wajib'
            ],
            [
                'nama' => 'Komputasi Tersebar dan Paralel',
                'kodemk' => 'PAIK6502',
                'jurusan' => 'Informatika',
                'sks' =>  '3',
                'semester' =>  '5',
                'jenis_matkul' => 'Wajib'
            ],
            [
                'nama' => 'Proyek Perangkat Lunak',
                'kodemk' => 'PAIK6504',
                'jurusan' => 'Informatika',
                'sks' =>  '3',
                'semester' =>  '5',
                'jenis_matkul' => 'Wajib'
            ],
            [
                'nama' => 'Sistem Cerdas',
                'kodemk' => 'PAIK6406',
                'jurusan' => 'Informatika',
                'sks' =>  '3',
                'semester' =>  '4',
                'jenis_matkul' => 'Wajib'
            ],
            [
                'nama' => 'Grafika dan Komputasi Visual',
                'kodemk' => 'PAIK6404',
                'jurusan' => 'Informatika',
                'sks' =>  '3',
                'semester' =>  '4',
                'jenis_matkul' => 'Wajib'
            ],
            [
                'nama' => 'Pemrograman Berorientasi Objek',
                'kodemk' => 'PAIK6401',
                'jurusan' => 'Informatika',
                'sks' =>  '3',
                'semester' =>  '4',
                'jenis_matkul' => 'Wajib'
            ],
            [
                'nama' => 'Data Mining',
                'kodemk' => 'PAIK6402',
                'jurusan' => 'Informatika',
                'sks' =>  '3',
                'semester' =>  '7',
                'jenis_matkul' => 'Pilihan'
            ]
        ];
        foreach ($matakuliah as $key => $val) {
            matakuliah::create($val);
        }
    }
}
