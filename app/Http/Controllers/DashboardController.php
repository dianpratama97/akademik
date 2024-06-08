<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Absen;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $absen = Absen::where('user_id', Auth::user()->id)->where('tanggal', date('Y-m-d'))->first();
        return view('dashboard', compact('absen'));
    }
}
