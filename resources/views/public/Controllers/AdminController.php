<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // CREATE
    public function create(Request $r)
    {

        $pict = $r->file('foto_ktp');
        $path = public_path('/public/picture/');
        $img = rand() . "." . $pict->getClientOriginalExtension();
        $pict->move($path, $img);
        DB::table('data_master_atlet')->insert([
            'Nama' => $r->nama,
            'Nomer_Telepon' => $r->Nomer_Telepon,
            'Jenis_kelamin' => $r->jenis_kelamin,
            'foto_ktp' => $img,
            'nomer_ktp' => $r->nomer_ktp,
            'Alamat' => $r->alamat,
            'nama_cabor' => $r->nama_cabor,
            'email' => $r->email
        ]);
        return redirect('/Data-Atlet');
    }
    // READ
    public function read()
    {
        $atlet_r = DB::table('data_master_atlet')->get();
        return view('atlet', ['atlet' => $atlet_r]);
    }
    // UPDATE
    public function redirect_update($id)
    {
        $atlet_u = DB::table('data_master_atlet')->get()->where("id", $id);
        $atlet = DB::table('cabor')->get();
        return view('atletedit', ['atlet' => $atlet_u, 'cabor' => $atlet]);
    }
    public function update(Request $r)
    {
        $this->validate($r, [
            'Nama' => 'required',
            'Nomer_Telepon' => 'required',
            'Jenis_kelamin' => 'required',
            'foto_ktp' => 'required',
            'nomer_ktp' => 'required',
            'Alamat' => 'required',
            'nama_cabor' => 'required',
            'email' => 'required'
        ]);
        $pict = $r->file('foto_ktp');
        $path = public_path('/public/picture/');
        $img = rand() . "." . $pict->getClientOriginalExtension();
        $pict->move($path, $img);
        DB::table('data_master_atlet')->where('id', $r->id)->update([
            'Nama' => $r->Nama,
            'Nomer_Telepon' => $r->Nomer_Telepon,
            'Jenis_kelamin' => $r->Jenis_kelamin,
            'foto_ktp' => $img,
            'nomer_ktp' => $r->nomer_ktp,
            'Alamat' => $r->Alamat,
            'nama_cabor' => $r->nama_cabor,
            'email' => $r->email
        ]);
        return redirect('/Data-Atlet');
    }
    // DELETE
    public function delete($id)
    {
        DB::table('data_master_atlet')->where('id', $id)->delete();
        return redirect('/Data-Atlet');
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;
        $atlet = DB::table('data_master_atlet')
            ->where('id', 'like', "%" . $cari . "%")
            ->paginate();
        return view('atlet', ['atlet' => $atlet]);
    }
}
