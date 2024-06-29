<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Absen;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AbsenController extends Controller
{
    public function index() //get data status absen/absen tampilan
    {
        $hari_ini = date("Y-m-d");

        $jumlah_kelas12 = [];
        $jumlah_keterangan = DB::table('absen')
            ->selectRaw('SUM(IF(status="i",1,0)) as jumlah_izin,SUM(IF(status="s",1,0)) as jumlah_sakit,SUM(IF(status="s",1,0)) as jumlah_hadir')->where('tanggal', $hari_ini)->first();

        return view('master_absensi.absen.index', compact('jumlah_kelas12', 'jumlah_keterangan'));
    }

    public function absen_siswa() //menampilkan halaman absen siswa sesuai kelas
    {
        $semester = TahunAjaran::where([
            "semester" => "ganjil",
            "status" => "1"

        ])->first();
        if ($semester == null) {
            return view('master_absensi.absen_siswa.siswa_sekolah');
        }

        if (Auth::user()->kelas == 12 && $semester->semester == 'ganjil') {
            return view('master_absensi.absen_siswa.siswa_pkl');
        } else {
            return view('master_absensi.absen_siswa.siswa_sekolah');
        }
    }

    public function store(Request $request) //simpan data absen siswa
    {

        if (Auth::user()->kelas == 12) {
            $lokasi = $request->lokasi;
            $foto_absen = $request->image;
            $user = User::findOrFail(Auth::user()->id);
            $jam_masuk = date("H:i");
            $tanggal = date("Y-m-d");

            if ($request->image == null) {
                if ($request->status == 'izin') {
                    $status_absen = 'i';
                }
                $data = [
                    "user_id" => $user->id,
                    "jam_masuk" => null,
                    "lokasi" => null,
                    "foto_absen" => null,
                    "tanggal" => $tanggal,
                    "status" => $status_absen,
                    "keterangan" => $request->keterangan,
                ];
                $simpan = DB::table('absen')->insert($data);

                Alert::success('Berhasil.', 'Absen Berhasil.');
                return redirect()->route('dashboard');
            }

            if (!$request->image == null) {
                if ($request->status == 'sakit') {
                    $status_absen = 's';
                    $jam_masuk = null;
                    $lokasi = null;
                } else {
                    $status_absen = 'h';
                    $lokasi = $request->lokasi;
                }

                $folderPath = "public/gambar/foto-absen/";
                $formatName = $user->username;
                $image_parts = explode(";base64", $foto_absen);
                $image_base64 = base64_decode($image_parts[1]);
                $fileName = $formatName . date('-d-m-y') . ".png";
                $file = $folderPath . $fileName;

                $data = [
                    "user_id" => $user->id,
                    "jam_masuk" => $jam_masuk,
                    "lokasi" => $lokasi,
                    "foto_absen" => $fileName,
                    "tanggal" => $tanggal,
                    "status" => $status_absen,
                    "keterangan" => $request->keterangan,
                ];
                $simpan = DB::table('absen')->insert($data);

                if ($simpan) {
                    echo 1;
                    Storage::put($file, $image_base64);
                } else {
                    echo 0;
                }
            }
        }
    }

    public function store_absen(Request $request)
    {

        $lokasi = $request->lokasi;
        $foto_absen = $request->image;
        $user = User::findOrFail(Auth::user()->id);
        $jam_masuk = date("H:i");
        $tanggal = date("Y-m-d");

        if ($request->status == 'hadir') {
            $data = [
                "user_id" => $user->id,
                "jam_masuk" => $jam_masuk,
                "lokasi" => $lokasi,
                "foto_absen" => null,
                "tanggal" => $tanggal,
                "status" => 'h',
                "keterangan" => null,
            ];

            $simpan = DB::table('absen')->insert($data);
            Alert::success('Berhasil.', 'Absen Berhasil.');
            return redirect()->route('dashboard');
        }

        if ($request->image == null) {
            if ($request->status == 'izin') {
                $status_absen = 'i';
            }
            $data = [
                "user_id" => $user->id,
                "jam_masuk" => null,
                "lokasi" => null,
                "foto_absen" => null,
                "tanggal" => $tanggal,
                "status" => $status_absen,
                "keterangan" => $request->keterangan,
            ];
            $simpan = DB::table('absen')->insert($data);

            Alert::success('Berhasil.', 'Absen Berhasil.');
            return redirect()->route('dashboard');
        }

        if (!$request->image == null) {
            if ($request->status == 'sakit') {
                $status_absen = 's';
            }

            $folderPath = "public/gambar/foto-absen/";
            $formatName = $user->username;
            $image_parts = explode(";base64", $foto_absen);
            $image_base64 = base64_decode($image_parts[1]);
            $fileName = $formatName . date('-d-m-y') . ".png";
            $file = $folderPath . $fileName;

            $data = [
                "user_id" => $user->id,
                "jam_masuk" => null,
                "lokasi" => null,
                "foto_absen" => $fileName,
                "tanggal" => $tanggal,
                "status" => $status_absen,
                "keterangan" => $request->keterangan,
            ];
            $simpan = DB::table('absen')->insert($data);

            if ($simpan) {
                echo 1;
                Storage::put($file, $image_base64);
            } else {
                echo 0;
            }
        }



        // $folderPath = "public/gambar/foto-absen/";
        // $formatName = $user->username;
        // $image_parts = explode(";base64", $foto_absen);
        // $image_base64 = base64_decode($image_parts[1]);
        // $fileName = $formatName . date('-d-m-y') . ".png";
        // $file = $folderPath . $fileName;

        // if ($request->status == 'sakit') {
        //     $status_absen = 's';
        //     $keterangan = $request->keterangan;
        // } else {
        //     $status_absen = 'h';
        //     $keterangan = null;
        // }

        // $data = [
        //     "user_id" => $user->id,
        //     "jam_masuk" => $jam_masuk,
        //     "lokasi" => $lokasi,
        //     "foto_absen" => $fileName,
        //     "tanggal" => $tanggal,
        //     "status" => $status_absen,
        //     "keterangan" => $keterangan,
        // ];

        // $simpan = DB::table('absen')->insert($data);
        // if ($simpan) {
        //     echo 1;
        //     Storage::put($file, $image_base64);
        // } else {
        //     echo 0;
        // }
    }

    public function getData(Request $request) //get data status absen/absen js dan filter tanggal
    {
        $tanggal = $request->tanggal;
        $data = DB::table('users')
            ->select('absen.*', 'users.name', 'users.jurusan')
            ->join('absen', 'users.id', '=', 'absen.user_id')
            ->where('tanggal', $tanggal)
            ->get();
        $user = User::get();
        return view('master_absensi.absen.data', compact('data', 'user', 'tanggal'));
    }

    public function halaman_hapus()
    {
        $data = Absen::get();
        return view('master_absensi.absen.halaman_hapus', compact('data'));
    }

    public function hapusPhoto(Request $request)
    {
        $data = Absen::findOrFail($request->id);
        foreach ($data as $value) {
            Storage::delete('public/gambar/foto-absen/' . $value->foto_absen);
            $value->update([
                'foto_absen' => null,
            ]);
        }

        Alert::success('Berhasil.', 'Data Berhasil Dihapus.');
        return redirect()->route('absensi.hapus');
    }

    public function halaman_rekap() //link/halaman rekap
    {
        return view('master_absensi.absen.rekap_absen');
    }

    public function getDataRekap(Request $request)
    {

        $rekap = DB::table('absen')->selectRaw('absen.user_id,name,
        MAX(IF(DAY(tanggal) = 01,status,"")) as tgl_1,
        MAX(IF(DAY(tanggal) = 02,status,"")) as tgl_2,
        MAX(IF(DAY(tanggal) = 03,status,"")) as tgl_3,
        MAX(IF(DAY(tanggal) = 04,status,"")) as tgl_4,
        MAX(IF(DAY(tanggal) = 05,status,"")) as tgl_5,
        MAX(IF(DAY(tanggal) = 06,status,"")) as tgl_6,
        MAX(IF(DAY(tanggal) = 07,status,"")) as tgl_7,
        MAX(IF(DAY(tanggal) = 08,status,"")) as tgl_8,
        MAX(IF(DAY(tanggal) = 09,status,"")) as tgl_9,
        MAX(IF(DAY(tanggal) = 10,status,"")) as tgl_10,
        MAX(IF(DAY(tanggal) = 11,status,"")) as tgl_11,
        MAX(IF(DAY(tanggal) = 12,status,"")) as tgl_12,
        MAX(IF(DAY(tanggal) = 13,status,"")) as tgl_13,
        MAX(IF(DAY(tanggal) = 14,status,"")) as tgl_14,
        MAX(IF(DAY(tanggal) = 15,status,"")) as tgl_15,
        MAX(IF(DAY(tanggal) = 16,status,"")) as tgl_16,
        MAX(IF(DAY(tanggal) = 17,status,"")) as tgl_17,
        MAX(IF(DAY(tanggal) = 18,status,"")) as tgl_18,
        MAX(IF(DAY(tanggal) = 19,status,"")) as tgl_19,
        MAX(IF(DAY(tanggal) = 20,status,"")) as tgl_20,
        MAX(IF(DAY(tanggal) = 21,status,"")) as tgl_21,
        MAX(IF(DAY(tanggal) = 22,status,"")) as tgl_22,
        MAX(IF(DAY(tanggal) = 23,status,"")) as tgl_23,
        MAX(IF(DAY(tanggal) = 24,status,"")) as tgl_24,
        MAX(IF(DAY(tanggal) = 25,status,"")) as tgl_25,
        MAX(IF(DAY(tanggal) = 26,status,"")) as tgl_26,
        MAX(IF(DAY(tanggal) = 27,status,"")) as tgl_27,
        MAX(IF(DAY(tanggal) = 28,status,"")) as tgl_28,
        MAX(IF(DAY(tanggal) = 29,status,"")) as tgl_29,
        MAX(IF(DAY(tanggal) = 30,status,"")) as tgl_30,
        MAX(IF(DAY(tanggal) = 31,status,"")) as tgl_31')
            ->join('users', 'absen.user_id', '=', 'users.id')
            ->where('jurusan', $request->jurusan)
            ->where('kelas', $request->kelas)
            ->whereRaw('MONTH(tanggal)="' . $request->bulan . '"')
            ->whereRaw('YEAR(tanggal)="' . $request->tahun . '"')
            ->whereRaw('MONTH(tanggal)="' . $request->bulan . '"')
            ->selectRaw('
                 SUM(IF(status="s",1,0)) as jumlah_sakit,
                 SUM(IF(status="i",1,0)) as jumlah_izin,
                 SUM(IF(status="h",1,0)) as jumlah_hadir
                ')
            ->groupByRaw('absen.user_id,name')
            ->get();

        if ($request->bulan == '01') {
            $bulan = 'Januari';
        } elseif ($request->bulan == '02') {
            $bulan = 'Februari';
        } elseif ($request->bulan == '03') {
            $bulan = 'Maret';
        } elseif ($request->bulan == '04') {
            $bulan = 'April';
        } elseif ($request->bulan == '05') {
            $bulan = 'Mei';
        } elseif ($request->bulan == '06') {
            $bulan = 'Juni';
        } elseif ($request->bulan == '07') {
            $bulan = 'Juli';
        } elseif ($request->bulan == '08') {
            $bulan = 'Agustus';
        } elseif ($request->bulan == '09') {
            $bulan = 'September';
        } elseif ($request->bulan == '10') {
            $bulan = 'Oktober';
        } elseif ($request->bulan == '11') {
            $bulan = 'November';
        } elseif ($request->bulan == '12') {
            $bulan = 'Desember';
        }
        $kelas = $request->kelas;
        $jurusan = $request->jurusan;
        return view('master_absensi.absen.data_rekap', compact('rekap', 'bulan', 'kelas', 'jurusan'));
    }

    public function halaman_sakit()
    {
        return view('master_absensi.absen.keterangan.index_sakit');
    }

    public function getDataKetarangan(Request $request)
    {

        $dataKeterangan = DB::table('absen')->selectRaw('absen.id,user_id,name,keterangan,tanggal,foto_absen,
        MAX(IF(DAY(tanggal) = 01,status,"")) as tgl_1,
        MAX(IF(DAY(tanggal) = 02,status,"")) as tgl_2,
        MAX(IF(DAY(tanggal) = 03,status,"")) as tgl_3,
        MAX(IF(DAY(tanggal) = 04,status,"")) as tgl_4,
        MAX(IF(DAY(tanggal) = 05,status,"")) as tgl_5,
        MAX(IF(DAY(tanggal) = 06,status,"")) as tgl_6,
        MAX(IF(DAY(tanggal) = 07,status,"")) as tgl_7,
        MAX(IF(DAY(tanggal) = 08,status,"")) as tgl_8,
        MAX(IF(DAY(tanggal) = 09,status,"")) as tgl_9,
        MAX(IF(DAY(tanggal) = 10,status,"")) as tgl_10,
        MAX(IF(DAY(tanggal) = 11,status,"")) as tgl_11,
        MAX(IF(DAY(tanggal) = 12,status,"")) as tgl_12,
        MAX(IF(DAY(tanggal) = 13,status,"")) as tgl_13,
        MAX(IF(DAY(tanggal) = 14,status,"")) as tgl_14,
        MAX(IF(DAY(tanggal) = 15,status,"")) as tgl_15,
        MAX(IF(DAY(tanggal) = 16,status,"")) as tgl_16,
        MAX(IF(DAY(tanggal) = 17,status,"")) as tgl_17,
        MAX(IF(DAY(tanggal) = 18,status,"")) as tgl_18,
        MAX(IF(DAY(tanggal) = 19,status,"")) as tgl_19,
        MAX(IF(DAY(tanggal) = 20,status,"")) as tgl_20,
        MAX(IF(DAY(tanggal) = 21,status,"")) as tgl_21,
        MAX(IF(DAY(tanggal) = 22,status,"")) as tgl_22,
        MAX(IF(DAY(tanggal) = 23,status,"")) as tgl_23,
        MAX(IF(DAY(tanggal) = 24,status,"")) as tgl_24,
        MAX(IF(DAY(tanggal) = 25,status,"")) as tgl_25,
        MAX(IF(DAY(tanggal) = 26,status,"")) as tgl_26,
        MAX(IF(DAY(tanggal) = 27,status,"")) as tgl_27,
        MAX(IF(DAY(tanggal) = 28,status,"")) as tgl_28,
        MAX(IF(DAY(tanggal) = 29,status,"")) as tgl_29,
        MAX(IF(DAY(tanggal) = 30,status,"")) as tgl_30,
        MAX(IF(DAY(tanggal) = 31,status,"")) as tgl_31')
            ->join('users', 'absen.user_id', '=', 'users.id')
            ->where('jurusan', $request->jurusan)
            ->where('kelas', $request->kelas)
            ->whereRaw('MONTH(tanggal)="' . $request->bulan . '"')
            ->whereRaw('YEAR(tanggal)="' . $request->tahun . '"')
            ->where('status', $request->input_keterangan)
            ->groupByRaw('absen.id,user_id,name,keterangan,tanggal,foto_absen')
            ->get();
        if ($request->bulan == '01') {
            $bulan = 'Januari';
        } elseif ($request->bulan == '02') {
            $bulan = 'Februari';
        } elseif ($request->bulan == '03') {
            $bulan = 'Maret';
        } elseif ($request->bulan == '04') {
            $bulan = 'April';
        } elseif ($request->bulan == '05') {
            $bulan = 'Mei';
        } elseif ($request->bulan == '06') {
            $bulan = 'Juni';
        } elseif ($request->bulan == '07') {
            $bulan = 'Juli';
        } elseif ($request->bulan == '08') {
            $bulan = 'Agustus';
        } elseif ($request->bulan == '09') {
            $bulan = 'September';
        } elseif ($request->bulan == '10') {
            $bulan = 'Oktober';
        } elseif ($request->bulan == '11') {
            $bulan = 'November';
        } elseif ($request->bulan == '12') {
            $bulan = 'Desember';
        }
        $kelas = $request->kelas;
        $jurusan = $request->jurusan;
        return view('master_absensi.absen.keterangan.data_keterangan', compact('dataKeterangan', 'bulan', 'kelas', 'jurusan'));
    }

    public function halaman_izin()
    {
        return view('master_absensi.absen.keterangan.index_izin');
    }

    public function show($id)
    {
        $absen = Absen::find($id);
        return view('master_absensi.absen.keterangan.detail', compact('absen'));
    }
}
