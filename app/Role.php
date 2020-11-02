<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//catatan : Ini model Role buat ngambil nama
class Role extends Model
{
    protected $table = 'role';

    protected $fillable = ['nama'];
}
