<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\dosen;

class DummyDosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dosen = [
            [
                'nama' => 'Dr.Eng. Adi Wibowo, S.Si., M.Kom.',
                'nip' => '198203092006041002',
                'email' => 'adiwibowo@lecturer.dipoace.ac.id',
                'jurusan' => 'Informatika',
                'tempat_lahir' => 'Semarang',
                'tanggal_lahir' => '10-12-1980',
                'jenis_kelamin' => 'L',
                'alamat' => 'Wonodri, Semarang Selatan, Kota Semarang, Jawa Tengah 50242',
                'no_handphone' => '081267491202'
            ],
            [
                'nama' => 'Dr. Aris Puji Widodo, S.Si., M.T.',
                'nip' => '197404011999031002',
                'email' => 'arispujiwidodo@lecturer.dipoace.ac.id',
                'jurusan' => 'Informatika',
                'tempat_lahir' => 'Semarang',
                'tanggal_lahir' => '9-3-1979',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jl. Kh Ahmad Dahlan, Pekunden, Kec. Semarang Tengah, Kota Semarang, Jawa Tengah 50134',
                'no_handphone' => '081271920472'
            ],
            [
                'nama' => 'Dr. Aris Sugiharto, S.Si., M.Kom.',
                'nip' => '197108111997021004',
                'email' => 'arissugiharto@lecturer.dipoace.ac.id',
                'jurusan' => 'Informatika',
                'tempat_lahir' => 'Semarang',
                'tanggal_lahir' => '21-10-1984',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jl. Atmodirono Raya No.5, Wonodri, Kec. Semarang Sel., Kota Semarang, Jawa Tengah 50242',
                'no_handphone' => '081263956302'
            ],
            [
                'nama' => 'Sandy Kurniawan, S.Kom., M.Kom.',
                'nip' => '199603032024061003',
                'email' => 'sandykurniawan@lecturer.dipoace.ac.id',
                'jurusan' => 'Informatika',
                'tempat_lahir' => 'Semarang',
                'tanggal_lahir' => '7-5-1988',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jl. Telaga Bodas Raya No.6A, Karangrejo, Kec. Gajahmungkur, Kota Semarang, Jawa Tengah 50231',
                'no_handphone' => '081255892537'
            ],
            [
                'nama' => 'Beta Noranita, S.Si., M.Kom.',
                'nip' => '197308291998022001',
                'email' => 'betanoranita@lecturer.dipoace.ac.id',
                'jurusan' => 'Informatika',
                'tempat_lahir' => 'Semarang',
                'tanggal_lahir' => '17-8-1983',
                'jenis_kelamin' => 'P',
                'alamat' => 'Diamond Hill RD Jalan Bukit Sari Raya, Gombel, Ngesrep, Kec. Banyumanik, Kota Semarang, Jawa Tengah 50269',
                'no_handphone' => '081265489329'
            ],
            [
                'nama' => 'Dr.rer.nat. Anto Budiharjo, S.Si., M.Biotech.',
                'nip' => '197309161997021001',
                'email' => 'antobudiharjo@lecturer.dipoace.ac.id',
                'jurusan' => 'Bioteknologi',
                'tempat_lahir' => 'Demak',
                'tanggal_lahir' => '19-2-1977',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jl. Setia Budi No.36C, Tinjomoyo, Kec. Banyumanik, Kota Semarang, Jawa Tengah 50263',
                'no_handphone' => '081285308582'
            ],
            [
                'nama' => 'Dr. Lilih Khotimperwati, S.Si., M.Si.',
                'nip' => '196903301994032001',
                'email' => 'lilihkhotimperwati@lecturer.dipoace.ac.id',
                'jurusan' => 'Biologi',
                'tempat_lahir' => 'Kudus',
                'tanggal_lahir' => '14-6-1988',
                'jenis_kelamin' => 'P',
                'alamat' => 'Jl. Rajabasa No.C1, Karangrejo, Kec. Gajahmungkur, Kota Semarang, Jawa Tengah 50234',
                'no_handphone' => '081285308582'
            ],
            [
                'nama' => 'Dr. Tatik Widiharih, M.Si',
                'nip' => '196109281986032002',
                'email' => 'tatikwidiharih@lecturer.dipoace.ac.id',
                'jurusan' => 'Matematika',
                'tempat_lahir' => 'Demak',
                'tanggal_lahir' => '26-11-1974',
                'jenis_kelamin' => 'P',
                'alamat' => 'Jl. Menoreh Timur IV No.9, Sampangan, Kec. Gajahmungkur, Kota Semarang, Jawa Tengah 50232',
                'no_handphone' => '081272007329'
            ],
            [
                'nama' => 'Drs. Isnain Gunadi, M.Si.',
                'nip' => '196408291991021001',
                'email' => 'isnaingunadi@lecturer.dipoace.ac.id',
                'jurusan' => 'Fisika',
                'tempat_lahir' => 'Probolinggo',
                'tanggal_lahir' => '11-4-1974',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jl. Puspanjolo Selatan 4 No.8, Bojongsalaman, Kec. Semarang Barat, Kota Semarang, Jawa Tengah 50141',
                'no_handphone' => '081263074922'
            ],
            [
                'nama' => 'Prof. Dr. Parsaoraan Siahaan, MS',
                'nip' => '196204251761021005',
                'email' => 'isnaingunadi@lecturer.dipoace.ac.id',
                'jurusan' => 'Fisika',
                'tempat_lahir' => 'Batang',
                'tanggal_lahir' => '13-7-1976',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jl. Pandanaran No.57, Randusari, Kec. Semarang Sel., Kota Semarang, Jawa Tengah 50244',
                'no_handphone' => '081233710462'
            ],
            
        ];

        foreach($dosen as $key => $val){
            dosen::create($val);
        }
    }
}
