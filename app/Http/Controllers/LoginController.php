<?php

namespace App\Http\Controller;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function AuthCheck(Request $request)
    {
        $this->validate(
            $request,

            ['username' => 'required'],

            ['password' => 'required']

        );

        $user = $request->input('username');
        $pass = $request->input('password');

        $users = DB::table('admin')->where(['username' => $user])->first();

        if (count($users) == 0) {

            return redirect('/herxpanel')->with('failed', 'Login gagal');
        } else
               
                if ($users->username == $user and Hash::check($pass, $users->password)) {

            Session::put('login', 'Selamat anda berhasil login');
            return redirect('/herxpanel');
        } else {

            return redirect('/herxpanel')->with('failed', 'Login gagal');
        }
    }
}
