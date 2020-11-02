<?
namespace App;

use Illuminate\Database\Eloquent\Model;
//Catatan : Ini model jadwal buat tanggal keberangakatan sama no inventaris
class Jadwal extends Model
{
protected $fillable = [
    'Tanggal_keberangkatan','Inventaris_mobil'
];
}