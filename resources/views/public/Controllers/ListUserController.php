<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class ListUserController extends Controller
{
    public function create(Request $r)
    // CREATE
    {
        DB::table('users')->insert([
            'role_id' => $r->role_id,
            'name' => $name,
            'username' => $r->username,
            'email' => $r->email,
            'password' => $r->password,
            'level' => $r->level,
            'created_at' => $r->created_at,
            'updated_at' => $r->updated_at

        ]);
        return back();
    }

    // READ
    public function read()
    {
        $user_r = DB::table('users')->get();
        return view('listuser', ['listuser' => $user_r]);
    }
    // UPDATE
    public function redirect_update($id)
    {
        $atlet_u = DB::table('users')->get()->where("id", $id);
        return view('pages/edituser', ['edituser' => $atlet_u]);
    }
    public function update(Request $r)
    {
        $this->validate($r, [
            'role_id' => 'required',
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'level' => 'required',
            'created_at' => 'required',
            'updated_at' => 'required',
        ]);
        DB::table('users')->where('id', $r->id)->update([
            'role_id' => $r->role_id,
            'name' => $r->name,
            'username' => $r->username,
            'email' => $r->email,
            'password' => $r->password,
            'level' => $r->level,
            'created_at' => $r->created_at,
            'updated_at' => $r->updated_at
        ]);
        return redirect('/Data-List-User');
    }
    // DELETE
    public function delete($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return back();
    }
    public function tambah(Request $r)
    {

        DB::table('users')->insert([
            'name' => $r->name,
            'username' => $username,
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
