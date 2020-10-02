<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class JadwalController extends Controller
{
    public function create(Request $r)
    // CREATE
    {
        $pict = $r->file('Tiket_Pesawat');
        $path = public_path('/public/foto/');
        $img = rand() . "." . $pict->getClientOriginalExtension();
        $pict->move($path, $img);
        DB::table('jadwal')->insert([
            'id_inventaris' => $r->id_inventaris,
            'Nama' => $r->Nama,
            'Tiket_Pesawat' => $img,
            'Tanggal_keberangkatan' => $r->Tanggal_keberangkatan,
            'Tanggal_kepulangan' => $r->Tanggal_kepulangan,
            'Penginapan' => $r->Penginapan,
            'no_kamar' => $r->no_kamar,
            'no_booking' => $r->no_booking,
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
    public function redirect_update($id_jadwal)
    {
        $atlet_u = DB::table('jadwal')->get()->where("id_jadwal", $id_jadwal);
        $atlet = DB::table('data_master_atlet')->get();
        return view('pages/editjadwal', ['lihatjadwal' => $atlet_u, 'atlet' => $atlet]);
    }
    public function update(Request $r)
    {
        $this->validate($r, [
            'PIC' => 'required',
            'Nama' => 'required',
            'Tiket_Pesawat' => 'required',
            'Tanggal_keberangkatan' => 'required',
            'Tanggal_kepulangan' => 'required',
            'Penginapan' => 'required',
            'no_kamar' => 'required',
            'no_booking' => 'required',
            'Tempat_Pertandingan' => 'required',
            'Inventaris_mobil' => 'required'
        ]);
        $pict = $r->file('Tiket_Pesawat');
        $path = public_path('/public/foto/');
        $img = rand() . "." . $pict->getClientOriginalExtension();
        $pict->move($path, $img);
        DB::table('jadwal')->where('id', $r->id)->update([
            'PIC' => $r->PIC,
            'Nama' => $r->Nama,
            'Tiket_Pesawat' => $img,
            'Tanggal_keberangkatan' => $r->Tanggal_keberangkatan,
            'Tanggal_kepulangan' => $r->Tanggal_kepulangan,
            'Penginapan' => $r->Penginapan,
            'no_kamar' => $r->no_kamar,
            'no_booking' => $r->no_booking,
            'Tempat_Pertandingan' => $r->Tempat_Pertandingan,
            'Inventaris_mobil' => $r->Inventaris_mobil


        ]);
        return redirect('/lihat-jadwal');
    }
    // DELETE
    public function delete($id_jadwal)
    {
        DB::table('jadwal')->where('id_jadwal', $id_jadwal)->delete();
        return redirect('/lihat-jadwal');
    }
    public function tambah(Request $r)
    {
        $pict = $r->file('Tiket_Pesawat');
        $path = public_path('/public/foto/');
        $img = rand() . "." . $pict->getClientOriginalExtension();
        $pict->move($path, $img);
        DB::table('jadwal')->insert([
            'Nama' => $r->Nama,
            'Tiket_Pesawat' => $img,
            'no_kamar' => $r->no_kamar,
            'no_booking' => $r->no_booking
        ]);
        return redirect('/lihat-jadwal');
    }


    public function cari(Request $request)
    {
        $cari = $request->cari;
        $cabor = DB::table('jadwal')
            ->where('id', 'like', "%" . $cari . "%")
            ->paginate();
        return view('lihatjadwal', ['jadwal' => $cabor]);
    }
}
