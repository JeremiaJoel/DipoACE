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
            // [
            //     'nim' => '24060121130076',
            //     'nama' => 'Ahmad Maulana',
            //     'jurusan' => 'Informatika',
            //     'email' => 'ahmad.maulana@students.dipoace.ac.id',
            //     'tanggal_lahir' => '2004-03-15',
            //     'no_hp' => '081234567890',
            //     'status' => '',
            //     'pembimbing_akademik' => dosen::where('nip', '198203092006041002')->first()->nama
            // ],
            [   
                'nim' => '24040122140160',
                'nama' => 'Ateng Baplang',
                'jurusan' => 'Informatika',
                'email' => 'atengbaplang@students.dipoace.ac.id',
                'tanggal_lahir' => '2003-11-05',
                'no_hp' => '081356789012',
                'status' => '',
                'pembimbing_akademik' => dosen::where('nip', '198203092006041002')->first()->nama
            ],
        ];

        foreach($mahasiswa as $key => $val){
            mahasiswa::create($val);
        }
    }
}
