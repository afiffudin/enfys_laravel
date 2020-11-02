<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MonitoringKoniController extends Controller
{
    //function creat data monitoring koni
    public function create(Request $r)
    {
        DB::table('monitoring_koni')->insert([
            'jadwal_keberangkatan_atlit' => $r->jadwal_keberangkatan_atlit,
            'jadwal_kepulangan_atlit' => $r->jadwal_kepulangan_atlit,
            'Emergency' => $r->Emergency,
            'Timeline_keseluruhan_aktifitas_pic_aktifitas' => $r->Timeline_keseluruhan_aktifitas_pic_aktifitas,
            'Jadwal_final' => $r->Jadwal_final,
        ]);
        return redirect('/Data-monitoring');
    }
    //read data Monitoring Koni
    public function read()
    {
        $monitoring_r = DB::table('monitoring')->get();
        return view('monitoring', ['monitoring' => $monitoring_r]);
    }
    public function update(Request $r)
    {
        $this->validate($r, [
            'jadwal_keberangkatan_atlit' => 'required',
            'jadwal_kepulangan_atlit' => 'required',
            'Emergency' => 'required',
            'Timeline_keseluruhan_aktifitas_pic_aktifitas' => 'required',
            'Jadwal_final' => 'required',

        ]);
        DB::table('monitoring')->where('id', $r->id)->update([
            'jadwal_keberangkatan_atlit' => $r->jadwal_keberangkatan_atlit,
            'jadwal_kepulangan_atlit' => $r->jadwal_kepulangan_atlit,
            'Emergency' => $r->Emergency,
            'Timeline_keseluruhan_aktifitas_pic_aktifitas' => $r->Timeline_keseluruhan_aktifitas_pic_aktifitas,
            'Jadwal_final' => $r->Jadwal_final,
        ]);

        return redirect('/Data-monitoring');
    }
    // Delete data monitoring
    public function delete($id)
    {
        DB::table('monitoring')->where('id', $id)->delete();
        return redirect('/Data-monitoring');
    }
}
//Catatan : Semua Alur ada di routes,jadi sering2 liat routes ya.