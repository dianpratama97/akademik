<?php

namespace App\Http\Controllers;

use App\Http\Requests\Kelas\KelasRequest;
use App\Http\Requests\Kelulusan\KelulusanRequest;
use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\Kelulusan;
use Illuminate\Http\Request;
use App\Imports\KelulusanImport;
use App\Models\Config;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class KelulusanController extends Controller
{
    public function index()
    {
        $data = Kelulusan::get();
        $jurusan = Jurusan::get();
        $kelas = Kelas::get();
        return view('kelulusan.index', compact('data', 'jurusan', 'kelas'));
    }

    public function import()
    {
        Excel::import(new KelulusanImport, request()->file('excel'));
        Alert::success('Berhasil.', 'Data Berhasil Di Import.');
        return redirect('/kelulusan')->with('success', 'All good!');
    }

    public function store(KelulusanRequest $request)
    {
        Kelulusan::create([

            'name'      => $request->name,
            'nisn'      => $request->nisn,
            'jurusan'      => $request->jurusan,
            'kelas'      => $request->kelas,
            'status_lulus'      => $request->status_lulus,
        ]);
        Alert::success('Berhasil.', 'Data Di Tambah.');
        return redirect()->route('kelulusan.index');
    }

    public function edit($id)
    {
        $kelulusan = Kelulusan::find($id);
        $jurusan = Jurusan::get();
        $kelas = Kelas::get();
        return view('kelulusan.edit', compact('kelulusan', 'kelas', 'jurusan'));
    }

    public function update(Request $request, $id)
    {
        $data['name'] = $request->name;
        $data['nisn'] = $request->nisn;
        $data['kelas'] = $request->kelas;
        $data['jurusan'] = $request->jurusan;
        $data['status_lulus'] = $request->status_lulus;

        Kelulusan::where('id', $id)->update($data);
        Alert::success('Berhasil.', 'Data Berhasil di Edit.');
        return redirect('/kelulusan');
    }

    public function hapusAllKelulusan(Request $request)
    {
        $data = Kelulusan::findOrFail($request->id);
        foreach ($data as $value) {

            Kelulusan::destroy($value->id);
        }
        Alert::success('Berhasil.', 'Data Berhasil Dihapus.');
        return redirect()->route('kelulusan.index');
    }

    // halaman siswa
    public function halaman_cek()
    {
        return view('kelulusan.siswa.index', [
            'config' => Config::first()
        ]);
    }

    public function cek()
    {
        $keyword = request()->nisn_user;
        
        if ($keyword) {
            $data = Kelulusan::where('nisn', 'like', '%' . $keyword . '%')->first();
            return view('kelulusan.siswa.hasil', compact('data'));
        }
    }
}
