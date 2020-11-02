<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\atlit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AtletAddkoniController extends Controller
{
    public function create(Request $request)
    {
        //input data login admin koni ke tabel user
        DB::table('users')->insert([
            'id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id
        ]);
        dd(Hash::make($request->password));

        DB::table('data_master_nomer_ketua_koni')->insert([
            'Nama' => $request->Nama,
            'Nomer_Telepon' => $request->Nomer_Telepon,
            'email' => $request->email
        ]);
        return redirect('/ketuakoni');
    }
    // Read data master ketua koni
    public function read()
    {
        $ketua_r = DB::table('data_master_nomer_ketua_koni')->get();
        return view('list_ketuakoni', ['ketuakoni' => $ketua_r]);
    }
    // UPDATE data master ketua koni ke view editketuakoni
    public function redirect_update($id)
    {
        $ketua_u = DB::table('data_master_nomer_ketua_koni')->get()->where("id", $id);
        return view('editketuakoni', ['ketuakoni' => $ketua_u]);
    }
    public function update(Request $r)
    {
        $this->validate($r, [
            'Nama' => 'required',
            'Nomer_Telepon' => 'required',
            'email' => 'required'
        ]);
        DB::table('data_master_nomer_ketua_koni')->where('id', $r->id)->update([
            'Nama' => $r->Nama,
            'Nomer_Telepon' => $r->Nomer_Telepon,
            'email' => $r->email,

        ]);
        return redirect('/ketuakoni');
    }
    // DELETE data master ketua koni
    public function delete($id)
    {
        DB::table('data_master_nomer_ketua_koni')->where('id', $id)->delete();
        return redirect('/ketuakoni');
    }
    public function cari(Request $request)
    {
        $cari = $request->cari;
        $cabor = DB::table('data_master_nomer_ketua_koni')
            ->where('id', 'like', "%" . $cari . "%")
            ->paginate();
        return view('list_ketuakoni', ['ketuakoni' => $cabor]);
    }
}
///Catatan : Semua Alur ada di routes,jadi sering2 liat di routes