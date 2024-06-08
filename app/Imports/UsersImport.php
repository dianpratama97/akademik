<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new User([
            'name'  => $row['name'],
            'email'  => $row['email'],
            'username'  => $row['username'],
            'role'  => $row['role'],
            'status_biodata'  => $row['status_biodata'],
            'password' => Hash::make($row['password']),
        ]);
    }
}
