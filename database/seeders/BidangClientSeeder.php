<?php

namespace Database\Seeders;

use App\Models\BidangClient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BidangClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BidangClient::insert(
            [
                [
                    'nama_bidang' => 'Bidang Analisis Mengenai Dampak Lingkungan Hidup (AMDAL)',
                ],
                [
                    'nama_bidang' => 'Bidang Kelayakan Fungsi Bangunan dan Gedung'
                ],
                [
                    'nama_bidang' => 'Bidang Feasibiity Study (Studi Kelayakan)'
                ],


            ]
        );
    }
}
