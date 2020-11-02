<?php

namespace App\Http\Controllers;

use App\jadwal;
use App\Serah_terima_inventaris;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\DB;

class SerahTerimaController extends Controller
{
    //index data Inventaris mobil(plat nomer)
    public function index()
    {
        $jadwalData['data'] = jadwal::orderby("Inventaris_mobil", "asc")
            ->get();
        return view('TambahSerah')->with("jadwalData", $jadwalData);
    }
    //function getjadwal ngambil tanggal keberangkatan
    public function getjadwal(Request $request)
    {
        //fetch jadwal by tgl_keberangkatan
        $data["data"] = DB::table('jadwal')
            ->where('Tanggal_keberangkatan', $request->id)
            ->get();

        return response()->json($data);
    }

    // Create data serah terima inventaris
    public function create(Request $r)
    {
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
    // Read Data Serah Terima ke view Tambah Serah
    public function read()
    {
        $jadwal_r = DB::table('serah_terima_inventaris')->get();
        return view('TambahSerah', ['jadwal' => $jadwal_r]);
    }
    // UPDATE table serah_terima_inventaris dan tabel jadwal ke view pages/editserahterima
    public function redirect_update($id)
    {
        $atlet_u = DB::table('serah_terima_inventaris')->get()->where("id", "PIC", $id);
        $atlet = DB::table('jadwal')->get();
        return view('pages.editserahterima', ['lihatserah' => $atlet_u, 'editserah' => $atlet]);
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
    // Delete Serah terima inventaris
    public function delete($id)
    {
        DB::table('serah_terima_inventaris')->where('id', $id)->delete();
        return redirect()->back()->with('message', 'Data Di hapus');
    }
    //cari id dan nama serah terima
    public function cari(Request $request)
    {
        $cari = $request->cari;
        $cabor = DB::table('serah_terima_inventaris')
            ->where('nama', 'like', "%" . $cari . "%")
            ->paginate();
        return view('TambahSerah', ['cabor' => $cabor]);
    }
}
//Catatan : Semua alur ada di routes,jadi sering2 liat di routes ya