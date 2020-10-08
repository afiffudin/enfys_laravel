<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CaborController extends Controller
{
    // CREATE
    public function create(Request $r)
    {
        $cabor_c = DB::table('data_cabor')->insert([
            'nama_cabor' => $r->nama_cabor
        ]);
        return back();
    }
    // READ
    public function read()
    {
        $cabor_r = DB::table('data_cabor')->get();
        return view('cabor', ['cabor' => $cabor_r]);
    }
    // UPDATE
    public function redirect_update($id_cabor)
    {
        $atlet_u = DB::table('data_cabor')->get()->where("id_cabor", $id_cabor);
        return view('caboredit', ['cabor' => $atlet_u]);
    }
    public function update(Request $r)
    {
        $this->validate($r, [
            'nama_cabor' => 'required'
        ]);
        DB::table('data_cabor')->where('id_cabor', $r->id_cabor)->update([
            'nama_cabor' => $r->nama_cabor
        ]);
        return redirect('/Data-cabor');
    }
    // DELETE
    public function delete($id_cabor)
    {
        DB::table('data_cabor')->where('id_cabor', $id_cabor)->delete();
        return redirect('/Data-cabor');
    }
    public function cari(Request $request)
    {
        $cari = $request->cari;
        $cabor = DB::table('data_cabor')
            ->where('id_cabor', 'like', "%" . $cari . "%")
            ->paginate();
        return view('cabor', ['cabor' => $cabor]);
    }
}
