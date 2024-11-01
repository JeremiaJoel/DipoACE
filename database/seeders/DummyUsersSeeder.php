<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'email' => 'cokisitohang@akademik.dipoace.ac.id',
                'password' => bcrypt('123456'),
                'dekan' => '0',
                'mahasiswa' => '0',
                'pembimbing_akademik' => '0',
                'kaprodi' => '0',
                'bagian_akademik' => '1'
            ],
            [
                'email' => 'pinsensitompul@mahasiswa.dipoace.ac.id',
                'password' => bcrypt('123456'),
                'dekan' => '0',
                'mahasiswa' => '1',
                'pembimbing_akademik' => '0',
                'kaprodi' => '0',
                'bagian_akademik' => '0'
            ],
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
