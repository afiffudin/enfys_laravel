<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminCaborController extends Controller
{
    // Create user admin baru di tabel user
    public function create(Request $r)
    {
        DB::table('users')->insert([
            'name' => $r->name,
            'email' => $r->email,
            'password' => Hash::make($r->password),

        ]);
        //Insert data admin cabor
        $cabor_c = DB::table('admin_cabor')->insert([
            'Nama' => $r->Nama,
            'nama_cabor' => $r->nama_cabor,
            'email' => $r->email,
            'username' => $r->username
        ]);
        return redirect('Data-admincabor');
    }
    // match data Admin Cabor dan data_cabor
    public function match()
    {
        $cabor_r = DB::table('admin_cabor')->get();
        $cabor = DB::table('data_cabor')->get();
        dd($cabor);
        return view('admincabor', ['admincabor' => $cabor_r, 'cabor' => $cabor]);
    }
    // Read Data Cabor kew view admincabor
    public function read()
    {
        $atlet_r = DB::table('admin_cabor')->get();
        return view('admincabor', ['admincabor' => $atlet_r]);
    }
    // Update Admin Cabor dan Data Cabor ke view editadmincabor
    public function redirect_update($id)
    {
        $atlet_u = DB::table('admin_cabor')->get()->where("id", $id);
        $atlet = DB::table('data_cabor')->get();
        return view('editadmincabor', ['admincabor' => $atlet_u, 'cabor' => $atlet]);
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
    // Delete Data Admin Cabor
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
//Catatan : Semua alur ada di routes,jadi sering liat2 routes di halaman routes