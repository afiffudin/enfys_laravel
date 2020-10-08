<?php

namespace App\Http\Controllers;

use App\atlit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AtletAddkoniController extends Controller
{
    public function create(Request $request)
    {
        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);
        DB::table('data_master_nomer_ketua_koni')->insert([
            'Nama' => $request->Nama,
            'Nomer_Telepon' => $request->Nomer_Telepon
        ]);
        return redirect('/ketuakoni');
    }
    // READ
    public function read()
    {
        $ketua_r = DB::table('data_master_nomer_ketua_koni')->get();
        return view('list_ketuakoni', ['ketuakoni' => $ketua_r]);
    }
    // UPDATE
    public function redirect_update($id)
    {
        $ketua_u = DB::table('data_master_nomer_ketua_koni')->get()->where("id", $id);
        return view('editketuakoni', ['ketuakoni' => $ketua_u]);
    }
    public function update(Request $r)
    {
        $this->validate($r, [
            'Nama' => 'required',
            'Nomer_Telepon' => 'required'
        ]);
        DB::table('data_master_nomer_ketua_koni')->where('id', $r->id)->update([
            'Nama' => $r->Nama,
            'Nomer_Telepon' => $r->Nomer_Telepon
        ]);
        return redirect('/ketuakoni');
    }
    // DELETE
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
