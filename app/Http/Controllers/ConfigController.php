<?php

namespace App\Http\Controllers;

use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Config\CreateConfigRequest;
use App\Http\Requests\Config\UpdateConfigRequest;

class ConfigController extends Controller
{
    public function index()
    {
        return view('config.index', [
            'config' => Config::first()
        ]);
    }

    public function create()
    {
        return view('config.create');
    }

    public function store(CreateConfigRequest $request)
    {
        $file = $request->file('logo'); //ambil file
        $fileNameLogo = uniqid() . '.' . $file->getClientOriginalExtension(); //ambil extensi
        $file->storeAs('public/gambar/configs', $fileNameLogo); //lokasi file

        $file = $request->file('cap'); //ambil file
        $fileNameCap = uniqid() . '.' . $file->getClientOriginalExtension(); //ambil extensi
        $file->storeAs('public/gambar/configs', $fileNameCap); //lokasi file

        $file = $request->file('ttd'); //ambil file
        $fileNameTtd = uniqid() . '.' . $file->getClientOriginalExtension(); //ambil extensi
        $file->storeAs('public/gambar/configs', $fileNameTtd); //lokasi file

        $user = Config::create([
            'nama_kepsek' => $request->nama_kepsek,
            'nip_kepsek' => $request->nip_kepsek,
            'nama_web' => $request->nama_web,
            'visi' => $request->visi,
            'misi' => $request->misi,
            "cap" => $fileNameCap,
            "logo" => $fileNameLogo,
            "ttd" => $fileNameTtd,
            "jam" => $request->jam,
        ]);

        Alert::success('Berhasil.', 'Data Berhasil di Tambah.');
        return redirect('/config');
    }

    public function edit(Config $config)
    {
        return view('config.edit', [
            'config' => $config
        ]);
    }

    public function update(UpdateConfigRequest $request, $id)
    {
        if ($request->hasFile('ttd')) {
            $file = $request->file('ttd'); //ambil file
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension(); //ambil extensi
            $file->storeAs('public/gambar/configs', $fileName); //lokasi file
            //hapus gambar lama
            Storage::delete('public/gambar/configs/' . $request->old_ttd);
            
            $data['ttd'] = $fileName;
        } else {
            $data['ttd'] = $request->old_ttd;
        }

        if ($request->hasFile('cap')) {
            $file = $request->file('cap'); //ambil file
            $fileNameCap = uniqid() . '.' . $file->getClientOriginalExtension(); //ambil extensi
            $file->storeAs('public/gambar/configs', $fileNameCap); //lokasi file
            //hapus gambar lama
            Storage::delete('public/gambar/configs/' . $request->old_cap);
            $data['cap'] = $fileNameCap;
        } else {
            $data['cap'] = $request->old_cap;
        }

        if ($request->hasFile('logo')) {
            $file = $request->file('logo'); //ambil file
            $fileNameLogo = uniqid() . '.' . $file->getClientOriginalExtension(); //ambil extensi
            $file->storeAs('public/gambar/configs', $fileNameLogo); //lokasi file
            //hapus gambar lama
            Storage::delete('public/gambar/configs/' . $request->old_logo);
            $data['logo'] = $fileNameLogo;
        } else {
            $data['logo'] = $request->old_logo;
        }

        $data['nama_kepsek'] = $request->nama_kepsek;
        $data['nip_kepsek'] = $request->nip_kepsek;
        $data['nama_web'] = $request->nama_web;
        $data['visi'] = $request->visi;
        $data['misi'] = $request->misi;
        $data['jam'] = $request->jam;

        Config::where('id', $id)->update($data);
        Alert::success('Berhasil.', 'Data Berhasil di Edit.');
        return redirect('/config');
    }

    public function delete($id)
    {
    }
}
