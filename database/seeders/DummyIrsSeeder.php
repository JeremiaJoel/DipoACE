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
                'nim' => '24060122140106',
                'ruang' => 'A101',
                'sks' => '3',
                'kodemk' => 'PAIK6501',
                'hari' => 'Senin',
                'jam_mulai' => '07:00:00',
                'jam_selesai' => '09:30:00',
                'kelas' => 'A',
                'semester' => '5',
                'tahun_ajaran' => '2023/2024 Genap',
                'jurusan' => 'Informatika',
                'pengampu_1' => 'Edy Suharto, S.T., M.Kom',
                'pengampu_2' => 'Khadijah, S.Kom., M.Cs.',
                'pengampu_3' => '',
                'status_irs' => 'Belum Disetujui',
                'status_mk' => 'Baru',
            ],
            [
                'nim' => '24060122140106',
                'ruang' => 'B102',
                'sks' => '3',
                'kodemk' => 'PAIK6502',
                'hari' => 'Selasa',
                'jam_mulai' => '07:00:00',
                'jam_selesai' => '09:30:00',
                'kelas' => 'A',
                'semester' => '5',
                'tahun_ajaran' => '2023/2024 Genap',
                'jurusan' => 'Informatika',
                'pengampu_1' => 'Muhammad Malik Hakim, S.T., M.T.I.',
                'pengampu_2' => 'Guruh Aryotejo, S.Kom., M.Sc.',
                'pengampu_3' => 'Dr. Indra Waspada, S.T., M.T.I',
                'status_irs' => 'Belum Disetujui',
                'status_mk' => 'Baru',
            ],
            [
                'nim' => '24060122140106',
                'ruang' => 'C103',
                'sks' => '3',
                'kodemk' => 'PAIK6503',
                'hari' => 'Rabu',
                'jam_mulai' => '07:00:00',
                'jam_selesai' => '09:30:00',
                'kelas' => 'A',
                'semester' => '5',
                'tahun_ajaran' => '2023/2024 Genap',
                'jurusan' => 'Informatika',
                'pengampu_1' => 'Edy Suharto, S.T., M.Kom',
                'pengampu_2' => 'Beta Noranita, S.Si., M.Kom.',
                'pengampu_3' => '',
                'status_irs' => 'Belum Disetujui',
                'status_mk' => 'Baru',
            ],
            [
                'nim' => '24060122140106',
                'ruang' => 'D102',
                'sks' => '3',
                'kodemk' => 'PAIK6504',
                'hari' => 'Kamis',
                'jam_mulai' => '07:00:00',
                'jam_selesai' => '09:30:00',
                'kelas' => 'A',
                'semester' => '5',
                'tahun_ajaran' => '2023/2024 Genap',
                'jurusan' => 'Informatika',
                'pengampu_1' => 'Dr. Aris Sugiharto, S.Si., M.Kom.',
                'pengampu_2' => 'Dr. Helmie Arif Wibawa, S.Si., M.Cs.',
                'pengampu_3' => '',
                'status_irs' => 'Belum Disetujui',
                'status_mk' => 'Baru',
            ],
            [
                'nim' => '24060122140106',
                'ruang' => 'A101',
                'sks' => '3',
                'kodemk' => 'PAIK6505',
                'hari' => 'Jumat',
                'jam_mulai' => '07:00:00',
                'jam_selesai' => '09:30:00',
                'kelas' => 'A',
                'semester' => '5',
                'tahun_ajaran' => '2023/2024 Genap',
                'jurusan' => 'Informatika',
                'pengampu_1' => 'Dr. Aris Puji Widodo, S.Si., M.T.',
                'pengampu_2' => 'Satriyo Adhy, S.Si., M.T.',
                'pengampu_3' => '',
                'status_irs' => 'Belum Disetujui',
                'status_mk' => 'Baru',
            ],
            [
                'nim' => '24060122140106',
                'ruang' => 'C101',
                'sks' => '3',
                'kodemk' => 'PAIK6506',
                'hari' => 'Senin',
                'jam_mulai' => '09:40:00',
                'jam_selesai' => '12:10:00',
                'kelas' => 'B',
                'semester' => '5',
                'tahun_ajaran' => '2023/2024 Genap',
                'jurusan' => 'Informatika',
                'pengampu_1' => 'Sandy Kurniawan, S.Kom., M.Kom.',
                'pengampu_2' => 'Dr. Helmie Arif Wibawa, S.Si., M.Cs.',
                'pengampu_3' => '',
                'status_irs' => 'Belum Disetujui',
                'status_mk' => 'Baru',
            ],
        ];



        foreach ($irs as $key => $val) {
            irs::create($val);
        }
    }
}
