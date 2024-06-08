<?php

namespace App\Imports;

use App\Models\Kelulusan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KelulusanImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Kelulusan([
            'name'  => $row['name'],
            'nisn'  => $row['nisn'],
            'kelas'  => $row['kelas'],
            'jurusan'  => $row['jurusan'],
            'status_lulus'  => $row['status_lulus'],
        ]);
    }
}
