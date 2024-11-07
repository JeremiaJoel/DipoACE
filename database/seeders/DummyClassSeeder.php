<?php

namespace Database\Seeders;
use App\Models\classroom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classroom = [
            [
                'nama'=> 'Struktur Diskrit', 
                'ruang'=> 'E104',
                'hari'=>  'Senin',
                'jam_mulai' => '11:00:00',
                'jam_selesai' => '13:00:00',
                'semester'=>'1',
                'jurusan'=>'Informatika'
            ],

            [
                'nama'=> 'Dasar Sistem', 
                'ruang'=> 'E102',
                'hari'=>  'Senin',
                'jam_mulai' => '11:00:00',
                'jam_selesai' => '13:00:00',
                'semester'=>'1',
                'jurusan'=>'Informatika'
            ],
            [
                'nama'=> 'Statistika', 
                'ruang'=> 'B101',
                'hari'=>  'Senin',
                'jam_mulai' => '11:00:00',
                'jam_selesai' => '13:00:00',
                'semester'=>'3',
                'jurusan'=>'Statistika'
            ],
            [
                'nama'=> 'Otonomi Tubuh', 
                'ruang'=> 'K101',
                'hari'=>  'Senin',
                'jam_mulai' => '11:00:00',
                'jam_selesai' => '13:00:00',
                'semester'=>'2',
                'jurusan'=>'Biologi'
            ],
            [
                'nama'=> 'Elektron', 
                'ruang'=> 'C101',
                'hari'=>  'Senin',
                'jam_mulai' => '11:00:00',
                'jam_selesai' => '13:00:00',
                'semester'=>'3',
                'jurusan'=>'Kimia'
            ],
            [
                'nama'=> 'Kalkulus 3', 
                'ruang'=> 'B101',
                'hari'=>  'Senin',
                'jam_mulai' => '11:00:00',
                'jam_selesai' => '13:00:00',
                'semester'=>'5',
                'jurusan'=>'Matematika'
            ],
           
        ];

        foreach($classroom as $key => $val){
            classroom::create($val);
        }
    }
}
