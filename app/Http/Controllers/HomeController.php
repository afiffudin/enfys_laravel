<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    function authenticated(Request $request, $user)
    {
        $user->update([
            'last_login_at' => Carbon::now()->toDateTimeString(),
            'last_login_ip' => $request->getClientIp()
        ]);
    }
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('Admin.dashboard');
    }
    public function read()
    {
        $data['data_cabor'] = DB::table('data_cabor')
            ->join('data_master_atlet', 'data_cabor.id_cabor', '=', 'data_master_atlet.id_cabor')
            ->join('jadwal', 'data_cabor.id_cabor', '=', 'jadwal.id_cabor')
            ->select('data_cabor.*', 'data_master_atlet.id_cabor', 'jadwal.Nama')
            ->get();
        return view('TampilCabor.Cabor', $data);
        // dd($data['data_cabor']);
    }
    public function read_plotkendaraan()
    {
        $plot_kendaraan = DB::table('jadwal')
            ->join('data_master_atlet', 'data_cabor.id_cabor', '=', 'data_master_atlet.id_cabor')
            ->join('jadwal', 'data_cabor.id_cabor', '=', 'jadwal.id_cabor')
            ->select('data_cabor.*', 'data_master_atlet.id_cabor', 'jadwal.Nama')
            ->get();
        return view('TampilCabor.Cabor');
        // dd($plot_kendaraan);
    }
}
