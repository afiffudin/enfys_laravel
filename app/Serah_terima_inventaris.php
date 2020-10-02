<?php

namespace App;

use App\Http\Controllers\JadwalController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Serah_terima_inventaris extends Model

{
    protected $fillable = [
        'Tanggal_keberangkatan', 'Inventaris_mobil'
    ];
}
