<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    protected static ?string $password;
    public function run(): void
    {
        $default_user = [
            'password' => static::$password ??= Hash::make('Smkn1singkep'),
        ];
        $admin = User::create(array_merge([
            'name' => 'Admin',
            'email' => '',
            'username' => '11002814',
            'status_biodata' => 0,
            'role' => 'admin',
        ], $default_user));

        // $staff = User::create(array_merge([
        //     'name' => 'Staff',
        //     'email' => 'staff@gmail.com',
        //     'username' => '123',
        //     'status_biodata' => 0,
        //     'role' => 'staff',
        // ], $default_user));

        // $siswa = User::create(array_merge([
        //     'name' => 'Siswa',
        //     'email' => 'siswa@gmail.com',
        //     'username' => '1234',
        //     'status_biodata' => 0,
        //     'role' => 'siswa',
        // ], $default_user));
    }
}
