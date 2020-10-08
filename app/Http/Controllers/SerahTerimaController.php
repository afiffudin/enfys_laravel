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
    public function getjadwal(Request $request)
    {
        //fetch jadwal by Inventaris_mobilid
        $data["data"] = DB::table('jadwal')
            ->where('Tanggal_keberangkatan', $request->id)
            ->get();

        return response()->json($data);
    }

    // CREATE
    public function create(Request $r)
    {
        // dd($r->all());
        $jadwal = DB::table('jadwal')->where('id', $r->id)->first();


        DB::table('serah_terima_inventaris')->insert([
            'stnk' => $r->stnk,
            'Tanggal_keberangkatan' => $jadwal->Tanggal_keberangkatan,
            'Inventaris_mobil' => $jadwal->Inventaris_mobil,
            'PIC' => $jadwal->PIC,
            'diterima_oleh' => $r->diterima_oleh

        ]);
        return redirect()->back();
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
        $atlet = DB::table('jadwal')->get();
        return view('.pages.editserahterima', ['lihatserah' => $atlet_u, 'editserah' => $atlet]);
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
            'PIC' => $r->PIC,
            'diterima_oleh' => $r->diterima_oleh
        ]);
        return redirect('/serah-terima');
    }
    // DELETE
    public function delete($id)
    {
        DB::table('serah_terima_inventaris')->where('id', $id)->delete();
        return redirect()->back()->with('message', 'Data Di hapus');
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;
        $cabor = DB::table('serah_terima_inventaris')
            ->where('nama', 'like', "%" . $cari . "%")
            ->paginate();
        return view('TambahSerah', ['cabor' => $cabor]);
    }
}
