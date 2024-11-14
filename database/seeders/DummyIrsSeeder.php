<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\irs;

class DummyIrsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $irs = [
            [
                'kodemk' => 'PAIK6105',
                'matakuliah' => 'Struktur Diskrit',
                'kelas' => 'A',
                'sks' => 4,
                'ruang' => 'E101',
                'status' => 'Wajib',
                'dosen_pengampu' => 'Dr. Budi Santoso, M.T.'
            ],
            [
                'kodemk' => 'PAIK6103',
                'matakuliah' => 'Dasar Sistem',
                'kelas' => 'B',
                'sks' => 3,
                'ruang' => 'E102',
                'status' => 'Wajib',
                'dosen_pengampu' => 'Prof. Siti Aminah, Ph.D.'
            ],
            [
                'kodemk' => 'PAIK6306',
                'matakuliah' => 'Statistika',
                'kelas' => 'C',
                'sks' => 2,
                'ruang' => 'E103',
                'status' => 'Wajib',
                'dosen_pengampu' => 'Dr. Agus Wijaya, M.Sc.'
            ],
            [
                'kodemk' => 'PAIK6505',
                'matakuliah' => 'Machine Learning',
                'kelas' => 'D',
                'sks' => 3,
                'ruang' => 'E102',
                'status' => 'Wajib',
                'dosen_pengampu' => 'Dr. Rina Kurniawati, M.T.'
            ],
            [
                'kodemk' => 'PAIK6503',
                'matakuliah' => 'Sistem Informasi',
                'kelas' => 'E',
                'sks' => 3,
                'ruang' => 'E101',
                'status' => 'Wajib',
                'dosen_pengampu' => 'Dr. Ahmad Setiawan, M.Kom.'
            ],
            [
                'kodemk' => 'PAIK6406',
                'matakuliah' => 'Sistem Cerdas',
                'kelas' => 'A',
                'sks' => 3,
                'ruang' => 'E103',
                'status' => 'Wajib',
                'dosen_pengampu' => 'Prof. Taufik Hidayat, M.Sc.'
            ],
            [
                'kodemk' => 'PAIK6404',
                'matakuliah' => 'Grafika dan Komputasi Visual',
                'kelas' => 'B',
                'sks' => 3,
                'ruang' => 'E107',
                'status' => 'Wajib',
                'dosen_pengampu' => 'Dr. Ida Fauziah, M.Kom.'
            ],
            [
                'kodemk' => 'PAIK6401',
                'matakuliah' => 'Pemrograman Berorientasi Objek',
                'kelas' => 'C',
                'sks' => 3,
                'ruang' => 'E108',
                'status' => 'Wajib',
                'dosen_pengampu' => 'Dr. Andi Wijaya, M.T.'
            ],
            [
                'kodemk' => 'PAIK6402',
                'matakuliah' => 'Data Mining',
                'kelas' => 'D',
                'sks' => 3,
                'ruang' => 'E109',
                'status' => 'Pilihan',
                'dosen_pengampu' => 'Dr. Sri Rahmi, M.Si.'
            ]
        ];
        foreach($irs as $key => $val){
            irs::create($val);
        }
    }
}