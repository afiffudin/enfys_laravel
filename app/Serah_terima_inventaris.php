<?php

namespace App;

use App\Http\Controllers\JadwalController;
use Illuminate\Database\Eloquent\Model;

class Serah_terima_inventaris extends Model

{
    protected $fillable = [
        'stnk', 'Tanggal_keberangkatan', 'Inventaris_mobil'
    ];
}
