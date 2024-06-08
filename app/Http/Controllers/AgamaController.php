<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Agama\AgamaRequest;

class AgamaController extends Controller
{
    public function index()
    {
        return view('master_akademik.agama.index', [
            'data' => Agama::get()
        ]);
    }

    public function store(AgamaRequest $request)
    {
        $user = Agama::create([
            "name" => $request->name,
        ]);

        $user->save();
        Alert::success('Berhasil.', 'Data Berhasil di Tambah.');
        return redirect()->back();
    }

    public function destroy(Request $request, $id)
    {
        Agama::destroy($id);
        Alert::success('Berhasil.', 'Data Berhasil Dihapus.');
        return redirect()->route('agama.index');
    }
}
