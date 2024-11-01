<?php

namespace Database\Seeders;
use App\Models\jadwal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyJadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jadwal = [
            [
                'dosen'=> 'Dr. Retno Kusumaningrum, S.Si., M.Kom.',
                'ruang'=> 'E101',
                'matakuliah'=> 'Machine Learning',
                'waktu'=>  '07.00 - 09.30',
                'kelas'=>  'A',
                'semester_aktif' => '5'
            ],
            [
                'dosen'=> 'Dr. Retno Kusumaningrum, S.Si., M.Kom.',
                'ruang'=> 'E101',
                'matakuliah'=> 'Machine Learning',
                'waktu'=>  '09.40 -12.10',
                'kelas'=>  'B',
                'semester_aktif' => '5'
            ],
            [
                'dosen'=> 'Dr. Retno Kusumaningrum, S.Si., M.Kom.',
                'ruang'=> 'E101',
                'matakuliah'=> 'Machine Learning',
                'waktu'=>  '13.00 - 15.30',
                'kelas'=>  'C',
                'semester_aktif' => '5'
            ],
            [
                'dosen'=> 'Dr. Retno Kusumaningrum, S.Si., M.Kom.',
                'ruang'=> 'E101',
                'matakuliah'=> 'Machine Learning',
                'waktu'=>  '15.40 - 18.10',
                'kelas'=>  'D',
                'semester_aktif' => '5'
            ],
            [
                'dosen'=> 'Beta Noranita, S.Si., M.Kom.',
                'ruang'=> 'E102',
                'matakuliah'=> 'Sistem Informasi',
                'waktu'=>  '07.00 - 09.30',
                'kelas'=>  'A',
                'semester_aktif' => '5'
            ],
            [
                'dosen'=> 'Beta Noranita, S.Si., M.Kom.',
                'ruang'=> 'E102',
                'matakuliah'=> 'Sistem Informasi',
                'waktu'=>  '09.40 - 12.10',
                'kelas'=>  'B',
                'semester_aktif' => '5'
            ],
            [
                'dosen'=> 'Beta Noranita, S.Si., M.Kom.',
                'ruang'=> 'E102',
                'matakuliah'=> 'Sistem Informasi',
                'waktu'=>  '13.00 - 15.30',
                'kelas'=>  'C',
                'semester_aktif' => '5'
            ],
            [
                'dosen'=> 'Beta Noranita, S.Si., M.Kom.',
                'ruang'=> 'E102',
                'matakuliah'=> 'Sistem Informasi',
                'waktu'=>  '15.40 - 18.10',
                'kelas'=>  'D',
                'semester_aktif' => '5'
            ],
            [
                'dosen'=> 'Sandy Kurniawan, S.Kom., M.Kom.',
                'ruang'=> 'E103',
                'matakuliah'=> 'Pengembangan Berbasis Platform',
                'waktu'=>  '07.00 - 10.20',
                'kelas'=>  'A',
                'semester_aktif' => '5'
            ],
            [
                'dosen'=> 'Sandy Kurniawan, S.Kom., M.Kom.',
                'ruang'=> 'E104',
                'matakuliah'=> 'Pengembangan Berbasis Platform',
                'waktu'=>  '09.30 - 12.50',
                'kelas'=>  'B',
                'semester_aktif' => '5'
            ],
            [
                'dosen'=> 'Sandy Kurniawan, S.Kom., M.Kom.',
                'ruang'=> 'E103',
                'matakuliah'=> 'Pengembangan Berbasis Platform',
                'waktu'=>  '13.00 - 16.20',
                'kelas'=>  'C',
                'semester_aktif' => '5'
            ],
            [
                'dosen'=> 'Sandy Kurniawan, S.Kom., M.Kom.',
                'ruang'=> 'E104',
                'matakuliah'=> 'Pengembangan Berbasis Platform',
                'waktu'=>  '14.00 - 17.20',
                'kelas'=>  'D',
                'semester_aktif' => '5'
            ],
            [
                'dosen'=> 'Adhe Setya Pramayoga, M.T.',
                'ruang'=> 'A101',
                'matakuliah'=> 'Komputasi Tersebar dan Paralel',
                'waktu'=>  '07.00 - 09.30',
                'kelas'=>  'A',
                'semester_aktif' => '5'
            ],
            [
                'dosen'=> 'Adhe Setya Pramayoga, M.T.',
                'ruang'=> 'A101',
                'matakuliah'=> 'Komputasi Tersebar dan Paralel',
                'waktu'=>  '09.40 - 12.10',
                'kelas'=>  'B',
                'semester_aktif' => '5'
            ],
            [
                'dosen'=> 'Adhe Setya Pramayoga, M.T.',
                'ruang'=> 'A101',
                'matakuliah'=> 'Komputasi Tersebar dan Paralel',
                'waktu'=>  '13.00 - 15.30',
                'kelas'=>  'C',
                'semester_aktif' => '5'
            ],
            [
                'dosen'=> 'Adhe Setya Pramayoga, M.T.',
                'ruang'=> 'A101',
                'matakuliah'=> 'Komputasi Tersebar dan Paralel',
                'waktu'=>  '15.40 - 18.10',
                'kelas'=>  'D',
                'semester_aktif' => '5'
            ],
            [
                'dosen'=> 'Dr. Aris Puji Widodo, S.Si., M.T.',
                'ruang'=> 'A102',
                'matakuliah'=> 'Proyek Perangkat Lunak',
                'waktu'=>  '07.00 - 09.30',
                'kelas'=>  'A',
                'semester_aktif' => '5'
            ],
            [
                'dosen'=> 'Dr. Aris Puji Widodo, S.Si., M.T.',
                'ruang'=> 'A102',
                'matakuliah'=> 'Proyek Perangkat Lunak',
                'waktu'=>  '09.40 - 12.10',
                'kelas'=>  'B',
                'semester_aktif' => '5'
            ],
            [
                'dosen'=> 'Dr. Aris Puji Widodo, S.Si., M.T.',
                'ruang'=> 'A102',
                'matakuliah'=> 'Proyek Perangkat Lunak',
                'waktu'=>  '13.00 - 15.30',
                'kelas'=>  'C',
                'semester_aktif' => '5'
            ],
            [
                'dosen'=> 'Dr. Aris Puji Widodo, S.Si., M.T.',
                'ruang'=> 'A102',
                'matakuliah'=> 'Proyek Perangkat Lunak',
                'waktu'=>  '15.40 - 18.10',
                'kelas'=>  'D',
                'semester_aktif' => '5'
            ],
        ];
        foreach($jadwal as $key => $val){
            jadwal::create($val);
        }
    }
}
