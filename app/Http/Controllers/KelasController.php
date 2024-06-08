<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Kelas\KelasRequest;

class KelasController extends Controller
{
    public function index()
    {
        return view('master_akademik.kelas.index', [
            'data' => Kelas::get()
        ]);
    }

    public function store(KelasRequest $request)
    {
        $user = Kelas::create([
            "name" => $request->name,
            "kode_kelas" => $request->kode_kelas,
        ]);

        $user->save();
        Alert::success('Berhasil.', 'Data Berhasil di Tambah.');
        return redirect()->back();
    }

    public function destroy(Request $request, $id)
    {
        Kelas::destroy($id);
        Alert::success('Berhasil.', 'Data Berhasil Dihapus.');
        return redirect()->route('kelas.index');
    }
}
