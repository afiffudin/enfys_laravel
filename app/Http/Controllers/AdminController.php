<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use App\Admin;
use Illuminate\Support\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function index()
    {
        return view('pages.admin.index');
    }
    //join data_cabor sama data_master_atlet ngambil id_cabor sama nama_cabor di view/part/tambah_atlet
    public function caborjoin(Request $r)
    {
        $data['data_cabor'] = DB::table('data_cabor')
            ->join('data_master_atlet', 'data_cabor.id_cabor', '=', 'data_master_atlet.id_cabor')
            ->select('data_cabor.*', 'data_master_atlet.id_cabor', 'data_cabor.nama_cabor')
            ->get();
        return view('part.TambahAtlet', ['cabor' => $data]);
    }
    public function create(Request $r)
    {
        $pict = $r->file('foto_ktp');
        $path = public_path('/public/picture/'); ///lokasi file gambar di simpen di public/picture
        $img = rand() . "." . $pict->getClientOriginalExtension();
        $pict->move($path, $img);

        DB::table('users')->insert([
            'id' => $r->id,
            'name' => $r->name,
            'email' => $r->email,
            'password' => Hash::make($r->password),
            'role_id' => $r->role_id
        ]);
        // dd(Hash::make($r->password));
        $cabors = DB::table('data_cabor')->where('id_cabor', $r->id_cabor)->first();
        if (!$cabors) {
        }
        DB::table('data_master_atlet')->insert([
            'id_cabor' => $r->id_cabor,
            'Nama' => $r->nama,
            'Nomer_Telepon' => $r->Nomer_Telepon,
            'Jenis_kelamin' => $r->jenis_kelamin,
            'foto_ktp' => $img,
            'nomer_ktp' => $r->nomer_ktp,
            'Alamat' => $r->alamat,
            'nama_cabor' => $cabors->nama_cabor,
            'email' => $r->email
        ]);
        return redirect('/Data-Atlet');
    }
    //read data master atlet di view atlet
    public function read()
    {
        $atlet_r = DB::table('data_master_atlet')->get();
        return view('atlet', ['atlet' => $atlet_r]);
    }
    // Update data master atlet,data cabor ke view atletedit
    public function redirect_update($id)
    {
        $atlet_u = DB::table('data_master_atlet')->get()->where("id", $id);
        $atlet = DB::table('data_cabor')->get();
        return view('atletedit', ['atlet' => $atlet_u, 'cabor' => $atlet]);
    }
    public function update(Request $r)
    {
        $this->validate($r, [
            'Nama' => 'required',
            'Nomer_Telepon' => 'required',
            'Jenis_kelamin' => 'required',
            'foto_ktp' => 'required',
            'nomer_ktp' => 'required',
            'Alamat' => 'required',
            'nama_cabor' => 'required',
            'email' => 'required'
        ]);
        $pict = $r->file('foto_ktp');
        $path = public_path('/public/picture/'); //lokasi file foto di folder public/picture
        $img = rand() . "." . $pict->getClientOriginalExtension();
        $pict->move($path, $img);
        DB::table('data_master_atlet')->where('id', $r->id)->update([
            'Nama' => $r->Nama,
            'Nomer_Telepon' => $r->Nomer_Telepon,
            'Jenis_kelamin' => $r->Jenis_kelamin,
            'foto_ktp' => $img,
            'nomer_ktp' => $r->nomer_ktp,
            'Alamat' => $r->Alamat,
            'nama_cabor' => $r->nama_cabor,
            'email' => $r->email
        ]);
        return redirect('/Data-Atlet');
    }
    // Delete data master atlet
    public function delete($id)
    {
        DB::table('data_master_atlet')->where('id', $id)->delete();
        return redirect('/Data-Atlet');
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;
        $atlet = DB::table('data_master_atlet')
            ->where('id', 'like', "%" . $cari . "%")
            ->paginate();
        return view('atlet', ['atlet' => $atlet]);
    }
}
///Catatan : Buat Email login Atlet di akun Admin
///Catatan : Login Menggunakan Auth gk pake session
///Catatan : Semua alur ada di routes,jadi harus sering2 liat routes nya