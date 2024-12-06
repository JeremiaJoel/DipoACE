<?php

namespace Database\Seeders;

use App\Models\irs;
use App\Models\khs;
use App\Models\mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyKHSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data mahasiswa yang ingin dimasukkan
        $mahasiswaData = [
            [
                'nim' => '24060122140103',
                'semester' => '4',
                'tahun_ajaran' => '2023/2024 Genap',
                'kodemk' => 'PAIK6401',
                'matakuliah' => 'Pemrograman Berorientasi Objek',
                'jenis' => 'Wajib',
                'status_mk' => 'Baru',
                'sks' => '3',
                'nilai_huruf' => 'B',
                'bobot' => '',
                'sks_x_bobot' => '',
            ],
            [
                'nim' => '24060122140103',
                'semester' => '4',
                'tahun_ajaran' => '2023/2024 Genap',
                'kodemk' => 'PAIK6402',
                'matakuliah' => 'Jaringan Komputer',
                'jenis' => 'Wajib',
                'status_mk' => 'Baru',
                'sks' => '3',
                'nilai_huruf' => 'A',
                'bobot' => '',
                'sks_x_bobot' => '',
            ],
            [
                'nim' => '24060122140103',
                'semester' => '4',
                'tahun_ajaran' => '2023/2024 Genap',
                'kodemk' => 'PAIK6403',
                'matakuliah' => 'Manajemen Basis Data',
                'jenis' => 'Wajib',
                'status_mk' => 'Baru',
                'sks' => '3',
                'nilai_huruf' => 'C',
                'bobot' => '',
                'sks_x_bobot' => '',
            ],
            [
                'nim' => '24060122140103',
                'semester' => '4',
                'tahun_ajaran' => '2023/2024 Genap',
                'kodemk' => 'PAIK6404',
                'matakuliah' => 'Grafika dan Komputasi Visual',
                'jenis' => 'Wajib',
                'status_mk' => 'Baru',
                'sks' => '3',
                'nilai_huruf' => 'A',
                'bobot' => '',
                'sks_x_bobot' => '',
            ],
            [
                'nim' => '24060122140103',
                'semester' => '4',
                'tahun_ajaran' => '2023/2024 Genap',
                'kodemk' => 'PAIK6405',
                'matakuliah' => 'Rekayasa Perangkat Lunak',
                'jenis' => 'Wajib',
                'status_mk' => 'Baru',
                'sks' => '3',
                'nilai_huruf' => 'B',
                'bobot' => '',
                'sks_x_bobot' => '',
            ],
            [
                'nim' => '24060122140103',
                'semester' => '4',
                'tahun_ajaran' => '2023/2024 Genap',
                'kodemk' => 'PAIK6406',
                'matakuliah' => 'Sistem Cerdas',
                'jenis' => 'Wajib',
                'status_mk' => 'Baru',
                'sks' => '3',
                'nilai_huruf' => 'B',
                'bobot' => '',
                'sks_x_bobot' => '',
            ],
            [
                'nim' => '24060121130076',
                'semester' => '4',
                'tahun_ajaran' => '2023/2024 Genap',
                'kodemk' => 'PAIK6401',
                'matakuliah' => 'Pemrograman Berorientasi Objek',
                'jenis' => 'Wajib',
                'status_mk' => 'Baru',
                'sks' => '3',
                'nilai_huruf' => 'C',
                'bobot' => '',
                'sks_x_bobot' => '',
            ],
            [
                'nim' => '24060121130076',
                'semester' => '4',
                'tahun_ajaran' => '2023/2024 Genap',
                'kodemk' => 'PAIK6402',
                'matakuliah' => 'Jaringan Komputer',
                'jenis' => 'Wajib',
                'status_mk' => 'Baru',
                'sks' => '3',
                'nilai_huruf' => 'A',
                'bobot' => '',
                'sks_x_bobot' => '',
            ],
            [
                'nim' => '24060121130076',
                'semester' => '4',
                'tahun_ajaran' => '2023/2024 Genap',
                'kodemk' => 'PAIK6403',
                'matakuliah' => 'Manajemen Basis Data',
                'jenis' => 'Wajib',
                'status_mk' => 'Baru',
                'sks' => '3',
                'nilai_huruf' => 'C',
                'bobot' => '',
                'sks_x_bobot' => '',
            ],
            [
                'nim' => '24060121130076',
                'semester' => '4',
                'tahun_ajaran' => '2023/2024 Genap',
                'kodemk' => 'PAIK6404',
                'matakuliah' => 'Grafika dan Komputasi Visual',
                'jenis' => 'Wajib',
                'status_mk' => 'Baru',
                'sks' => '3',
                'nilai_huruf' => 'B',
                'bobot' => '',
                'sks_x_bobot' => '',
            ],
            [
                'nim' => '24060121130076',
                'semester' => '4',
                'tahun_ajaran' => '2023/2024 Genap',
                'kodemk' => 'PAIK6405',
                'matakuliah' => 'Rekayasa Perangkat Lunak',
                'jenis' => 'Wajib',
                'status_mk' => 'Baru',
                'sks' => '3',
                'nilai_huruf' => 'B',
                'bobot' => '',
                'sks_x_bobot' => '',
            ],
            [
                'nim' => '24060121130076',
                'semester' => '4',
                'tahun_ajaran' => '2023/2024 Genap',
                'kodemk' => 'PAIK6406',
                'matakuliah' => 'Sistem Cerdas',
                'jenis' => 'Wajib',
                'status_mk' => 'Baru',
                'sks' => '3',
                'nilai_huruf' => 'C',
                'bobot' => '',
                'sks_x_bobot' => '',
            ],
        ];


        foreach ($mahasiswaData as $data) {
            // Ambil data mahasiswa berdasarkan NIM
            $mahasiswa = Mahasiswa::where('nim', $data['nim'])->first();

            if ($mahasiswa) {
                // Ambil data IRS berdasarkan NIM
                $irs = Irs::where('nim', $mahasiswa->nim)
                    ->where('kodemk', $data['kodemk']) // Pastikan ini relevan untuk matakuliah
                    ->first();



                if ($irs) {
                    // Ambil data matakuliah berdasarkan kodemk
                    $mk = Matakuliah::where('kodemk', $data['kodemk'])->first();

                    if ($mk) {
                        // Tentukan bobot berdasarkan nilai huruf
                        $bobot = $this->getBobotByNilaiHuruf($data['nilai_huruf']);

                        // Menghitung sks_x_bobot
                        $sks_x_bobot = $mk->sks * $bobot;

                        // Insert data ke tabel 'khs'
                        Khs::create([
                            'nim' => $mahasiswa->nim,
                            'semester' => $irs->semester,
                            'tahun_ajaran' => $irs->tahun_ajaran,
                            'kodemk' => $mk->kodemk,
                            'matakuliah' => $mk->nama,
                            'jenis' => $mk->jenis_matkul,
                            'status_mk' => 'Baru',
                            'sks' => $mk->sks,
                            'nilai_huruf' => $data['nilai_huruf'],
                            'bobot' => $bobot,
                            'sks_x_bobot' => $sks_x_bobot,
                        ]);
                    }
                }
            }
        }
    }

    /**
     * Fungsi untuk mendapatkan bobot berdasarkan nilai huruf.
     *
     * @param string $nilaiHuruf
     * @return int
     */
    private function getBobotByNilaiHuruf($nilaiHuruf)
    {
        // Mapping nilai huruf ke bobot
        $mappingBobot = [
            'A' => 4,
            'B' => 3,
            'C' => 2,
            'D' => 1,
            'E' => 0,
        ];

        // Mengembalikan bobot berdasarkan nilai huruf
        return $mappingBobot[$nilaiHuruf] ?? 0;  // Default ke 0 jika nilai huruf tidak ada
    }
}
