<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class JadwalController extends Controller
{
    public function create(Request $r)
    // CREATE data jadwal sama ambil id cabor di tabel master atlet 
    {
        $pict = $r->file('Tiket_Pesawat');
        $path = public_path('/public/foto/');
        $img = rand() . "." . $pict->getClientOriginalExtension();
        $pict->move($path, $img);
        $cabors = DB::table('data_master_atlet')->where('id_cabor', $r->id_cabor)->first();
        if (!$cabors) {
        }
        DB::table('jadwal')->insert([
            'id' => $r->id,
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
    // READ data jadwal ke view lihatjadwal     
    public function read()
    {
        $jadwal_r = DB::table('jadwal')->get();
        return view('lihatjadwal', ['lihatjadwal' => $jadwal_r]);
    }
    // update jadwal dan data_master_atlet  ke view pages/editjadwal
    public function redirect_update($id)
    {
        $atlet_u = DB::table('jadwal')->get()->where("id", $id);
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
        $path = public_path('/public/foto/'); //lokasi update foto Tiket_Pesawat di folder public/foto
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
    // DELETE Data jadwal
    public function delete($id)
    {
        DB::table('jadwal')->where('id', $id)->delete();
        return back();
    }
    //Tambah Data Jadwal 
    public function tambah(Request $r)
    {
        $pict = $r->file('Tiket_Pesawat');
        $path = public_path('/public/foto/'); //lokasi file foto di public/foto
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
    ///cari id di tabel jadwal
    public function cari(Request $request)
    {
        $cari = $request->cari;
        $cabor = DB::table('jadwal')
            ->where('id', 'like', "%" . $cari . "%")
            ->paginate();
        return view('lihatjadwal', ['jadwal' => $cabor]);
    }
}
//Catatan : Semua alur main di Routes,jadi kalau mau liat alur di routes.