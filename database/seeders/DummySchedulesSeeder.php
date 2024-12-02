<?php

namespace Database\Seeders;

use App\Models\Jadwal;
use App\Models\Matakuliah;
use Illuminate\Database\Seeder;

class DummySchedulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jadwal = [
            
            [
                'ruang' => 'E101',
                'kelas' => 'A',
                'semester_aktif' => '3',
                'jurusan' => 'Informatika',
                'sks' => 4,
                'hari' => 'Senin',
                'pengampu_1' => 'Edy Suharto, S.T., M.Kom',
                'pengampu_2' => 'Sandy Kurniawan, S.Kom., M.Kom.',
                'kodemk' => 'PAIK6301',
                'jam_mulai' => '07:00:00',
                'jam_selesai' => '10:20:00'
            ],
            [
                'ruang' => 'E101',
                'kelas' => 'B',
                'semester_aktif' => '3',
                'jurusan' => 'Informatika',
                'sks' => 4,
                'hari' => 'Senin',
                'pengampu_1' => 'Edy Suharto, S.T., M.Kom',
                'pengampu_2' => 'Sandy Kurniawan, S.Kom., M.Kom.',
                'kodemk' => 'PAIK6301',
                'jam_mulai' => '13:00:00',
                'jam_selesai' => '16:20:00'
            ],
            [
                'ruang' => 'E101',
                'kelas' => 'A',
                'semester_aktif' => '3',
                'jurusan' => 'Informatika',
                'sks' => 4,
                'hari' => 'Selasa',
                'pengampu_1' => 'Edy Suharto, S.T., M.Kom',
                'pengampu_2' => 'Sandy Kurniawan, S.Kom., M.Kom.',
                'kodemk' => 'PAIK6301',
                'jam_mulai' => '07:00:00',
                'jam_selesai' => '10:20:00'
            ],
            [
                'ruang' => 'E101',
                'kelas' => 'A',
                'semester_aktif' => '3',
                'jurusan' => 'Informatika',
                'sks' => 4,
                'hari' => 'Selasa',
                'pengampu_1' => 'Edy Suharto, S.T., M.Kom',
                'pengampu_2' => 'Sandy Kurniawan, S.Kom., M.Kom.',
                'kodemk' => 'PAIK6301',
                'jam_mulai' => '13:00:00',
                'jam_selesai' => '16:20:00'
            ],
            [
                'ruang' => 'E102',
                'kelas' => 'A',
                'semester_aktif' => '3',
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Rabu',
                'pengampu_1' => 'Guruh Aryotejo, S.Kom., M.Sc.',
                'pengampu_2' => 'Drs. Eko Adi Sarwoko, M.Komp.',
                'kodemk' => 'PAIK6302',
                'jam_mulai' => '07:00:00',
                'jam_selesai' => '09:30:00'
            ],
            [
                'ruang' => 'E102',
                'kelas' => 'A',
                'semester_aktif' => '3',
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Rabu',
                'pengampu_1' => 'Guruh Aryotejo, S.Kom., M.Sc.',
                'pengampu_2' => 'Drs. Eko Adi Sarwoko, M.Komp.',
                'kodemk' => 'PAIK6302',
                'jam_mulai' => '09:40:00',
                'jam_selesai' => '12:10:00'
            ],
            [
                'ruang' => 'E102',
                'kelas' => 'A',
                'semester_aktif' => '3',
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Rabu',
                'pengampu_1' => 'Guruh Aryotejo, S.Kom., M.Sc.',
                'pengampu_2' => 'Drs. Eko Adi Sarwoko, M.Komp.',
                'kodemk' => 'PAIK6302',
                'jam_mulai' => '13:00:00',
                'jam_selesai' => '15:30:00'
            ],
            [
                'ruang' => 'E102',
                'kelas' => 'A',
                'semester_aktif' => '3',
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Rabu',
                'pengampu_1' => 'Guruh Aryotejo, S.Kom., M.Sc.',
                'pengampu_2' => 'Drs. Eko Adi Sarwoko, M.Komp.',
                'kodemk' => 'PAIK6302',
                'jam_mulai' => '15:40:00',
                'jam_selesai' => '18:10:00'
            ],
            
            // Basis Data
            [
                'ruang' => 'A101',
                'kelas' => 'A',
                'semester_aktif' => '3',
                'jurusan' => 'Informatika',
                'sks' => 4,
                'hari' => 'Senin',
                'pengampu_1' => 'Beta Noranita, S.Si., M.Kom.',
                'pengampu_2' => 'Satriyo Adhy, S.Si., M.T.',
                'kodemk' => 'PAIK6303',
                'jam_mulai' => '07:00:00',
                'jam_selesai' => '10:20:00'
            ],
            [
                'ruang' => 'A101',
                'kelas' => 'B',
                'semester_aktif' => '3',
                'jurusan' => 'Informatika',
                'sks' => 4,
                'hari' => 'Senin',
                'pengampu_1' => 'Beta Noranita, S.Si., M.Kom.',
                'pengampu_2' => 'Satriyo Adhy, S.Si., M.T.',
                'kodemk' => 'PAIK6303',
                'jam_mulai' => '13:00:00',
                'jam_selesai' => '16:20:00'
            ],
            [
                'ruang' => 'A101',
                'kelas' => 'C',
                'semester_aktif' => '3',
                'jurusan' => 'Informatika',
                'sks' => 4,
                'hari' => 'Selasa',
                'pengampu_1' => 'Beta Noranita, S.Si., M.Kom.',
                'pengampu_2' => 'Satriyo Adhy, S.Si., M.T.',
                'kodemk' => 'PAIK6303',
                'jam_mulai' => '07:00:00',
                'jam_selesai' => '10:20:00'
            ],
            [
                'ruang' => 'A101',
                'kelas' => 'D',
                'semester_aktif' => '3',
                'jurusan' => 'Informatika',
                'sks' => 4,
                'hari' => 'Selasa',
                'pengampu_1' => 'Beta Noranita, S.Si., M.Kom.',
                'pengampu_2' => 'Satriyo Adhy, S.Si., M.T.',
                'kodemk' => 'PAIK6303',
                'jam_mulai' => '13:00:00',
                'jam_selesai' => '16:20:00'
            ],
        
            // Metode Numerik
            [
                'ruang' => 'A102',
                'kelas' => 'A',
                'semester_aktif' => '3',
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Rabu',
                'pengampu_1' => 'Priyo Sidik Sasongko, S.Si., M.Kom.',
                'pengampu_2' => 'Etna Vianita, S.Mat., M.Mat.',
                'pengampu_3' => 'Dr. Indra Waspada, S.T., M.TI',
                'kodemk' => 'PAIK6304',
                'jam_mulai' => '07:00:00',
                'jam_selesai' => '09:30:00'
            ],
            [
                'ruang' => 'A102',
                'kelas' => 'B',
                'semester_aktif' => '3',
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Rabu',
                'pengampu_1' => 'Priyo Sidik Sasongko, S.Si., M.Kom.',
                'pengampu_2' => 'Etna Vianita, S.Mat., M.Mat.',
                'pengampu_3' => 'Dr. Indra Waspada, S.T., M.TI',
                'kodemk' => 'PAIK6304',
                'jam_mulai' => '09:40:00',
                'jam_selesai' => '12:10:00'
            ],
            [
                'ruang' => 'A102',
                'kelas' => 'C',
                'semester_aktif' => '3',
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Rabu',
                'pengampu_1' => 'Priyo Sidik Sasongko, S.Si., M.Kom.',
                'pengampu_2' => 'Etna Vianita, S.Mat., M.Mat.',
                'pengampu_3' => 'Dr. Indra Waspada, S.T., M.TI',
                'kodemk' => 'PAIK6304',
                'jam_mulai' => '13:00:00',
                'jam_selesai' => '15:30:00'
            ],
            [
                'ruang' => 'A102',
                'kelas' => 'D',
                'semester_aktif' => '3',
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Rabu',
                'pengampu_1' => 'Priyo Sidik Sasongko, S.Si., M.Kom.',
                'pengampu_2' => 'Etna Vianita, S.Mat., M.Mat.',
                'pengampu_3' => 'Dr. Indra Waspada, S.T., M.TI',
                'kodemk' => 'PAIK6304',
                'jam_mulai' => '15:40:00',
                'jam_selesai' => '18:10:00'
            ],
        
            // Interaksi Manusia dan Komputer
            [
                'ruang' => 'B103',
                'kelas' => 'A',
                'semester_aktif' => '3',
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Senin',
                'pengampu_1' => 'Drs. Eko Adi Sarwoko, M.Komp.',
                'pengampu_2' => 'Dinar Mutiara Kusumo Nugraheni,S.T., M.InfoTech.(Comp)., Ph.D.',
                'kodemk' => 'PAIK6305',
                'jam_mulai' => '07:00:00',
                'jam_selesai' => '10:20:00'
            ],
            [
                'ruang' => 'B103',
                'kelas' => 'B',
                'semester_aktif' => '3',
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Senin',
                'pengampu_1' => 'Drs. Eko Adi Sarwoko, M.Komp.',
                'pengampu_2' => 'Dinar Mutiara Kusumo Nugraheni,S.T., M.InfoTech.(Comp)., Ph.D.',
                'kodemk' => 'PAIK6305',
                'jam_mulai' => '13:00:00',
                'jam_selesai' => '16:20:00'
            ],
            [
                'ruang' => 'B103',
                'kelas' => 'C',
                'semester_aktif' => '3',
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Selasa',
                'pengampu_1' => 'Drs. Eko Adi Sarwoko, M.Komp.',
                'pengampu_2' => 'Dinar Mutiara Kusumo Nugraheni,S.T., M.InfoTech.(Comp)., Ph.D.',
                'kodemk' => 'PAIK6305',
                'jam_mulai' => '07:00:00',
                'jam_selesai' => '10:20:00'
            ],
            [
                'ruang' => 'B103',
                'kelas' => 'D',
                'semester_aktif' => '3',
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Selasa',
                'pengampu_1' => 'Drs. Eko Adi Sarwoko, M.Komp.',
                'pengampu_2' => 'Dinar Mutiara Kusumo Nugraheni,S.T., M.InfoTech.(Comp)., Ph.D.',
                'kodemk' => 'PAIK6305',
                'jam_mulai' => '13:00:00',
                'jam_selesai' => '16:20:00'
            ],
            
            // Statistika
            [
                'ruang' => 'G103',
                'kelas' => 'A',
                'semester_aktif' => '3',
                'jurusan' => 'Informatika',
                'sks' => 2,
                'hari' => 'Senin',
                'pengampu_1' => 'Dr. Dra. Tatik Widiharih, M.Si.',
                'pengampu_2' => 'Dr. Yeva Fadhilah Ashari, S.Si., M.Si.',
                'kodemk' => 'PAIK6306',
                'jam_mulai' => '07:00:00',
                'jam_selesai' => '09:00:00'
            ],
            [
                'ruang' => 'G103',
                'kelas' => 'B',
                'semester_aktif' => '3',
                'jurusan' => 'Informatika',
                'sks' => 2,
                'hari' => 'Senin',
                'pengampu_1' => 'Dr. Dra. Tatik Widiharih, M.Si.',
                'pengampu_2' => 'Dr. Yeva Fadhilah Ashari, S.Si., M.Si.',
                'kodemk' => 'PAIK6306',
                'jam_mulai' => '13:00:00',
                'jam_selesai' => '15:00:00'
            ],
            [
                'ruang' => 'G103',
                'kelas' => 'C',
                'semester_aktif' => '3',
                'jurusan' => 'Informatika',
                'sks' => 2,
                'hari' => 'Selasa',
                'pengampu_1' => 'Dr. Dra. Tatik Widiharih, M.Si.',
                'pengampu_2' => 'Dr. Yeva Fadhilah Ashari, S.Si., M.Si.',
                'kodemk' => 'PAIK6306',
                'jam_mulai' => '07:00:00',
                'jam_selesai' => '09:00:00'
            ],
            [
                'ruang' => 'G103',
                'kelas' => 'D',
                'semester_aktif' => '3',
                'jurusan' => 'Informatika',
                'sks' => 2,
                'hari' => 'Selasa',
                'pengampu_1' => 'Dr. Dra. Tatik Widiharih, M.Si.',
                'pengampu_2' => 'Dr. Yeva Fadhilah Ashari, S.Si., M.Si.',
                'kodemk' => 'PAIK6306',
                'jam_mulai' => '13:00:00',
                'jam_selesai' => '15:00:00'
            ],

            // Pengembangan Berbasis Platform
            [
                'ruang' => 'C101',
                'kelas' => 'A',
                'semester_aktif' => '5',
                'jurusan' => 'Informatika',
                'sks' => 4,
                'hari' => 'Kamis',
                'pengampu_1' => 'Adhe Setya Pramayoga, M.T.',
                'pengampu_2' => 'Sandy Kurniawan, S.Kom., M.Kom.',
                'pengampu_3' => 'Henri Tantyoko, S.Kom., M.Kom.',
                'kodemk' => 'PAIK6501',
                'jam_mulai' => '07:00:00',
                'jam_selesai' => '10:20:00'
            ],
            [
                'ruang' => 'C101',
                'kelas' => 'B',
                'semester_aktif' => '5',
                'jurusan' => 'Informatika',
                'sks' => 4,
                'hari' => 'Kamis',
                'pengampu_1' => 'Adhe Setya Pramayoga, M.T.',
                'pengampu_2' => 'Sandy Kurniawan, S.Kom., M.Kom.',
                'pengampu_3' => 'Henri Tantyoko, S.Kom., M.Kom.',
                'kodemk' => 'PAIK6501',
                'jam_mulai' => '13:00:00',
                'jam_selesai' => '16:20:00'
            ],
            [
                'ruang' => 'C101',
                'kelas' => 'C',
                'semester_aktif' => '5',
                'jurusan' => 'Informatika',
                'sks' => 4,
                'hari' => 'Kamis',
                'pengampu_1' => 'Adhe Setya Pramayoga, M.T.',
                'pengampu_2' => 'Sandy Kurniawan, S.Kom., M.Kom.',
                'pengampu_3' => 'Henri Tantyoko, S.Kom., M.Kom.',
                'kodemk' => 'PAIK6501',
                'jam_mulai' => '07:00:00',
                'jam_selesai' => '10:20:00'
            ],
            [
                'ruang' => 'C101',
                'kelas' => 'D',
                'semester_aktif' => '5',
                'jurusan' => 'Informatika',
                'sks' => 4,
                'hari' => 'Kamis',
                'pengampu_1' => 'Adhe Setya Pramayoga, M.T.',
                'pengampu_2' => 'Sandy Kurniawan, S.Kom., M.Kom.',
                'pengampu_3' => 'Henri Tantyoko, S.Kom., M.Kom.',
                'kodemk' => 'PAIK6501',
                'jam_mulai' => '13:00:00',
                'jam_selesai' => '16:20:00'
            ],
        
            // Komputasi Tersebar dan Paralel
            [
                'ruang' => 'D102',
                'kelas' => 'A',
                'semester_aktif' => '5',
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Rabu',
                'pengampu_1' => 'Guruh Aryotejo, S.Kom., M.Sc.',
                'pengampu_2' => 'Drs. Eko Adi Sarwoko, M.Komp.',
                'kodemk' => 'PAIK6502',
                'jam_mulai' => '07:00:00',
                'jam_selesai' => '09:30:00'
            ],
            [
                'ruang' => 'D102',
                'kelas' => 'B',
                'semester_aktif' => '5',
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Rabu',
                'pengampu_1' => 'Guruh Aryotejo, S.Kom., M.Sc.',
                'pengampu_2' => 'Drs. Eko Adi Sarwoko, M.Komp.',
                'kodemk' => 'PAIK6502',
                'jam_mulai' => '09:40:00',
                'jam_selesai' => '12:10:00'
            ],
            [
                'ruang' => 'D102',
                'kelas' => 'C',
                'semester_aktif' => '5',
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Rabu',
                'pengampu_1' => 'Guruh Aryotejo, S.Kom., M.Sc.',
                'pengampu_2' => 'Drs. Eko Adi Sarwoko, M.Komp.',
                'kodemk' => 'PAIK6502',
                'jam_mulai' => '13:00:00',
                'jam_selesai' => '15:30:00'
            ],
            [
                'ruang' => 'D102',
                'kelas' => 'D',
                'semester_aktif' => '5',
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Rabu',
                'pengampu_1' => 'Guruh Aryotejo, S.Kom., M.Sc.',
                'pengampu_2' => 'Drs. Eko Adi Sarwoko, M.Komp.',
                'kodemk' => 'PAIK6502',
                'jam_mulai' => '15:40:00',
                'jam_selesai' => '18:10:00'
            ],
        
            // Sistem Informasi
            [
                'ruang' => 'B102',
                'kelas' => 'A',
                'semester_aktif' => '5',
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Senin',
                'pengampu_1' => 'Beta Noranita, S.Si., M.Kom.',
                'pengampu_2' => 'Dr. Indra Waspada, S.T., M.TI',
                'kodemk' => 'PAIK6503',
                'jam_mulai' => '07:00:00',
                'jam_selesai' => '09:30:00'
            ],
            [
                'ruang' => 'B102',
                'kelas' => 'B',
                'semester_aktif' => '5',
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Senin',
                'pengampu_1' => 'Beta Noranita, S.Si., M.Kom.',
                'pengampu_2' => 'Dr. Indra Waspada, S.T., M.TI',
                'kodemk' => 'PAIK6503',
                'jam_mulai' => '09:40:00',
                'jam_selesai' => '16:20:00'
            ],
            [
                'ruang' => 'B102',
                'kelas' => 'C',
                'semester_aktif' => '5',
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Selasa',
                'pengampu_1' => 'Beta Noranita, S.Si., M.Kom.',
                'pengampu_2' => 'Dr. Indra Waspada, S.T., M.TI',
                'kodemk' => 'PAIK6503',
                'jam_mulai' => '13:00:00',
                'jam_selesai' => '15:30:00'
            ],
            [
                'ruang' => 'B102',
                'kelas' => 'D',
                'semester_aktif' => '5',
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Selasa',
                'pengampu_1' => 'Beta Noranita, S.Si., M.Kom.',
                'pengampu_2' => 'Dr. Indra Waspada, S.T., M.TI',
                'kodemk' => 'PAIK6503',
                'jam_mulai' => '15:40:00',
                'jam_selesai' => '18:20:00'
            ],
        
            // Proyek Perangkat Lunak
            [
                'ruang' => 'B102',
                'kelas' => 'A',
                'semester_aktif' => '5',
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Rabu',
                'pengampu_1' => 'Dr. Aris Puji Widodo, S.Si., M.T.',
                'pengampu_2' => 'Dinar Mutiara Kusumo Nugraheni,S.T., M.InfoTech.(Comp)., Ph.D.',
                'kodemk' => 'PAIK6504',
                'jam_mulai' => '07:00:00',
                'jam_selesai' => '09:30:00'
            ],
            [
                'ruang' => 'B102',
                'kelas' => 'B',
                'semester_aktif' => '5',
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Rabu',
                'pengampu_1' => 'Dr. Aris Puji Widodo, S.Si., M.T.',
                'pengampu_2' => 'Dinar Mutiara Kusumo Nugraheni,S.T., M.InfoTech.(Comp)., Ph.D.',
                'kodemk' => 'PAIK6504',
                'jam_mulai' => '09:40:00',
                'jam_selesai' => '12:10:00'
            ],
            [
                'ruang' => 'B102',
                'kelas' => 'C',
                'semester_aktif' => '5',
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Rabu',
                'pengampu_1' => 'Dr. Aris Puji Widodo, S.Si., M.T.',
                'pengampu_2' => 'Dinar Mutiara Kusumo Nugraheni,S.T., M.InfoTech.(Comp)., Ph.D.',
                'kodemk' => 'PAIK6504',
                'jam_mulai' => '13:00:00',
                'jam_selesai' => '15:30:00'
            ],
            [
                'ruang' => 'B102',
                'kelas' => 'D',
                'semester_aktif' => '5',
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Rabu',
                'pengampu_1' => 'Dr. Aris Puji Widodo, S.Si., M.T.',
                'pengampu_2' => 'Dinar Mutiara Kusumo Nugraheni,S.T., M.InfoTech.(Comp)., Ph.D.',
                'kodemk' => 'PAIK6504',
                'jam_mulai' => '15:40:00',
                'jam_selesai' => '18:10:00'
            ],
        
            // Machine Learning
            [
                'ruang' => 'A102',
                'kelas' => 'A',
                'semester_aktif' => '5',
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Jumat',
                'pengampu_1' => 'Dr. Retno Kusumaningrum, S.Si., M.Kom',
                'pengampu_2' => 'Rismiyati, B.Eng, M.Cs',
                'kodemk' => 'PAIK6505',
                'jam_mulai' => '07:00:00',
                'jam_selesai' => '10:20:00'
            ],
            [
                'ruang' => 'A102',
                'kelas' => 'B',
                'semester_aktif' => '5',
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Jumat',
                'pengampu_1' => 'Dr. Retno Kusumaningrum, S.Si., M.Kom',
                'pengampu_2' => 'Rismiyati, B.Eng, M.Cs',
                'kodemk' => 'PAIK6505',
                'jam_mulai' => '13:00:00',
                'jam_selesai' => '16:20:00'
            ],
            [
                'ruang' => 'A102',
                'kelas' => 'C',
                'semester_aktif' => '5',
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Jumat',
                'pengampu_1' => 'Dr. Retno Kusumaningrum, S.Si., M.Kom',
                'pengampu_2' => 'Rismiyati, B.Eng, M.Cs',
                'kodemk' => 'PAIK6505',
                'jam_mulai' => '07:00:00',
                'jam_selesai' => '10:20:00'
            ],
            [
                'ruang' => 'A102',
                'kelas' => 'D',
                'semester_aktif' => '5',
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Jumat',
                'pengampu_1' => 'Dr. Retno Kusumaningrum, S.Si., M.Kom',
                'pengampu_2' => 'Rismiyati, B.Eng, M.Cs',
                'kodemk' => 'PAIK6505',
                'jam_mulai' => '13:00:00',
                'jam_selesai' => '16:20:00'
            ],
        
            // Keamanan dan Jaminan Informasi
            [
                'ruang' => 'C103',
                'kelas' => 'A',
                'semester_aktif' => '5',
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Rabu',
                'pengampu_1' => 'Edy Suharto, S.T., M.Kom',
                'pengampu_2' => 'Yunila Dwi Putri Ariyanti, S.Kom., M.Kom.',
                'kodemk' => 'PAIK6506',
                'jam_mulai' => '07:00:00',
                'jam_selesai' => '09:30:00'
            ],
            [
                'ruang' => 'C103',
                'kelas' => 'B',
                'semester_aktif' => '5',
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Rabu',
                'pengampu_1' => 'Edy Suharto, S.T., M.Kom',
                'pengampu_2' => 'Yunila Dwi Putri Ariyanti, S.Kom., M.Kom.',
                'kodemk' => 'PAIK6506',
                'jam_mulai' => '09:40:00',
                'jam_selesai' => '12:10:00'
            ],
            [
                'ruang' => 'C103',
                'kelas' => 'C',
                'semester_aktif' => '5',
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Rabu',
                'pengampu_1' => 'Edy Suharto, S.T., M.Kom',
                'pengampu_2' => 'Yunila Dwi Putri Ariyanti, S.Kom., M.Kom.',
                'kodemk' => 'PAIK6506',
                'jam_mulai' => '13:00:00',
                'jam_selesai' => '15:30:00'
            ],
            [
                'ruang' => 'C103',
                'kelas' => 'D',
                'semester_aktif' => '5',
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Rabu',
                'pengampu_1' => 'Edy Suharto, S.T., M.Kom',
                'pengampu_2' => 'Yunila Dwi Putri Ariyanti, S.Kom., M.Kom.',
                'kodemk' => 'PAIK6506',
                'jam_mulai' => '15:40:00',
                'jam_selesai' => '18:10:00'
            ],

            // Kewirausahaan
            [
                'ruang' => 'D102',
                'kelas' => 'A',
                'semester_aktif' => '5',
                'jurusan' => 'Informatika',
                'sks' => 2,
                'hari' => 'Kamis',
                'pengampu_1' => 'Prajanto Wahyu Adi, M.Kom.',
                'pengampu_2' => 'Dr. Aris Puji Widodo, S.Si., M.T.',
                'kodemk' => 'UUW00008',
                'jam_mulai' => '07:00:00',
                'jam_selesai' => '08:40:00'
            ],
            [
                'ruang' => 'D102',
                'kelas' => 'B',
                'semester_aktif' => '5',
                'jurusan' => 'Informatika',
                'sks' => 2,
                'hari' => 'Kamis',
                'pengampu_1' => 'Prajanto Wahyu Adi, M.Kom.',
                'pengampu_2' => 'Dr. Aris Puji Widodo, S.Si., M.T.',
                'kodemk' => 'UUW00008',
                'jam_mulai' => '13:00:00',
                'jam_selesai' => '14:40:00'
            ],
            [
                'ruang' => 'D102',
                'kelas' => 'C',
                'semester_aktif' => '5',
                'jurusan' => 'Informatika',
                'sks' => 2,
                'hari' => 'Kamis',
                'pengampu_1' => 'Prajanto Wahyu Adi, M.Kom.',
                'pengampu_2' => 'Dr. Aris Puji Widodo, S.Si., M.T.',
                'kodemk' => 'UUW00008',
                'jam_mulai' => '15:00:00',
                'jam_selesai' => '16:20:00'
            ],
            [
                'ruang' => 'D102',
                'kelas' => 'D',
                'semester_aktif' => '5',
                'jurusan' => 'Informatika',
                'sks' => 2,
                'hari' => 'Kamis',
                'pengampu_1' => 'Prajanto Wahyu Adi, M.Kom.',
                'pengampu_2' => 'Dr. Aris Puji Widodo, S.Si., M.T.',
                'kodemk' => 'UUW00008',
                'jam_mulai' => '16:30:00',
                'jam_selesai' => '17:40:00'
            ],
        
            //pbo
            [
                'ruang' => 'A101',
                'kelas' => 'A',
                'semester_aktif' => 4,
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Senin',
                'pengampu_1' => 'Edy Suharto, S.T., M.Kom',
                'pengampu_2' => 'Khadijah, S.Kom., M.Cs.',
                'kodemk' => 'PAIK6401',
                'jam_mulai' => '07:00:00',
                'jam_selesai' => '09:30:00'
            ],
            [
                'ruang' => 'A102',
                'kelas' => 'B',
                'semester_aktif' => 4,
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Senin',
                'pengampu_1' => 'Edy Suharto, S.T., M.Kom',
                'pengampu_2' => 'Khadijah, S.Kom., M.Cs.',
                'kodemk' => 'PAIK6401',
                'jam_mulai' => '09:40:00',
                'jam_selesai' => '12:10:00'
            ],
            [
                'ruang' => 'A103',
                'kelas' => 'C',
                'semester_aktif' => 4,
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Senin',
                'pengampu_1' => 'Edy Suharto, S.T., M.Kom',
                'pengampu_2' => 'Khadijah, S.Kom., M.Cs.',
                'kodemk' => 'PAIK6401',
                'jam_mulai' => '13:00:00',
                'jam_selesai' => '15:30:00'
            ],
            [
                'ruang' => 'B101',
                'kelas' => 'D',
                'semester_aktif' => 4,
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Senin',
                'pengampu_1' => 'Edy Suharto, S.T., M.Kom',
                'pengampu_2' => 'Khadijah, S.Kom., M.Cs.',
                'kodemk' => 'PAIK6401',
                'jam_mulai' => '15:40:00',
                'jam_selesai' => '18:10:00'
            ],

            // Jadwal untuk Jaringan Komputer
            [
                'ruang' => 'B102',
                'kelas' => 'A',
                'semester_aktif' => 4,
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Selasa',
                'pengampu_1' => 'Guruh Aryotejo, S.Kom., M.Sc.',
                'pengampu_2' => 'Muhammad Malik Hakim, S.T., M.T.I.',
                'pengampu_3' => 'Dr. Indra Waspada, S.T., M.TI',
                'kodemk' => 'PAIK6402',
                'jam_mulai' => '07:00:00',
                'jam_selesai' => '09:30:00'
            ],
            [
                'ruang' => 'B103',
                'kelas' => 'B',
                'semester_aktif' => 4,
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Selasa',
                'pengampu_1' => 'Guruh Aryotejo, S.Kom., M.Sc.',
                'pengampu_2' => 'Muhammad Malik Hakim, S.T., M.T.I.',
                'pengampu_3' => 'Dr. Indra Waspada, S.T., M.TI',
                'kodemk' => 'PAIK6402',
                'jam_mulai' => '09:40:00',
                'jam_selesai' => '12:10:00'
            ],
            [
                'ruang' => 'C101',
                'kelas' => 'C',
                'semester_aktif' => 4,
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Selasa',
                'pengampu_1' => 'Guruh Aryotejo, S.Kom., M.Sc.',
                'pengampu_2' => 'Muhammad Malik Hakim, S.T., M.T.I.',
                'pengampu_3' => 'Dr. Indra Waspada, S.T., M.TI',
                'kodemk' => 'PAIK6402',
                'jam_mulai' => '13:00:00',
                'jam_selesai' => '15:30:00'
            ],
            [
                'ruang' => 'C102',
                'kelas' => 'D',
                'semester_aktif' => 4,
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Selasa',
                'pengampu_1' => 'Guruh Aryotejo, S.Kom., M.Sc.',
                'pengampu_2' => 'Muhammad Malik Hakim, S.T., M.T.I.',
                'pengampu_3' => 'Dr. Indra Waspada, S.T., M.TI',
                'kodemk' => 'PAIK6402',
                'jam_mulai' => '15:40:00',
                'jam_selesai' => '18:10:00'
            ],

            // Jadwal untuk Manajemen Basis Data
            [
                'ruang' => 'C103',
                'kelas' => 'A',
                'semester_aktif' => 4,
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Rabu',
                'pengampu_1' => 'Edy Suharto, S.T., M.Kom',
                'pengampu_2' => 'Beta Noranita, S.Si., M.Kom.',
                'kodemk' => 'PAIK6403',
                'jam_mulai' => '07:00:00',
                'jam_selesai' => '09:30:00'
            ],
            [
                'ruang' => 'C101',
                'kelas' => 'B',
                'semester_aktif' => 4,
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Rabu',
                'pengampu_1' => 'Edy Suharto, S.T., M.Kom',
                'pengampu_2' => 'Beta Noranita, S.Si., M.Kom.',
                'kodemk' => 'PAIK6403',
                'jam_mulai' => '09:40:00',
                'jam_selesai' => '12:10:00'
            ],
            [
                'ruang' => 'C102',
                'kelas' => 'C',
                'semester_aktif' => 4,
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Rabu',
                'pengampu_1' => 'Edy Suharto, S.T., M.Kom',
                'pengampu_2' => 'Beta Noranita, S.Si., M.Kom.',
                'kodemk' => 'PAIK6403',
                'jam_mulai' => '13:00:00',
                'jam_selesai' => '15:30:00'
            ],
            [
                'ruang' => 'D101',
                'kelas' => 'D',
                'semester_aktif' => 4,
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Rabu',
                'pengampu_1' => 'Edy Suharto, S.T., M.Kom',
                'pengampu_2' => 'Beta Noranita, S.Si., M.Kom.',
                'kodemk' => 'PAIK6403',
                'jam_mulai' => '15:40:00',
                'jam_selesai' => '18:10:00'
            ],

            // Jadwal untuk Gravika dan Komputasi Visual
            [
                'ruang' => 'D102',
                'kelas' => 'A',
                'semester_aktif' => 4,
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Kamis',
                'pengampu_1' => 'Dr. Aris Sugiharto, S.Si., M.Kom.',
                'pengampu_2' => 'Dr. Helmie Arif Wibawa, S.Si., M.Cs.',
                'kodemk' => 'PAIK6404',
                'jam_mulai' => '07:00:00',
                'jam_selesai' => '09:30:00'
            ],
            [
                'ruang' => 'D103',
                'kelas' => 'B',
                'semester_aktif' => 4,
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Kamis',
                'pengampu_1' => 'Dr. Aris Sugiharto, S.Si., M.Kom.',
                'pengampu_2' => 'Dr. Helmie Arif Wibawa, S.Si., M.Cs.',
                'kodemk' => 'PAIK6404',
                'jam_mulai' => '09:40:00',
                'jam_selesai' => '12:10:00'
            ],
            [
                'ruang' => 'E101',
                'kelas' => 'C',
                'semester_aktif' => 4,
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Kamis',
                'pengampu_1' => 'Dr. Aris Sugiharto, S.Si., M.Kom.',
                'pengampu_2' => 'Dr. Helmie Arif Wibawa, S.Si., M.Cs.',
                'kodemk' => 'PAIK6404',
                'jam_mulai' => '13:00:00',
                'jam_selesai' => '15:30:00'
            ],
            [
                'ruang' => 'E102',
                'kelas' => 'D',
                'semester_aktif' => 4,
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Kamis',
                'pengampu_1' => 'Dr. Aris Sugiharto, S.Si., M.Kom.',
                'pengampu_2' => 'Dr. Helmie Arif Wibawa, S.Si., M.Cs.',
                'kodemk' => 'PAIK6404',
                'jam_mulai' => '15:40:00',
                'jam_selesai' => '18:10:00'
            ],

            // Jadwal untuk Rekayasa Perangkat Lunak
            [
                'ruang' => 'A101',
                'kelas' => 'A',
                'semester_aktif' => 4,
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Jumat',
                'pengampu_1' => 'Dr. Aris Puji Widodo, S.Si., M.T.',
                'pengampu_2' => 'Satriyo Adhy, S.Si., M.T.',
                'kodemk' => 'PAIK6405',
                'jam_mulai' => '07:00:00',
                'jam_selesai' => '09:30:00'
            ],
            [
                'ruang' => 'A102',
                'kelas' => 'B',
                'semester_aktif' => 4,
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Jumat',
                'pengampu_1' => 'Dr. Aris Puji Widodo, S.Si., M.T.',
                'pengampu_2' => 'Satriyo Adhy, S.Si., M.T.',
                'kodemk' => 'PAIK6405',
                'jam_mulai' => '09:40:00',
                'jam_selesai' => '12:10:00'
            ],
            [
                'ruang' => 'A103',
                'kelas' => 'C',
                'semester_aktif' => 4,
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Jumat',
                'pengampu_1' => 'Dr. Aris Puji Widodo, S.Si., M.T.',
                'pengampu_2' => 'Satriyo Adhy, S.Si., M.T.',
                'kodemk' => 'PAIK6405',
                'jam_mulai' => '13:00:00',
                'jam_selesai' => '15:30:00'
            ],
            [
                'ruang' => 'B101',
                'kelas' => 'D',
                'semester_aktif' => 4,
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Jumat',
                'pengampu_1' => 'Dr. Aris Puji Widodo, S.Si., M.T.',
                'pengampu_2' => 'Satriyo Adhy, S.Si., M.T.',
                'kodemk' => 'PAIK6405',
                'jam_mulai' => '15:40:00',
                'jam_selesai' => '18:10:00'
            ],

            // Jadwal untuk Sistem Cerdas
            [
                'ruang' => 'B102',
                'kelas' => 'A',
                'semester_aktif' => 4,
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Sabtu',
                'pengampu_1' => 'Sandy Kurniawan, S.Kom., M.Kom.',
                'pengampu_2' => 'Dr. Helmie Arif Wibawa, S.Si., M.Cs.',
                'kodemk' => 'PAIK6406',
                'jam_mulai' => '07:00:00',
                'jam_selesai' => '09:30:00'
            ],
            [
                'ruang' => 'B103',
                'kelas' => 'B',
                'semester_aktif' => 4,
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Sabtu',
                'pengampu_1' => 'Sandy Kurniawan, S.Kom., M.Kom.',
                'pengampu_2' => 'Dr. Helmie Arif Wibawa, S.Si., M.Cs.',
                'kodemk' => 'PAIK6406',
                'jam_mulai' => '09:40:00',
                'jam_selesai' => '12:10:00'
            ],
            [
                'ruang' => 'C101',
                'kelas' => 'C',
                'semester_aktif' => 4,
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Sabtu',
                'pengampu_1' => 'Sandy Kurniawan, S.Kom., M.Kom.',
                'pengampu_2' => 'Dr. Helmie Arif Wibawa, S.Si., M.Cs.',
                'kodemk' => 'PAIK6406',
                'jam_mulai' => '13:00:00',
                'jam_selesai' => '15:30:00'
            ],
            [
                'ruang' => 'C102',
                'kelas' => 'D',
                'semester_aktif' => 4,
                'jurusan' => 'Informatika',
                'sks' => 3,
                'hari' => 'Sabtu',
                'pengampu_1' => 'Sandy Kurniawan, S.Kom., M.Kom.',
                'pengampu_2' => 'Dr. Helmie Arif Wibawa, S.Si., M.Cs.',
                'kodemk' => 'PAIK6406',
                'jam_mulai' => '15:40:00',
                'jam_selesai' => '18:10:00'
            ],
            
        ];
        
        

        foreach ($jadwal as $val) {
            Jadwal::create($val);
        }
    }
}