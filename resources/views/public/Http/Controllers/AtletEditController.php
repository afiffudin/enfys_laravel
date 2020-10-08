<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AtletEditController extends Controller
{
    public function arah($id)
    {
        $data_master_atlet = DB::table('data_master_atlet')->get()->where("id", $id);
        return view('atletedit', ['atlet' => $data_master_atlet]);
    }
    public function edit(Request $r)
    {
        $this->validate($r, [
            'Nama' => 'required',
            'Nomer_Telepon' => 'required',
            'Jenis_kelamin' => 'required',
            'foto_ktp' => 'required',
            'nomer_ktp' => 'required',
            'Alamat' => 'required',
            'Cabor' => 'required'
        ]);
        // update data data_master_atlet
        DB::table('data_master_atlet')->where('id', $r->id)->update([
            'Nama' => $r->Nama,
            'Nomer_Telepon' => $r->Nomer_Telepon,
            'Jenis_kelamin' => $r->Jenis_kelamin,
            'foto_ktp' => $r->foto_ktp,
            'nomer_ktp' => $r->nomer_ktp,
            'Alamat' => $r->Alamat,
            'Cabor' => $r->Cabor
        ]);
        // alihkan halaman edit ke halaman data_master_atlet
        return redirect('/kedua');
    }
}
