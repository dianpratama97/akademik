<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Jurusan\JurusanRequest;

class JurusanController extends Controller
{
    public function index(){
        return view('master_akademik.jurusan.index',[
            'data' => Jurusan::get()
        ]);
    }
    public function store(JurusanRequest $request){
        $user = Jurusan::create([
            "name" => $request->name,
            "kode_jurusan" => $request->kode_jurusan,
        ]);

        $user->save();
        Alert::success('Berhasil.', 'Data Berhasil di Tambah.');
        return redirect()->back();
    }

    public function destroy(Request $request, $id)
    {
        Jurusan::destroy($id);
        Alert::success('Berhasil.', 'Data Berhasil Dihapus.');
        return redirect()->route('jurusan.index');
    }
}
