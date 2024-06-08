<?php

namespace App\Http\Controllers;

use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TahunAjaranController extends Controller
{

    public function index()
    {
        $data = TahunAjaran::get();
        return view('master_akademik.tahunAjaran.index', compact('data'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        TahunAjaran::create([

            'name'      => $request->name,
            'semester'      => $request->semester,
            'status'      => $request->status,
        ]);
        Alert::success('Berhasil.', 'Data Di Tambah.');
        return redirect()->route('tahunAjaran.index');
    }

    public function show(TahunAjaran $tahunAjaran)
    {
        //
    }

    public function edit(TahunAjaran $tahunAjaran)
    {
        return view('akademik.master_data.tahun_ajaran.edit', compact('tahunAjaran'));
    }

    public function update(Request $request, TahunAjaran $tahunAjaran)
    {
        $tahunAjaran->update([
            'name'     => $request->name,
            'status'      => $request->status,
            'semester'      => $request->semester,
        ]);
        Alert::success('Berhasil.', 'Data Di edit.');

        return redirect()->route('tahunAjaran.index');
    }

    public function destroy(TahunAjaran $tahunAjaran)
    {
        //
    }
}
