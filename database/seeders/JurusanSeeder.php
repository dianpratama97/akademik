<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jurusan::create(array_merge([
            'name' => 'Desain Komunikasi Visual',
            'kode_jurusan' => 'DKV',
        ]));
        Jurusan::create(array_merge([
            'name' => 'Teknik Komputer dan Jaringan',
            'kode_jurusan' => 'TKJ',
        ]));
        Jurusan::create(array_merge([
            'name' => 'Layanan Perbankan',
            'kode_jurusan' => 'LP',
        ]));
        Jurusan::create(array_merge([
            'name' => 'Teknik Sepeda Motor',
            'kode_jurusan' => 'TSM',
        ]));
    }
}
