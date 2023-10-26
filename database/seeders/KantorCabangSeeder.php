<?php

namespace Database\Seeders;

use App\Models\KantorCabang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KantorCabangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KantorCabang::insert(
            [
                [
                    'nama_kantor' => 'Kantor Pusat',
                    'pemimpin_cabang' => 'Sih Wiryadi, SE, MSi, MEc. Dev, MAPPI (Cert)',
                    'alamat_cabang' => 'Wisma Penilai Lantai 1 -- 5, Jl. Ki Mangun Sarkoro No. 55. Surakarta 57135',

                ],
                [
                    'nama_kantor' => 'Kantor Cabang Jakarta Selatan',
                    'pemimpin_cabang' => 'Fourier, ST, MAPPI (Cert)',
                    'alamat_cabang' => 'Jl. Rawajati Timur Raya Blok AM No. 08, Jakarta Selatan 12750',

                ],
            ]
        );
    }
}