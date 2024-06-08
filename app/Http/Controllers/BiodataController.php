<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\User;
use App\Models\Agama;
use App\Models\Kelas;
use App\Models\Biodata;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Biodata\CreateBiodataRequest;
use App\Http\Requests\Biodata\UpdateBiodataRequest;
use App\Models\Config;

class BiodataController extends Controller
{

    public function index()
    {
        return view('siswa.biodata.index', [
            'agama' => Agama::get(),
            'jurusan' => Jurusan::get(),
            'kelas' => Kelas::get(),
        ]);
    }

    public function store(CreateBiodataRequest $request)
    {
        $file = $request->file('image'); //ambil file
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension(); //ambil extensi
        $file->storeAs('public/gambar/users', $fileName); //lokasi file

        $user = Biodata::create([
            'user_id' => Auth::user()->id,
            'agama_id' => $request->agama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tahun_masuk' => $request->tahun_masuk,
            'gender' => $request->gender,
            'alamat' => $request->alamat,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'provinsi' => $request->provinsi,
            'no_hp_wali' => $request->no_hp_wali,
            "image" => $fileName,
        ]);



        $userUpdate = User::find(auth()->user()->id);
        
        $userUpdate->update([
            'email' => $request->email,
            'jurusan' => $request->jurusan,
            'kelas' => $request->kelas,
            'status_biodata' => 1,
        ]);

        $user->save();
        $userUpdate->save();
        Alert::success('Berhasil.', 'Biodata Lengkap.');
        return redirect('/dashboard');
    }

    public function edit($id)
    {
        return view('siswa.biodata.edit', [
            'biodata' => User::find($id),
            'agama' => Agama::get(),
            'jurusan' => Jurusan::get(),
            'kelas' => Kelas::get(),
        ]);
    }

    public function update(UpdateBiodataRequest $request, $id)
    {

        if ($request->hasFile('image')) {
            $file = $request->file('image'); //ambil file
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension(); //ambil extensi
            $file->storeAs('public/gambar/users', $fileName); //lokasi file
            //hapus gambar lama
            Storage::delete('public/gambar/users/' . $request->old_image);
            $data['image'] = $fileName;
        } else {
            $data['image'] = $request->old_image;
        }
        $data['user_id'] = Auth::user()->id;
        $data['agama_id'] = $request->agama;
        $data['tempat_lahir'] = $request->tempat_lahir;
        $data['tanggal_lahir'] = $request->tanggal_lahir;
        $data['tahun_masuk'] = $request->tahun_masuk;
        $data['alamat'] = $request->alamat;
        $data['gender'] = $request->gender;
        $data['kecamatan'] = $request->kecamatan;
        $data['kabupaten'] = $request->kabupaten;
        $data['provinsi'] = $request->provinsi;
        $data['no_hp_wali'] = $request->no_hp_wali;


        Biodata::where('user_id', $id)->update($data);
        $userUpdate = User::find(auth()->user()->id);
        $userUpdate->update([
            'email' => $request->email,
            'jurusan' => $request->jurusan,
            'kelas' => $request->kelas,
            'status_biodata' => 1,
        ]);
        $userUpdate->save();
        Alert::success('Berhasil.', 'Data Berhasil di Edit.');
        return redirect('/dashboard');
    }

    public function cetak()
    {
        $data = User::where('id', Auth::user()->id)->get();
        $config = Config::first();
        $pdf = PDF::loadVIEW('siswa.index', compact('data', 'config'))->setPaper(array(0, 0, 310, 400), 'potrait');
        $user = auth()->user()->name;
        return $pdf->stream("Kartu Pelajar - $user.pdf");
    }
}
