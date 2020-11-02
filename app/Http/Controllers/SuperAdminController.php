<?php

namespace App\Http\Controllers;

use App\atlit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuperAdminControllers extends Controller
{
    //Ini add data master atlet
    public function add(Request $request)
    {
        DB::table('data_master_atlet')->insert([
            'Nama' => $request->Nama,
            'Nomer_Telepon' => $request->Nomer_Telepon,
            'Jenis_kelamin' => $request->Jenis_kelamin,
            'foto_ktp' => $request->foto_ktp,
            'nomer_ktp' => $request->nomer_ktp,
            'Alamat' => $request->Alamat,
            'Cabang_Asal' => $request->Cabang_Asal
        ]);
        return redirect('/kedua');
    }
    public function index()
    {
        $atlet = DB::table('data_master_atlet')->get();
        return view('atlet', compact('atlet'));
    }
}
///Catatan : Semua alur ada di routes,jadi sering2 liat di routes ya