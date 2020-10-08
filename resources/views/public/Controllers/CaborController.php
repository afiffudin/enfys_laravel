<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CaborController extends Controller
{
    // CREATE
    public function create(Request $r)
    {
        $cabor_c = DB::table('cabor')->insert([
            'nama_cabor' => $r->nama_cabor
        ]);
        return back();
    }
    // READ
    public function read()
    {
        $cabor_r = DB::table('cabor')->get();
        return view('cabor', ['cabor' => $cabor_r]);
    }
    // UPDATE
    public function redirect_update($id)
    {
        $atlet_u = DB::table('cabor')->get()->where("id", $id);
        return view('caboredit', ['cabor' => $atlet_u]);
    }
    public function update(Request $r)
    {
        $this->validate($r, [
            'nama_cabor' => 'required'
        ]);
        DB::table('cabor')->where('id', $r->id)->update([
            'nama_cabor' => $r->nama_cabor
        ]);
        return redirect('/Data-cabor');
    }
    // DELETE
    public function delete($id)
    {
        DB::table('cabor')->where('id', $id)->delete();
        return redirect('/Data-cabor');
    }
    public function cari(Request $request)
    {
        $cari = $request->cari;
        $cabor = DB::table('cabor')
            ->where('id', 'like', "%" . $cari . "%")
            ->paginate();
        return view('cabor', ['cabor' => $cabor]);
    }
}
