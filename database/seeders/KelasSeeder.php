<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kelas::create(array_merge([
            'name' => 'Kelas 10',
            'kode_kelas' => '10',
        ]));
        Kelas::create(array_merge([
            'name' => 'Kelas 11',
            'kode_kelas' => '11',
        ]));
        Kelas::create(array_merge([
            'name' => 'Kelas 12',
            'kode_kelas' => '12',
        ]));
    }
}
