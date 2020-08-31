<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SerahTerimaController extends Controller
{
    public function myform()
    {
        $pic = DB::table('jadwal')->pluck("PIC", "id")->all();
        return view('editketuakoni', compact('jadwal'));
    }
    public function selectajax(Request $request)
    {
        if ($request->ajax()) {
            $pic = DB::table('jadwal')->where('id', $request->id)->pluck("PIC", "id")->all();
            $data = view('editketuakoni', compact('jadwal'))->render();
            return response()->json(['options' => $data]);
        }
    }
    // CREATE
    public function create(Request $r)
    {
        $cabor_c = DB::table('serah_terima_inventaris')->insert([
            'stnk' => $r->stnk,
            'Inventaris_mobil' => $r->Inventaris_mobil,
            'Inventaris_mobil' => $r->Inventaris_mobil,
            'PIC' => $r->PIC
        ]);
        return back();
    }
    // READ
    public function read()
    {
        $jadwal_r = DB::table('serah_terima_inventaris')->get();
        return view('TambahSerah', ['jadwal' => $jadwal_r]);
    }
    // UPDATE
    public function redirect_update($id)
    {
        $atlet_u = DB::table('serah_terima_inventaris')->get()->where("id", "PIC", $id);
        return view('TambahSerah', ['serah-terima' => $atlet_u]);
    }
    public function update(Request $r)
    {
        $this->validate($r, [
            'stnk' => 'required',
            'Inventaris_mobil' => 'required',
            'PIC' => 'required'


        ]);
        DB::table('serah_terima_inventaris')->where('id', $r->id)->update([
            'stnk' => $r->stnk,
            'Inventaris_mobil' => $r->Inventaris_mobil,
            'PIC' => $r->PIC
        ]);
        return redirect('/serah-terima');
    }
    // DELETE
    public function delete($id)
    {
        DB::table('serah_terima_inventaris')->where('id', $id)->delete();
        return redirect('/serah-terima');
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;
        $cabor = DB::table('serah_terima_inventaris')
            ->where('id', 'like', "%" . $cari . "%")
            ->paginate();
        return view('cabor', ['cabor' => $cabor]);
    }
}
