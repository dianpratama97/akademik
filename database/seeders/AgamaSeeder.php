<?php

namespace Database\Seeders;

use App\Models\Agama;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Agama::create(array_merge([
            'name' => 'Islam',
        ]));
        Agama::create(array_merge([
            'name' => 'Kristen',
        ]));
        Agama::create(array_merge([
            'name' => 'Katolik',
        ]));
        Agama::create(array_merge([
            'name' => 'Hindu',
        ]));
        Agama::create(array_merge([
            'name' => 'Buddha',
        ]));
    }
}
