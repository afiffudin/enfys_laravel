<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatusController extends Controller
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
        return view('admincabor', ['admincabor' => $cabor_r, 'cabor' => $cabor]);
    }
    // UPDATE
    public function redirect_update($id)
    {
        $atlet_u = DB::table('admin_cabor')->get()->where("id", $id);
        return view('admincabor', ['admincabor' => $atlet_u]);
    }
    public function update(Request $r)
    {
        $this->validate($r, [
            'nama_cabor' => 'required'
        ]);
        DB::table('admin_cabor')->where('id', $r->id)->update([
            'Name' => $r->Nama,
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
}
    ///public function cari(Request $request)
    //{
       // $cari = $request->cari;
        //$cabor = DB::table('admin_cabor')
          //  ->where('id', 'like', "%" . $cari . "%")
           // ->paginate();
       // return view('cabor', ['cabor' => $atlet]);
   // }
//}
