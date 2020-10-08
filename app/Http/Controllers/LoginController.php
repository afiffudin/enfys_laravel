<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    /**
     * Get the needed authorization credentials from the request.
     *  
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    function authenticated(Request $request, $user)
    {
        $user->update([
            'last_login_at' => Carbon::now()->toDateTimeString(),
            'last_login_ip' => $request->getClientIp()
        ]);
    }
    protected function credentials(Request $request)
    {
        dd(Hash::make($password));
        $field = filter_var($request->get($this->email()), FILTER_VALIDATE_EMAIL)
            ? $this->email()
            : 'email';

        return [
            $field => $request->get($this->email()),
            'password' => $request->password,
        ];
    }

    public function index()
    {

        return view('auth.login');
    }

    public function loginProses(Request $request)
    {

        // dd($request->all());
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                \Session::put('email', $request->email);
                \Session::put('level', $user->level);
                return redirect('/dashboard');
            }
        } else {
            return redirect()->back()->with('message', 'Email salah');
        }
    }

    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect('/login');
    }
}
