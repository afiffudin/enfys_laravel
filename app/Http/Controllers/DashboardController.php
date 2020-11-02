<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //join data cabor dan data master atlet buat ambil id cabor
    public function read()
    {
        $data_cabor = DB::table('data_cabor')
            ->join('data_master_atlet', 'data_cabor.id_cabor', '=', 'data_master_atlet.id_cabor')
            ->join('jadwal', 'data_cabor.id_cabor', '=', 'jadwal.id_cabor')
            ->select('data_cabor.*', 'data_master_atlet')
            ->get();
    }
}
///Catatan : Semua Alur Ada di Routes,Jadi sering2 liat di Routes ya
