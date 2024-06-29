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

    'accepted'        => 'Form :attribute harus diterima.',
    'active_url'      => 'Form :attribute bukan URL yang valid.',
    'after'           => 'Form :attribute harus berisi tanggal setelah :date.',
    'after_or_equal'  => 'Form :attribute harus berisi tanggal setelah atau sama dengan :date.',
    'alpha'           => 'Form :attribute hanya boleh berisi huruf.',
    'alpha_dash'      => 'Form :attribute hanya boleh berisi huruf, angka, strip, dan garis bawah.',
    'alpha_num'       => 'Form :attribute hanya boleh berisi huruf dan angka.',
    'array'           => 'Form :attribute harus berisi sebuah array.',
    'before'          => 'Form :attribute harus berisi tanggal sebelum :date.',
    'before_or_equal' => 'Form :attribute harus berisi tanggal sebelum atau sama dengan :date.',
    'between'         => [
        'numeric' => 'Form :attribute harus bernilai antara :min sampai :max.',
        'file'    => 'Form :attribute harus berukuran antara :min sampai :max kilobita.',
        'string'  => 'Form :attribute harus berisi antara :min sampai :max karakter.',
        'array'   => 'Form :attribute harus memiliki :min sampai :max anggota.',
    ],
    'boolean'        => 'Form :attribute harus bernilai true atau false',
    'confirmed'      => 'Konfirmasi Form tidak cocok.',
    'date'           => 'Form :attribute bukan tanggal yang valid.',
    'date_equals'    => 'Form :attribute harus berisi tanggal yang sama dengan :date.',
    'date_format'    => 'Form :attribute tidak cocok dengan format :format.',
    'different'      => 'Form :attribute dan :other harus berbeda.',
    'digits'         => 'Form :attribute harus terdiri dari :digits angka.',
    'digits_between' => 'Form :attribute harus terdiri dari :min sampai :max angka.',
    'dimensions'     => 'Form :attribute tidak memiliki dimensi gambar yang valid.',
    'distinct'       => 'Form :attribute memiliki nilai yang duplikat.',
    'email'          => 'Form :attribute harus berupa alamat Email yang valid.',
    'ends_with'      => 'Form :attribute harus diakhiri salah satu dari berikut: :values',
    'exists'         => 'Form :attribute yang dipilih tidak valid.',
    'file'           => 'Form :attribute harus berupa sebuah berkas.',
    'filled'         => 'Form :attribute harus memiliki nilai.',
    'gt'             => [
        'numeric' => 'Form :attribute harus bernilai lebih besar dari :value.',
        'file'    => 'Form :attribute harus berukuran lebih besar dari :value kilobita.',
        'string'  => 'Form :attribute harus berisi lebih besar dari :value karakter.',
        'array'   => 'Form :attribute harus memiliki lebih dari :value anggota.',
    ],
    'gte' => [
        'numeric' => 'Form :attribute harus bernilai lebih besar dari atau sama dengan :value.',
        'file'    => 'Form :attribute harus berukuran lebih besar dari atau sama dengan :value kilobita.',
        'string'  => 'Form :attribute harus berisi lebih besar dari atau sama dengan :value karakter.',
        'array'   => 'Form :attribute harus terdiri dari :value anggota atau lebih.',
    ],
    'image'    => 'Form :attribute harus berupa gambar.',
    'in'       => 'Form :attribute yang dipilih tidak valid.',
    'in_array' => 'Form :attribute tidak ada di dalam :other.',
    'integer'  => 'Form :attribute harus berupa bilangan bulat.',
    'ip'       => 'Form :attribute harus berupa alamat IP yang valid.',
    'ipv4'     => 'Form :attribute harus berupa alamat IPv4 yang valid.',
    'ipv6'     => 'Form :attribute harus berupa alamat IPv6 yang valid.',
    'json'     => 'Form :attribute harus berupa JSON string yang valid.',
    'lt'       => [
        'numeric' => 'Form :attribute harus bernilai kurang dari :value.',
        'file'    => 'Form :attribute harus berukuran kurang dari :value kilobita.',
        'string'  => 'Form :attribute harus berisi kurang dari :value karakter.',
        'array'   => 'Form :attribute harus memiliki kurang dari :value anggota.',
    ],
    'lte' => [
        'numeric' => 'Form :attribute harus bernilai kurang dari atau sama dengan :value.',
        'file'    => 'Form :attribute harus berukuran kurang dari atau sama dengan :value kilobita.',
        'string'  => 'Form :attribute harus berisi kurang dari atau sama dengan :value karakter.',
        'array'   => 'Form :attribute harus tidak lebih dari :value anggota.',
    ],
    'max' => [
        'numeric' => 'Form :attribute maskimal bernilai :max.',
        'file'    => 'Form :attribute maksimal berukuran :max kilobita.',
        'string'  => 'Form :attribute maskimal berisi :max karakter.',
        'array'   => 'Form :attribute maksimal terdiri dari :max anggota.',
    ],
    'mimes'     => 'Form :attribute harus berupa berkas berjenis: :values.',
    'mimetypes' => 'Form :attribute harus berupa berkas berjenis: :values.',
    'min'       => [
        'numeric' => 'Form :attribute minimal bernilai :min.',
        'file'    => 'Form :attribute minimal berukuran :min kilobita.',
        'string'  => 'Form :attribute minimal berisi :min karakter.',
        'array'   => 'Form :attribute minimal terdiri dari :min anggota.',
    ],
    'not_in'               => 'Form :attribute yang dipilih tidak valid.',
    'not_regex'            => 'Form :attributeat Form tidak valid.',
    'numeric'              => 'Form :attribute harus berupa angka.',
    'password'             => 'Kata sandi salah.',
    'present'              => 'Form :attribute wajib ada.',
    'regex'                => 'Form :attributeat Form tidak valid.',
    'required'             => 'Form :attribute wajib diisi.',
    'required_if'          => 'Form :attribute wajib diisi bila :other adalah :value.',
    'required_unless'      => 'Form :attribute wajib diisi kecuali :other memiliki nilai :values.',
    'required_with'        => 'Form :attribute wajib diisi bila terdapat :values.',
    'required_with_all'    => 'Form :attribute wajib diisi bila terdapat :values.',
    'required_without'     => 'Form :attribute wajib diisi bila tidak terdapat :values.',
    'required_without_all' => 'Form :attribute wajib diisi bila sama sekali tidak terdapat :values.',
    'same'                 => 'Form :attribute dan :other harus sama.',
    'size'                 => [
        'numeric' => 'Form :attribute harus berukuran :size.',
        'file'    => 'Form :attribute harus berukuran :size kilobyte.',
        'string'  => 'Form :attribute harus berukuran :size karakter.',
        'array'   => 'Form :attribute harus mengandung :size anggota.',
    ],
    'starts_with' => 'Form :attribute harus diawali salah satu dari berikut: :values',
    'string'      => 'Form :attribute harus berupa string.',
    'timezone'    => 'Form :attribute harus berisi zona waktu yang valid.',
    'unique'      => 'Email ini sudah ada.',
    'uploaded'    => 'Form :attribute gagal diunggah.',
    'url'         => 'Form :attributeat Form tidak valid.',
    'uuid'        => 'Form :attribute harus merupakan UUID yang valid.',

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