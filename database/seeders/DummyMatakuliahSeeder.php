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
            ['nama' => 'Dasar Pemrograman', 'kodemk' => 'PAIK6102', 'jurusan' => 'Informatika', 'sks' => 3, 'semester' => 1, 'jenis_matkul' => 'Wajib'],
            ['nama' => 'Olahraga', 'kodemk' => 'UUW00005', 'jurusan' => 'Informatika', 'sks' => 1, 'semester' => 1, 'jenis_matkul' => 'Wajib'],
            ['nama' => 'Logika Informatika', 'kodemk' => 'PAIK6104', 'jurusan' => 'Informatika', 'sks' => 3, 'semester' => 1, 'jenis_matkul' => 'Wajib'],
            ['nama' => 'Dasar Sistem', 'kodemk' => 'PAIK6103', 'jurusan' => 'Informatika', 'sks' => 3, 'semester' => 1, 'jenis_matkul' => 'Wajib'],
            ['nama' => 'Bahasa Inggris', 'kodemk' => 'UUW00007', 'jurusan' => 'Informatika', 'sks' => 2, 'semester' => 1, 'jenis_matkul' => 'Wajib'],
            ['nama' => 'Matematika I', 'kodemk' => 'PAIK6101', 'jurusan' => 'Informatika', 'sks' => 2, 'semester' => 1, 'jenis_matkul' => 'Wajib'],
            ['nama' => 'Struktur Diskrit', 'kodemk' => 'PAIK6105', 'jurusan' => 'Informatika', 'sks' => 4, 'semester' => 1, 'jenis_matkul' => 'Wajib'],
            ['nama' => 'Pancasila dan Kewarganegaraan', 'kodemk' => 'UUW00003', 'jurusan' => 'Informatika', 'sks' => 3, 'semester' => 1, 'jenis_matkul' => 'Wajib'],
            ['nama' => 'Algoritma dan Pemrograman', 'kodemk' => 'PAIK6202', 'jurusan' => 'Informatika', 'sks' => 4, 'semester' => 2, 'jenis_matkul' => 'Wajib'],
            ['nama' => 'Bahasa Indonesia', 'kodemk' => 'UUW00004', 'jurusan' => 'Informatika', 'sks' => 2, 'semester' => 2, 'jenis_matkul' => 'Wajib'],
            ['nama' => 'Internet of Things (IoT)', 'kodemk' => 'UUW00006', 'jurusan' => 'Informatika', 'sks' => 2, 'semester' => 2, 'jenis_matkul' => 'Wajib'],
            ['nama' => 'Aljabar Linier', 'kodemk' => 'PAIK6204', 'jurusan' => 'Informatika', 'sks' => 3, 'semester' => 2, 'jenis_matkul' => 'Wajib'],
            ['nama' => 'Organisasi dan Arsitektur Komputer', 'kodemk' => 'PAIK6203', 'jurusan' => 'Informatika', 'sks' => 3, 'semester' => 2, 'jenis_matkul' => 'Wajib'],
            ['nama' => 'Pendidikan Agama Islam', 'kodemk' => 'UUW00011', 'jurusan' => 'Informatika', 'sks' => 2, 'semester' => 2, 'jenis_matkul' => 'Wajib'],
            ['nama' => 'Masyarakat dan Etika Profesi', 'kodemk' => 'PAIK6603', 'jurusan' => 'Informatika', 'sks' => 3, 'semester' => 6, 'jenis_matkul' => 'Wajib'],
            ['nama' => 'Matematika II', 'kodemk' => 'PAIK6201', 'jurusan' => 'Informatika', 'sks' => 2, 'semester' => 2, 'jenis_matkul' => 'Wajib'],
            ['nama' => 'Struktur Data', 'kodemk' => 'PAIK6301', 'jurusan' => 'Informatika', 'sks' => 4, 'semester' => 3, 'jenis_matkul' => 'Wajib'],
            ['nama' => 'Statistika', 'kodemk' => 'PAIK6306', 'jurusan' => 'Informatika', 'sks' => 2, 'semester' => 3, 'jenis_matkul' => 'Wajib'],
            ['nama' => 'Basis Data', 'kodemk' => 'PAIK6303', 'jurusan' => 'Informatika', 'sks' => 4, 'semester' => 3, 'jenis_matkul' => 'Wajib'],
            ['nama' => 'Keamanan dan Jaminan Informasi', 'kodemk' => 'PAIK6506', 'jurusan' => 'Informatika', 'sks' => 3, 'semester' => 3, 'jenis_matkul' => 'Wajib'],
            ['nama' => 'Metode Numerik', 'kodemk' => 'PAIK6304', 'jurusan' => 'Informatika', 'sks' => 3, 'semester' => 3, 'jenis_matkul' => 'Wajib'],
            ['nama' => 'Sistem Operasi', 'kodemk' => 'PAIK6302', 'jurusan' => 'Informatika', 'sks' => 3, 'semester' => 3, 'jenis_matkul' => 'Wajib'],
            ['nama' => 'Interaksi Manusia dan Komputer', 'kodemk' => 'PAIK6305', 'jurusan' => 'Informatika', 'sks' => 3, 'semester' => 3, 'jenis_matkul' => 'Wajib'],
            ['nama' => 'Kewirausahaan', 'kodemk' => 'UUW00008', 'jurusan' => 'Informatika', 'sks' => 2, 'semester' => 5, 'jenis_matkul' => 'Wajib'],
            ['nama' => 'Sistem Cerdas', 'kodemk' => 'PAIK6406', 'jurusan' => 'Informatika', 'sks' => 3, 'semester' => 4, 'jenis_matkul' => 'Wajib'],
            ['nama' => 'Grafika dan Komputasi Visual', 'kodemk' => 'PAIK6404', 'jurusan' => 'Informatika', 'sks' => 3, 'semester' => 4, 'jenis_matkul' => 'Wajib'],
            ['nama' => 'Pemrograman Berorientasi Objek', 'kodemk' => 'PAIK6401', 'jurusan' => 'Informatika', 'sks' => 3, 'semester' => 4, 'jenis_matkul' => 'Wajib'],
            ['nama' => 'Jaringan Komputer', 'kodemk' => 'PAIK6402', 'jurusan' => 'Informatika', 'sks' => 3, 'semester' => 4, 'jenis_matkul' => 'Wajib'],
            ['nama' => 'Manajemen Basis Data', 'kodemk' => 'PAIK6403', 'jurusan' => 'Informatika', 'sks' => 3, 'semester' => 4, 'jenis_matkul' => 'Wajib'],
            ['nama' => 'Rekayasa Perangkat Lunak', 'kodemk' => 'PAIK6405', 'jurusan' => 'Informatika', 'sks' => 3, 'semester' => 4, 'jenis_matkul' => 'Wajib'],
            ['nama' => 'Teori Bahasa dan Otomata', 'kodemk' => 'PAIK6702', 'jurusan' => 'Informatika', 'sks' => 3, 'semester' => 7, 'jenis_matkul' => 'Wajib'],
            ['nama' => 'Pengembangan Berbasis Platform', 'kodemk' => 'PAIK6501', 'jurusan' => 'Informatika', 'sks' => 4, 'semester' => 5, 'jenis_matkul' => 'Wajib'],
            ['nama' => 'Komputasi Tersebar dan Paralel', 'kodemk' => 'PAIK6502', 'jurusan' => 'Informatika', 'sks' => 3, 'semester' => 5, 'jenis_matkul' => 'Wajib'],
            ['nama' => 'Pembelajaran Mesin', 'kodemk' => 'PAIK6505', 'jurusan' => 'Informatika', 'sks' => 3, 'semester' => 5, 'jenis_matkul' => 'Wajib'],
            ['nama' => 'Sistem Informasi', 'kodemk' => 'PAIK6503', 'jurusan' => 'Informatika', 'sks' => 3, 'semester' => 5, 'jenis_matkul' => 'Wajib'],
            ['nama' => 'Proyek Perangkat Lunak', 'kodemk' => 'PAIK6504', 'jurusan' => 'Informatika', 'sks' => 3, 'semester' => 5, 'jenis_matkul' => 'Wajib']
        ];

        foreach($matakuliah as $key => $val){
            matakuliah::create($val);
        }
    }
}
