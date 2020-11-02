<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    ///Catatan : Ini model user pas login   
    protected $table = "users";
    protected $fillable = [
        'name', 'email', 'password', 'last_login_at', 'last_login_ip'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    ///Catatan : Ini model Role 
    public function role()
    {
        return $this->belongsTo('App\Role', 'role_id');
    }
    //ini model hash role
    public function hasRole($roles)
    {
        $this->have_role = $this->getUserRole();

        if (is_array($roles)) {
            foreach ($roles as $need_role) {
                if ($this->cekUserRole($need_role)) {
                    return true;
                }
            }
        } else {
            return $this->cekUserRole($roles);
        }
        return false;
    }
    private function getUserRole()
    {
        return $this->role()->getResults();
    }
    //Ini model cek user role pada saat login
    private function cekUserRole($role)
    {
        return (strtolower($role) == strtolower($this->have_role->nama)) ? true : false;
    }
    //ini model update account di table user
    public function updateAccount()
    {
        $id = Auth::user()->id;
        $user = Auth::user();
        $user->name = Request::input('name');
        $user->email = Request::input('email');
        $user->save();
        return view('Admin.updateprofile');
    }
}
