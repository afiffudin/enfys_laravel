<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        return view('atlet');
    }
    public function upload(Request $request)
    {
        if ($request->hashfile('image')) {
            $resorce = $request->file('image');
            $name   = $resorce->getClientOriginalName();
            $resorce->move(\base_path() . "/public/images", $name);
            $save = DB::table('data_master_atlet')->insert(['image' => $name]);
            echo "Gambar Berhasil Di upload";
        } else {
            echo "Gagal Di upload";
        }
    }
}
