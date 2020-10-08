<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function read()
    {
        $data_cabor = DB::table('data_cabor')
            ->join('data_master_atlet', 'data_cabor.id_cabor', '=', 'data_master_atlet.id_cabor')
            ->join('jadwal', 'data_cabor.id_cabor', '=', 'jadwal.id_cabor')
            ->select('data_cabor.*', 'data_master_atlet')
            ->get();
    }
}
    // public function index()
    // {

    // return view('');
    // }
