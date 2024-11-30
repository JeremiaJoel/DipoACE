<?php

namespace Database\Seeders;
use App\Models\jadwal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                'ruang'=> 'E101',
                'matakuliah'=> 'Machine Learning',
                'waktu'=>  '07.00 - 09.30',
                'kelas'=>  'A',
                'semester_aktif' => '5',
                'jurusan' =>'informatika',
                'pengampu_1' => 'Dr. Retno Kusumaningrum, S.Si., M.Kom.',
                'pengampu_2' => 'Rismiyati, B.Eng, M.Cs.'
            ],
            [
                'ruang'=> 'E101',
                'matakuliah'=> 'Machine Learning',
                'waktu'=>  '09.40 -12.10',
                'kelas'=>  'B',
                'semester_aktif' => '5',
                'jurusan' =>'informatika',
                'pengampu_1' => 'Dr. Retno Kusumaningrum, S.Si., M.Kom.',
                'pengampu_2' => 'Rismiyati, B.Eng, M.Cs.'
            ],
            [
                'ruang'=> 'E101',
                'matakuliah'=> 'Machine Learning',
                'waktu'=>  '13.00 - 15.30',
                'kelas'=>  'C',
                'semester_aktif' => '5',
                'jurusan' =>'informatika',
                'pengampu_1' => 'Dr. Retno Kusumaningrum, S.Si., M.Kom.',
                'pengampu_2' => 'Rismiyati, B.Eng, M.Cs.'
            ],
            [
                'ruang'=> 'E101',
                'matakuliah'=> 'Machine Learning',
                'waktu'=>  '15.40 - 18.10',
                'kelas'=>  'D',
                'semester_aktif' => '5',
                'jurusan' =>'informatika',
                'pengampu_1' => 'Dr. Retno Kusumaningrum, S.Si., M.Kom.',
                'pengampu_2' => 'Rismiyati, B.Eng, M.Cs.'
            ],
            [       
                'ruang'=> 'E102',
                'matakuliah'=> 'Sistem Informasi',
                'waktu'=>  '07.00 - 09.30',
                'kelas'=>  'A',
                'semester_aktif' => '5',
                'jurusan' =>'informatika',
                'pengampu_1' => 'Beta Noranita, S.Si., M.Kom.',
                'pengampu_2' => 'Rismiyati, B.Eng, M.Cs.'
            ],
            [       
                'ruang'=> 'E102',
                'matakuliah'=> 'Sistem Informasi',
                'waktu'=>  '09.40 - 12.10',
                'kelas'=>  'B',
                'semester_aktif' => '5',
                'jurusan' =>'informatika',
                'pengampu_1' => 'Beta Noranita, S.Si., M.Kom.',
                'pengampu_2' => 'Rismiyati, B.Eng, M.Cs.'
            ],
            [       
                'ruang'=> 'E102',
                'matakuliah'=> 'Sistem Informasi',
                'waktu'=>  '13.00 - 15.30',
                'kelas'=>  'C',
                'semester_aktif' => '5',
                'jurusan' =>'informatika',
                'pengampu_1' => 'Beta Noranita, S.Si., M.Kom.',
                'pengampu_2' => 'Rismiyati, B.Eng, M.Cs.'
            ],
            [       
                'ruang'=> 'E102',
                'matakuliah'=> 'Sistem Informasi',
                'waktu'=>  '15.40 - 18.10',
                'kelas'=>  'D',
                'semester_aktif' => '5',
                'jurusan' =>'informatika',
                'pengampu_1' => 'Beta Noranita, S.Si., M.Kom.',
                'pengampu_2' => 'Rismiyati, B.Eng, M.Cs.'
            ],
            [
                'ruang'=> 'E103',
                'matakuliah'=> 'Pengembangan Berbasis Platform',
                'waktu'=>  '07.00 - 10.20',
                'kelas'=>  'A',
                'semester_aktif' => '5',
                'jurusan' =>'informatika',
                'pengampu_1' => 'Sandy Kurniawan, S.Kom., M.Kom.',
                'pengampu_2' => 'Adhe Setya Pramayoga, M.T.',
                'pengampu_3' => 'Henri Tantyoko, S.Kom., M.Kom.'
            ],
            [
                'ruang'=> 'E104',
                'matakuliah'=> 'Pengembangan Berbasis Platform',
                'waktu'=>  '09.30 - 12.50',
                'kelas'=>  'B',
                'semester_aktif' => '5',
                'jurusan' =>'informatika',
                'pengampu_1' => 'Sandy Kurniawan, S.Kom., M.Kom.',
                'pengampu_2' => 'Adhe Setya Pramayoga, M.T.',
                'pengampu_3' => 'Henri Tantyoko, S.Kom., M.Kom.'
            ],
            [
                'ruang'=> 'E103',
                'matakuliah'=> 'Pengembangan Berbasis Platform',
                'waktu'=>  '13.00 - 16.20',
                'kelas'=>  'C',
                'semester_aktif' => '5',
                'jurusan' =>'informatika',
                'pengampu_1' => 'Sandy Kurniawan, S.Kom., M.Kom.',
                'pengampu_2' => 'Adhe Setya Pramayoga, M.T.',
                'pengampu_3' => 'Henri Tantyoko, S.Kom., M.Kom.'
            ],
            [
                'ruang'=> 'E104',
                'matakuliah'=> 'Pengembangan Berbasis Platform',
                'waktu'=>  '14.00 - 17.20',
                'kelas'=>  'D',
                'semester_aktif' => '5',
                'jurusan' =>'informatika',
                'pengampu_1' => 'Sandy Kurniawan, S.Kom., M.Kom.',
                'pengampu_2' => 'Adhe Setya Pramayoga, M.T.',
                'pengampu_3' => 'Henri Tantyoko, S.Kom., M.Kom.'
            ],
            [
                'ruang'=> 'A101',
                'matakuliah'=> 'Komputasi Tersebar dan Paralel',
                'waktu'=>  '07.00 - 09.30',
                'kelas'=>  'A',
                'semester_aktif' => '5',
                'jurusan' =>'informatika',
                'pengampu_1' => 'Guru Aryo Tejo, S.Kom., M.Sc.',
                'pengampu_2' => 'Adhe Setya Pramayoga, M.T.',
                'pengampu_3' => 'Henri Tantyoko, S.Kom., M.Kom.'
                
            ],
            [
                 'ruang'=> 'A101',
                'matakuliah'=> 'Komputasi Tersebar dan Paralel',
                'waktu'=>  '09.40 - 12.10',
                'kelas'=>  'B',
                'semester_aktif' => '5',
                'jurusan' =>'informatika',
                'pengampu_1' => 'Guru Aryo Tejo, S.Kom., M.Sc.',
                'pengampu_2' => 'Adhe Setya Pramayoga, M.T.',
                'pengampu_3' => 'Henri Tantyoko, S.Kom., M.Kom.'
            
            ],
            [
                'ruang'=> 'A101',
                'matakuliah'=> 'Komputasi Tersebar dan Paralel',
                'waktu'=>  '13.00 - 15.30',
                'kelas'=>  'C',
                'semester_aktif' => '5',
                'jurusan' =>'informatika',
                'pengampu_1' => 'Guru Aryo Tejo, S.Kom., M.Sc.',
                'pengampu_2' => 'Adhe Setya Pramayoga, M.T.',
                'pengampu_3' => 'Henri Tantyoko, S.Kom., M.Kom.'
            ],
            [
                 'ruang'=> 'A101',
                'matakuliah'=> 'Komputasi Tersebar dan Paralel',
                'waktu'=>  '15.40 - 18.10',
                'kelas'=>  'D',
                'semester_aktif' => '5',
                'jurusan' =>'informatika',
                'pengampu_1' => 'Guru Aryo Tejo, S.Kom., M.Sc.',
                'pengampu_2' => 'Adhe Setya Pramayoga, M.T.',
                'pengampu_3' => 'Henri Tantyoko, S.Kom., M.Kom.'
            ],
            [
                'ruang'=> 'A102',
                'matakuliah'=> 'Proyek Perangkat Lunak',
                'waktu'=>  '07.00 - 09.30',
                'kelas'=>  'A',
                'semester_aktif' => '5',
                'jurusan' =>'informatika',
                'pengampu_1' => 'Dinar Mutiara Kusumo Nugraheni, S.T., M.InfoTech.(Comp.), Ph.D.',
                'pengampu_2' => 'Dr. Aris Puji Widodo, S.Si., M.T.',
                'pengampu_3' => 'Yunila Dwi Putri Ariyanti, S.Kom., M.Kom.'
            ],
            [
                    'ruang'=> 'A102',
                'matakuliah'=> 'Proyek Perangkat Lunak',
                'waktu'=>  '09.40 - 12.10',
                'kelas'=>  'B',
                'semester_aktif' => '5',
                'jurusan' =>'informatika',
                'pengampu_1' => 'Dinar Mutiara Kusumo Nugraheni, S.T., M.InfoTech.(Comp.), Ph.D.',
                'pengampu_2' => 'Dr. Aris Puji Widodo, S.Si., M.T.',
                'pengampu_3' => 'Yunila Dwi Putri Ariyanti, S.Kom., M.Kom.'
            ],
            [
                    'ruang'=> 'A102',
                'matakuliah'=> 'Proyek Perangkat Lunak',
                'waktu'=>  '13.00 - 15.30',
                'kelas'=>  'C',
                'semester_aktif' => '5',
                'jurusan' =>'informatika',
                'pengampu_1' => 'Dinar Mutiara Kusumo Nugraheni, S.T., M.InfoTech.(Comp.), Ph.D.',
                'pengampu_2' => 'Dr. Aris Puji Widodo, S.Si., M.T.',
                'pengampu_3' => 'Yunila Dwi Putri Ariyanti, S.Kom., M.Kom.'
            ],
            [
                    'ruang'=> 'A102',
                'matakuliah'=> 'Proyek Perangkat Lunak',
                'waktu'=>  '15.40 - 18.10',
                'kelas'=>  'D',
                'semester_aktif' => '5',
                'jurusan' =>'informatika',
                'pengampu_1' => 'Dinar Mutiara Kusumo Nugraheni, S.T., M.InfoTech.(Comp.), Ph.D.',
                'pengampu_2' => 'Dr. Aris Puji Widodo, S.Si., M.T.',
                'pengampu_3' => 'Yunila Dwi Putri Ariyanti, S.Kom., M.Kom.'
            ],
        ];
        foreach($jadwal as $key => $val){
            jadwal::create($val);
        }
    }
}