<?php

namespace App\Http\Controllers;

use App\User;
use FFI\CData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Input;
use Auth;

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

    //index join data load jadwal dan data cabor buat nampilin id_cabor dan nama cabor yg ada di dashboard Cabor,
    //jadi atlit yang udh punya cabang olahraga,
    //harus di buat jadwal dulu.
    public function index(Request $request)
    {
        // $plot_kendaraan = DB::table('jadwal')->get();
        $jadwal_r = DB::table('jadwal')->get();
        $data_cabor = DB::table('data_cabor')
            ->join('jadwal', 'data_cabor.id_cabor', '=', 'jadwal.id_cabor')
            ->select('data_cabor.*', 'data_cabor.id_cabor', 'jadwal.Nama')
            ->get();
        $jadwal = DB::table('jadwal');
        if ($request->tanggal_keberangkatan) {
            $tanggal_keberangkatan = date('Y-m-d', strtotime($request->tanggal_keberangkatan));
            $jadwal->where('tanggal_keberangkatan', $tanggal_keberangkatan);
        } else {
            $jadwal->where('tanggal_keberangkatan', date('Y-m-d'));
        }
        $jadwal = $jadwal->get();
        return view('Admin.dashboard', ['jadwal' => $jadwal, 'data_cabor' => $data_cabor, 'seluruhjadwal' => $jadwal_r]);
    }
    //join data cabor sama jadwal buat nampili id cabor sama nama atlet 
    public function read()
    {
        $data['data_cabor'] = DB::table('data_cabor')
            ->join('jadwal', 'data_cabor.id_cabor', '=', 'jadwal.id_cabor')
            ->select('data_cabor.*', 'data_cabor.id_cabor', 'jadwal.Nama')
            ->get();
        return view('TampilCabor.Cabor', $data);
        // dd($data['data_cabor']);
    }
    ///ini buat jadwal otomatis hari ini
    public function jadwalhari(Request $request)
    {
        $jadwal = DB::table('jadwal');
        if ($request->tanggal_keberangkatan) {
            $tanggal_keberangkatan = date('Y-m-d', strtotime($request->tanggal_keberangkatan));
            $jadwal->where('tanggal_keberangkatan', $tanggal_keberangkatan);
        } else {
            $jadwal->where('tanggal_keberangkatan', date('Y-m-d'));
        }
        $jadwal = $jadwal->get();
        return view('Admin.jadwalharian', ['jadwal' => $jadwal]);
    }
    //update account login semua di dashboard
    public function updateAccount(Request $r)
    {
        $this->validate($r, [
            'email' => 'required',
            'password' => 'required'
        ]);
        DB::table('users')->where('id', $r->id)->update([
            'email' => $r->email,
            'password' => Hash::make($r->password)
        ]);
        return redirect('/dashboard');
        // dd($r->id);
    }
    //Hitung Atau pengelompokan Cabang olahraga 
    public function hitungcabor()
    {
        $cabor = Cabor::count();
        return view('Admin.dashboard', compact(''));
    }
    //Update Profile account kemudian lempar ke view Admin/updateprofile
    public function updateprofil(Request $request)
    {
        $data['update'] = User::find($request->id);
        return view('Admin.updateprofile', $data);
    }
}
    //Catatan : Semua Alur Ada di Routes,jadi sering2 liat ya  