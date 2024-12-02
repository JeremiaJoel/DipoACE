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
                'nim' => '24060121130076',
                'tahun_ajaran' => '2023/2024 Genap',
                'semester' => '4',
                'kodemk' => 'PAIK6401',
            ],
            [
                'nim' => '24060121130076',
                'tahun_ajaran' => '2023/2024 Genap',
                'semester' => '4',
                'kodemk' => 'PAIK6402',
            ],
            [
                'nim' => '24060121130076',
                'tahun_ajaran' => '2023/2024 Genap',
                'semester' => '4',
                'kodemk' => 'PAIK6403',
            ],
            [
                'nim' => '24060121130076',
                'tahun_ajaran' => '2023/2024 Genap',
                'semester' => '4',
                'kodemk' => 'PAIK6404',
            ],
            [
                'nim' => '24060121130076',
                'tahun_ajaran' => '2023/2024 Genap',
                'semester' => '4',
                'kodemk' => 'PAIK6405',
            ],
            [
                'nim' => '24060121130076',
                'tahun_ajaran' => '2023/2024 Genap',
                'semester' => '4',
                'kodemk' => 'PAIK6406',
            ],

        ];
        foreach($irs as $key => $val){
            irs::create($val);
        }
    }
}