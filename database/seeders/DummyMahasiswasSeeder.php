<?php

namespace Database\Seeders;

use App\Models\dosen;
use App\Models\mahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyMahasiswasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mahasiswa =[
            [
                'nama' => 'Ahmad Maulana',
                'nim' => '24060121130076',
                'jurusan' => 'Informatika',
                'email' => 'ahmad.maulana@students.dipoace.ac.id',
                'tanggal_lahir' => '2004-03-15',
                'no_hp' => '081234567890',
                'status' => '',
                'pembimbing_akademik' => dosen::where('nip', '198203092006041002')->first()->nama
            ],
            // [
            //     'nama' => 'Putri Sari',
            //     'nim' => '24050122130056',
            //     'jurusan' => 'Statistika',
            //     'email' => 'putri.sari@students.dipoace.ac.id',
            //     'tanggal_lahir' => '2004-07-22',
            //     'no_hp' => '081298765432',
            //     'pembimbing_akademik' => 'Dr. Siti Aminah'
            // ],
            // [
            //     'nama' => 'Rizki Pratama',
            //     'nim' => '24040122140156',
            //     'jurusan' => 'Biologi',
            //     'email' => 'rizki.pratama@students.dipoace.ac.id',
            //     'tanggal_lahir' => '2003-11-05',
            //     'no_hp' => '081356789012',
            //     'pembimbing_akademik' => 'Prof. Agus Setiawan'
            // ],
        ];

        foreach($mahasiswa as $key => $val){
            mahasiswa::create($val);
        }
    }
}
