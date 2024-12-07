<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'email' => 'arispujiwidodp@lecturer.dipoace.ac.id',
            'password' => Hash::make('123456'), // Ganti dengan password yang aman
            'dekan' => '0',
            'mahasiswa' => '0', // Menandakan user adalah mahasiswa
            'pembimbing_akademik' => '1',
            'kaprodi' => '0',
            'bagian_akademik' => '0',
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
