<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PertandinganController extends Controller
{
    // Create data master Atlet
    public function create(Request $r)
    {
        $pict = $r->file('Tiket_Pesawat');
        $path = public_path('/public/foto/'); //lokasi file foto di folder public/foto
        $img = rand() . "." . $pict->getClientOriginalExtension();
        $pict->move($path, $img);
        $cabors = DB::table('data_master_atlet')->where('id_cabor', $r->id_cabor)->first();
        if (!$cabors) {
        }
        DB::table('jadwal')->insert([
            'id' => $r->id,
            'id_cabor' => $r->id_cabor,
            'PIC' => $r->PIC,
            'Nama' => $cabors->Nama,
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
        // dd($r);
    }
    /// function store jadwam buat inventaris mobil sama tanggal_keberangkatan
    public function store(Request $request)
    {
        $validator =  Validator::make($r->all(), [
            'Inventaris_mobil' => 'required|unique:pertandingan|max:15',
            'Tanggal_keberangkatan' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('/jadwal-pertandingan')
                ->withErrors($validator)
                ->withInput();
        }
    }
    // Read data jadwal,data_master_atlet,data_cabor ke view jadwal
    public function read()
    {
        $jadwal_r = DB::table('jadwal')->get();
        $atlet_u = DB::table('data_master_atlet')->get();
        $cabor = DB::table('data_cabor')->get();
        return view('jadwal', ['jadwal' => $jadwal_r, 'atlet' => $atlet_u, 'cabor' => $cabor]);
    }
    // Update Data Cabor ke view cabor
    public function redirect_update($id)
    {
        $atlet_u = DB::table('data_cabor')->get()->where("id", $id);
        return view('cabor', ['cabor' => $atlet_u]);
    }
    public function update(Request $r)
    {
        $this->validate($r, [
            'PIC' => 'required',
            'atlit' => 'required',
            'Tiket_Pesawat' => 'required',
            'Tanggal_keberangkatan' => 'required',
            'Tanggal_kepulangan' => 'required',
            'Penginapan' => 'required',
            'No_kamar' => 'required',
            'No_booking' => 'required',
            'Tempat_Pertandingan' => 'required',
            'Inventaris_mobil' => 'required'
        ]);
        DB::table('jadwal')->where('id', $r->id)->update([
            'PIC' => $r->PIC,
            'atlit' => $r->atlit,
            'Tiket_Pesawat' => $r->Tiket_Pesawat,
            'Tanggal_keberangkatan' => $r->Tanggal_keberangkatan,
            'Tanggal_kepulangan' => $r->Tanggal_kepulangan,
            'Penginapan' => $r->Penginapan,
            'No_kamar' => $r->No_kamar,
            'No_booking' => $r->No_booking,
            'Tempat_Pertandingan' => $r->Tempat_Pertandingan,
            'Inventaris_mobil' => $r->Inventaris_mobil
        ]);
        return redirect('/jadwal-pertandingan');
    }
    // Delete Data Jadwal
    public function delete($id)
    {
        DB::table('jadwal')->where('id', $id)->delete();
        return redirect('/jadwal-pertandingan');
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;
        $cabor = DB::table('data_cabor')
            ->where('id', 'like', "%" . $cari . "%")
            ->paginate();
        return view('cabor', ['cabor' => $cabor]);
    }
}
//Catatan : Ini Atlit udah input/punya cabor yg di pilih sblm nya di Add New Atlet
//Catatan : Semua alur ada di routes,jadi sering2 liar routes ya