<?php

namespace Database\Seeders;

use App\Models\Jasa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JasaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jasa::insert(
            [
                [
                    'nama_jasa' => 'Studi Kelayakan (Feasibility Study)',
                ],
                [
                    'nama_jasa' => 'Standar Satuan Harga',
                ],
                [
                    'nama_jasa' => 'Perencanaan Proyek',
                ],

            ]
        );
    }
}