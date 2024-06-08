<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use App\DataTables\UsersDataTable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Users\CreateRequest as UserCreateRequest;
use App\Http\Requests\Users\UpdateRequest as UserUpdateRequest;

class UsersController extends Controller
{
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('users.index');
    }

    public function import()
    {
        Excel::import(new UsersImport, request()->file('excel'));
        Alert::success('Berhasil.', 'Data Berhasil Di Import.');
        return redirect('/users')->with('success', 'All good!');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function store(UserCreateRequest $request)
    {
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "username" => $request->username,
            "password" => Hash::make($request->password),
            "role" => $request->role,
            "status_biodata" => $request->status_biodata,
        ]);

        $user->save();
        Alert::success('Berhasil.', 'Data Berhasil di Tambah.');
        return redirect()->back();
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        if ($request->password == null) {
            $pass = Auth::user()->password;
        } else {
            $pass = Hash::make($request->password);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = $pass;
        $user->role = $request->role;
        $user->status_biodata = $request->status_biodata;
        $user->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Update Data Successfully'
        ]);
    }

    public function destroy(User $user)
    {

        if (!$user->biodata) {
            $user->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Data di hapus.'
            ]);
        } else {
            Storage::delete('public/gambar/users/' . $user->biodata->image);
            $user->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Data di hapus.'
            ]);
        }
    }

    public function hapusAllUser(Request $request)
    {
        $data = User::findOrFail($request->id);
        foreach ($data as $value) {
            if (!$value->biodata) {
                User::destroy($value->id);
            } else {
                Storage::delete('public/gambar/users/' . $value->biodata->image);
                User::destroy($value->id);
            }
        }
        Alert::success('Berhasil.', 'Data Berhasil Dihapus.');
        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        return view('users.detail', compact('user'));
    }

}
