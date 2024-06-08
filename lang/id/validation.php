<?php

return [
    /*
    |---------------------------------------------------------------------------------------
    | Baris Bahasa untuk Validasi
    |---------------------------------------------------------------------------------------
    |
    | Baris bahasa berikut ini berisi standar pesan kesalahan yang digunakan oleh
    | kelas validasi. Beberapa aturan mempunyai banyak versi seperti aturan 'size'.
    | Jangan ragu untuk mengoptimalkan setiap pesan yang ada di sini.
    |
    */

    'accepted'        => 'Form harus diterima.',
    'active_url'      => 'Form bukan URL yang valid.',
    'after'           => 'Form harus berisi tanggal setelah :date.',
    'after_or_equal'  => 'Form harus berisi tanggal setelah atau sama dengan :date.',
    'alpha'           => 'Form hanya boleh berisi huruf.',
    'alpha_dash'      => 'Form hanya boleh berisi huruf, angka, strip, dan garis bawah.',
    'alpha_num'       => 'Form hanya boleh berisi huruf dan angka.',
    'array'           => 'Form harus berisi sebuah array.',
    'before'          => 'Form harus berisi tanggal sebelum :date.',
    'before_or_equal' => 'Form harus berisi tanggal sebelum atau sama dengan :date.',
    'between'         => [
        'numeric' => 'Form harus bernilai antara :min sampai :max.',
        'file'    => 'Form harus berukuran antara :min sampai :max kilobita.',
        'string'  => 'Form harus berisi antara :min sampai :max karakter.',
        'array'   => 'Form harus memiliki :min sampai :max anggota.',
    ],
    'boolean'        => 'Form harus bernilai true atau false',
    'confirmed'      => 'Konfirmasi Form tidak cocok.',
    'date'           => 'Form bukan tanggal yang valid.',
    'date_equals'    => 'Form harus berisi tanggal yang sama dengan :date.',
    'date_format'    => 'Form tidak cocok dengan format :format.',
    'different'      => 'Form dan :other harus berbeda.',
    'digits'         => 'Form harus terdiri dari :digits angka.',
    'digits_between' => 'Form harus terdiri dari :min sampai :max angka.',
    'dimensions'     => 'Form tidak memiliki dimensi gambar yang valid.',
    'distinct'       => 'Form memiliki nilai yang duplikat.',
    'email'          => 'Form harus berupa alamat Email yang valid.',
    'ends_with'      => 'Form harus diakhiri salah satu dari berikut: :values',
    'exists'         => 'Form yang dipilih tidak valid.',
    'file'           => 'Form harus berupa sebuah berkas.',
    'filled'         => 'Form harus memiliki nilai.',
    'gt'             => [
        'numeric' => 'Form harus bernilai lebih besar dari :value.',
        'file'    => 'Form harus berukuran lebih besar dari :value kilobita.',
        'string'  => 'Form harus berisi lebih besar dari :value karakter.',
        'array'   => 'Form harus memiliki lebih dari :value anggota.',
    ],
    'gte' => [
        'numeric' => 'Form harus bernilai lebih besar dari atau sama dengan :value.',
        'file'    => 'Form harus berukuran lebih besar dari atau sama dengan :value kilobita.',
        'string'  => 'Form harus berisi lebih besar dari atau sama dengan :value karakter.',
        'array'   => 'Form harus terdiri dari :value anggota atau lebih.',
    ],
    'image'    => 'Form harus berupa gambar.',
    'in'       => 'Form yang dipilih tidak valid.',
    'in_array' => 'Form tidak ada di dalam :other.',
    'integer'  => 'Form harus berupa bilangan bulat.',
    'ip'       => 'Form harus berupa alamat IP yang valid.',
    'ipv4'     => 'Form harus berupa alamat IPv4 yang valid.',
    'ipv6'     => 'Form harus berupa alamat IPv6 yang valid.',
    'json'     => 'Form harus berupa JSON string yang valid.',
    'lt'       => [
        'numeric' => 'Form harus bernilai kurang dari :value.',
        'file'    => 'Form harus berukuran kurang dari :value kilobita.',
        'string'  => 'Form harus berisi kurang dari :value karakter.',
        'array'   => 'Form harus memiliki kurang dari :value anggota.',
    ],
    'lte' => [
        'numeric' => 'Form harus bernilai kurang dari atau sama dengan :value.',
        'file'    => 'Form harus berukuran kurang dari atau sama dengan :value kilobita.',
        'string'  => 'Form harus berisi kurang dari atau sama dengan :value karakter.',
        'array'   => 'Form harus tidak lebih dari :value anggota.',
    ],
    'max' => [
        'numeric' => 'Form maskimal bernilai :max.',
        'file'    => 'Form maksimal berukuran :max kilobita.',
        'string'  => 'Form maskimal berisi :max karakter.',
        'array'   => 'Form maksimal terdiri dari :max anggota.',
    ],
    'mimes'     => 'Form harus berupa berkas berjenis: :values.',
    'mimetypes' => 'Form harus berupa berkas berjenis: :values.',
    'min'       => [
        'numeric' => 'Form minimal bernilai :min.',
        'file'    => 'Form minimal berukuran :min kilobita.',
        'string'  => 'Form minimal berisi :min karakter.',
        'array'   => 'Form minimal terdiri dari :min anggota.',
    ],
    'not_in'               => 'Form yang dipilih tidak valid.',
    'not_regex'            => 'Format Form tidak valid.',
    'numeric'              => 'Form harus berupa angka.',
    'password'             => 'Kata sandi salah.',
    'present'              => 'Form wajib ada.',
    'regex'                => 'Format Form tidak valid.',
    'required'             => 'Form wajib diisi.',
    'required_if'          => 'Form wajib diisi bila :other adalah :value.',
    'required_unless'      => 'Form wajib diisi kecuali :other memiliki nilai :values.',
    'required_with'        => 'Form wajib diisi bila terdapat :values.',
    'required_with_all'    => 'Form wajib diisi bila terdapat :values.',
    'required_without'     => 'Form wajib diisi bila tidak terdapat :values.',
    'required_without_all' => 'Form wajib diisi bila sama sekali tidak terdapat :values.',
    'same'                 => 'Form dan :other harus sama.',
    'size'                 => [
        'numeric' => 'Form harus berukuran :size.',
        'file'    => 'Form harus berukuran :size kilobyte.',
        'string'  => 'Form harus berukuran :size karakter.',
        'array'   => 'Form harus mengandung :size anggota.',
    ],
    'starts_with' => 'Form harus diawali salah satu dari berikut: :values',
    'string'      => 'Form harus berupa string.',
    'timezone'    => 'Form harus berisi zona waktu yang valid.',
    'unique'      => 'Email ini sudah ada.',
    'uploaded'    => 'Form gagal diunggah.',
    'url'         => 'Format Form tidak valid.',
    'uuid'        => 'Form harus merupakan UUID yang valid.',

    /*
    |---------------------------------------------------------------------------------------
    | Baris Bahasa untuk Validasi Kustom
    |---------------------------------------------------------------------------------------
    |
    | Di sini Anda dapat menentukan pesan validasi untuk atribut sesuai keinginan dengan menggunakan 
    | konvensi "attribute.rule" dalam penamaan barisnya. Hal ini mempercepat dalam menentukan
    | baris bahasa kustom yang spesifik untuk aturan atribut yang diberikan.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |---------------------------------------------------------------------------------------
    | Kustom Validasi Atribut
    |---------------------------------------------------------------------------------------
    |
    | Baris bahasa berikut digunakan untuk menukar 'placeholder' atribut dengan sesuatu yang
    | lebih mudah dimengerti oleh pembaca seperti "Alamat Surel" daripada "surel" saja.
    | Hal ini membantu kita dalam membuat pesan menjadi lebih ekspresif.
    |
    */

    'attributes' => [
    ],
];