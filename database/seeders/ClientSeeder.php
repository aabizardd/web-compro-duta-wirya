<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Client::insert(
            [
                [
                    'pemberi_tugas' => 'PT SRITEX',
                    'id_bidang_client' => 1
                ],
                [
                    'pemberi_tugas' => 'HOTEL GRAND QUALITY YOGYAKARTA',
                    'id_bidang_client' => 2
                ],
                [
                    'pemberi_tugas' => 'PEMERINTAH DAERAH KAB BOYOLALI',
                    'id_bidang_client' => 3
                ],


            ]
        );
    }
}
