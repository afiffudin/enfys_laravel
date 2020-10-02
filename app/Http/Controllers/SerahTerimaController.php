<?php

namespace App\Http\Controllers;

use App\jadwal;
use App\Serah_terima_inventaris;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\DB;

class SerahTerimaController extends Controller
{
    public function index()
    {
        $jadwalData['data'] = jadwal::orderby("Inventaris_mobil", "asc")
            ->get();
        return view('TambahSerah')->with("jadwalData", $jadwalData);
    }
    public function getjadwal($Inventaris_mobilid = 0)
    {
        //fetch jadwal by Inventaris_mobilid
        $empData["data"] = DB::table('serah_terima_inventaris')
            ->join('jadwal', 'jadwal.Tanggal_keberangkatan', '=', 'serah_terima_inventaris.Tanggal_keberangkatan')
            ->select('serah_terima_inventaris.Tanggal_keberangkatan', 'jadwal.Inventaris_mobil')->get();

        return response()->json($empData);
    }

    // CREATE
    public function create(Request $r)
    {
        DB::table('serah_terima_inventaris')->insert([
            'stnk' => $r->stnk,
            'Tanggal_keberangkatan' => $r->Tanggal_keberangkatan,
            'Inventaris_mobil' => $r->Inventaris_mobil,
            'diterima_oleh' => $r->diterima_oleh

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
        return view('/pages/editserahterima', ['serah-terima' => $atlet_u]);
    }
    public function update(Request $r)
    {
        $this->validate($r, [
            'stnk' => 'required',
            'Tanggal_keberangkatan' => 'required',
            'Inventaris_mobil' => 'required',
            'PIC' => 'required',
            'diterima_oleh' => 'required'
        ]);
        DB::table('serah_terima_inventaris')->where('id', $r->id)->update([
            'stnk' => $r->stnk,
            'Tanggal_keberankatan' => $r->Tanggal_keberangkatan,
            'Inventaris_mobil' => $r->Inventaris_mobil,
            'PIC' => $r->PIC
        ]);
        return redirect('/serah-terima');
    }
    // DELETE
    public function delete($id)
    {
        DB::table('serah_terima_inventaris')->where('id', $id)->delete();
        return back();
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;
        $cabor = DB::table('serah_terima_inventaris')
            ->where('id', 'like', "%" . $cari . "%")
            ->paginate();
        return view('TambahSerah', ['cabor' => $cabor]);
    }
}
