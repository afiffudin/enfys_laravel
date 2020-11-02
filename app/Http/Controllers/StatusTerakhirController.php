<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\DB;

class StatusTerakhirController extends Controller
{
    public function read()
    {
        $Status_terakhir = DB::table('users')->get();
        return view('.pages.StatusTerakhir', ['Status' => $Status_terakhir]);
    }
}
//Catatan : Semua Alur ada di routes,jadi sering2 liat di routes ya.