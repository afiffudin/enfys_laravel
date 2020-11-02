<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//buat data login admin baru
class LoginAdminController extends Controller
{
    public function create(Request $r)
    {
        DB::table('users')->insert([
            'id' => $r->id,
            'name' => $r->name,
            'email' => $r->email,
            'password' => Hash::make($r->password),
            'role_id' => $r->role_id
        ]);
        // dd(Hash::make($r->password));
    }
}
///Catatan : Semua Alur ada di Routes,Jadi sering2 liat routes ya