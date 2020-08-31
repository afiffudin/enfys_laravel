<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminCaborController extends Controller
{
    // CREATE
    public function create(Request $r)
    {
        $cabor_c = DB::table('admin_cabor')->insert([
            'Nama' => $r->Nama,
            'nama_cabor' => $r->nama_cabor,
            'email' => $r->email,
            'username' => $r->username
        ]);
        return redirect('Data-admincabor');
    }
    // READ
    public function match()
    {
        $cabor_r = DB::table('admin_cabor')->get();
        $cabor = DB::table('cabor')->get();
        dd($cabor);
        return view('admincabor', ['admincabor' => $cabor_r, 'cabor' => $cabor]);
    }
    // READ
    public function read()
    {
        $atlet_r = DB::table('admin_cabor')->get();
        return view('admincabor', ['admincabor' => $atlet_r]);
    }
    // UPDATE
    public function redirect_update($id)
    {
        $atlet_u = DB::table('admin_cabor')->get()->where("id", $id);
        return view('editadmincabor', ['admincabor' => $atlet_u]);
    }
    public function update(Request $r)
    {
        $this->validate($r, [
            'Nama' => 'required',
            'nama_cabor' => 'required',
            'email' => 'required',
            'username' => 'required'
        ]);
        DB::table('admin_cabor')->where('id', $r->id)->update([
            'Nama' => $r->Nama,
            'nama_cabor' => $r->nama_cabor,
            'email' => $r->email,
            'username' => $r->username
        ]);
        return redirect('/Data-admincabor');
    }
    // DELETE
    public function delete($id)
    {
        DB::table('admin_cabor')->where('Nama', $id)->delete();
        return redirect('/Data-admincabor');
    }
    public function cari(Request $request)
    {
        $cari = $request->cari;
        $cabor = DB::table('admin_cabor')
            ->where('id', 'like', "%" . $cari . "%")
            ->paginate();
        return view('admincabor', ['cabor' => $atlet]);
    }
}
