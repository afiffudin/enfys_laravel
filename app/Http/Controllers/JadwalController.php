<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalController extends Controller
{
    // CREATE
    public function create(Request $r)
    {
        $cabor_c = DB::table('jadwal')->insert([
            'PIC' => $r->PIC,
            'list_atlit' => $r->list_atlit,
            'Tiket_Pesawat' => $r->Tiket_Pesawat,
            'Tanggal_keberangkatan' => $r->Tanggal_keberangkatan,
            'Tanggal_kepulangan' => $r->Tanggal_kepulangan,
            'Penginapan' => $r->Penginapan,
            'Tempat_Pertandingan' => $r->Tempat_Pertandingan,
            'Inventaris_mobil' => $r->Inventaris_mobil

        ]);
        return back();
    }
    // READ
    public function read()
    {
        $jadwal_r = DB::table('jadwal')->get();
        return view('lihatjadwal', ['lihatjadwal' => $jadwal_r]);
    }
    // UPDATE
    public function redirect_update($id)
    {
        $atlet_u = DB::table('jadwal')->get()->where("id", $id);
        return view('pages/editjadwal', ['lihatjadwal' => $atlet_u]);
    }
    public function update(Request $r)
    {
        $this->validate($r, [
            'PIC' => 'required',
            'list_atlit' => 'required',
            'Tiket_Pesawat' => 'required',
            'Tanggal_keberangkatan' => 'required',
            'Tanggal_kepulangan' => 'required',
            'Penginapan' => 'required',
            'Tempat_Pertandingan' => 'required',
            'Inventaris_mobil' => 'required'


        ]);
        DB::table('jadwal')->where('id', $r->id)->update([
            'PIC' => $r->PIC,
            'list_atlit' => $r->list_atlit,
            'Tiket_Pesawat' => $r->Tiket_Pesawat,
            'Tanggal_keberangkatan' => $r->Tanggal_keberangkatan,
            'Tanggal_kepulangan' => $r->Tanggal_kepulangan,
            'Penginapan' => $r->Penginapan,
            'Tempat_Pertandingan' => $r->Tempat_Pertandingan,
            'Inventaris_mobil' => $r->Inventaris_mobil
        ]);
        return redirect('/jadwal-pertandingan');
    }
    // DELETE
    public function delete($id)
    {
        DB::table('jadwal')->where('id', $id)->delete();
        return redirect('/lihat-jadwal');
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
