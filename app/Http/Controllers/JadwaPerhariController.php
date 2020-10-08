<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class JadwalPerhariController extends Controller
{
    // READ
    public function read()
    {
        $jadwal_r = DB::table('jadwal')->get();
        return view('lihatjadwal', ['lihatjadwal' => $jadwal_r]);
    }
    // UPDATE


    public function cari(Request $request)
    {
        DB::table('users')->whereDate($day);
        $cari = $request->cari;
        $cabor = DB::table('jadwal')
            ->where('id', 'like', "%" . $cari . "%")
            ->paginate();
        return view('lihatjadwal', ['jadwal' => $cabor]);
    }
}
