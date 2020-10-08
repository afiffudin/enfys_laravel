<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Auth::routes();


Route::get('/', 'HomeController@index');

Auth::routes();
Route::get('/dashboard', 'HomeController@index');
Route::get('/cabor-perkategori', 'HomeController@read');
Route::get('/plot-kendaraan', 'HomeController@read_plotkendaraan');

///Route::get('/dashboard');
Route::group(['/Data-Atlet' => ['web', 'auth', 'roles']], function () {
    Route::group(['/Data-Atlet' => 'Administrator'], function () {
        Route::resource('admin', 'AdminController');
    });
    Route::group(['roles' => 'Pegawai'], function () {
        Route::resource('pegawai', 'PegawaiController');
    });

    Route::group(['roles' => 'User'], function () {
        Route::resource('user', 'UserController');
    });
    Route::get('logout', 'LoginController@logout');

    Route::get('/Data-Status/tambah', function () {
    });
    Route::get('/Data-Status', 'StatusTerakhirController@read');

    Route::post('/Jadwal-Perhari/lihat', function () {
    });
    Route::post('/jadwal-perhari/lihat', 'JadwalPerhariController@');
    //Data Company
    Route::get('/Data-Company/tambah', function () {
    });
    Route::post('/Data-Company/create', 'CompanyController@create');
    Route::get('/Data-Company', 'CompanyController@read');
    Route::post('/Data-Company/add', 'CompanyController@add');
    Route::post('/Data-Company/edit/{id}=update', 'CompanyController@update');
    Route::post('/Data-Company/edit/{id}', 'CompanyController@redirect_update');
    Route::post('/Data-Company/delete/{id}', 'CompanyController@delete');

    ///Data list user
    Route::post('/Data-List-User/create', 'ListUserController@create');
    Route::get('/Data-List-User', 'ListUserController@read');
    Route::get('/Data-List-User/tambah', 'ListUserController@tambah');
    Route::post('/Data-List-User/edit/{id}=update', 'ListUserController@update');
    Route::get('/Data-List-User/edit/{id}', 'ListUserController@redirect_update');
    Route::get('/Data-List-User/delete/{id}', 'ListUserController@delete');

    Route::get('/Data-Atlet/tambah', function () {
        $cabor = DB::table('data_cabor')->get();
        return view('part/TambahAtlet', ['cabor' => $cabor]);
    });
    Route::get('/Data-Atlet/edit', function () {
        $editcabor = DB::table('data_cabor')->get();
        return view('atletedit', ['cabor' => $editcabor]);
    });
    Route::post('/Data-Atlet/create', 'AdminController@create'); //C OK
    Route::get('/Data-Atlet', 'AdminController@read'); //R OK   
    Route::get('/Data-Atlet/add', 'AdminController@add');
    Route::post('/Data-Atlet/edit/{id}=update', 'AdminController@update'); //U OK
    Route::get('/Data-Atlet/edit/{id}', 'AdminController@redirect_update'); //Redirect to Update Page OK
    Route::get('/Data-Atlet/delete/{id}', 'AdminController@delete'); //D OK
    Route::get('/Data-Atlet/cari', 'AdminController@cari');
    ///Route::post('/Data-Atlet/add', 'AdminController@add');
    //return view('atletadd');

    /* SIDEBAR - ADMIN cabor */
    Route::get('/Data-admincabor/tambah', function () {
        $admincabor = DB::table('data_cabor')->get();
        return view('part/TambahAdminCbr', ['cabor' => $admincabor]);
    });
    Route::get('/Data-admincabor/edit', function () {
        $admincabor = DB::table('data_cabor')->get();
        return view('editadmincabor', ['admincabor' => $admincabor]);
    });
    Route::match(['get', 'post'], '/Data-admincabor', 'AdminCaborController@match');
    Route::post('/Data-admincabor/create', 'AdminCaborController@create');
    Route::get('/Data-admincabor', 'AdminCaborController@read'); //R OK  
    Route::post('/Data-admincabor/edit/{id}=update', 'AdminCaborController@update');
    Route::get('/Data-admincabor/edit/{id}', 'AdminCaborController@redirect_update'); //Redirect to Update Page OK
    /* END SIDEBAR - ADMIN cabor */

    /* END SIDEBAR - CABOR */
    Route::get('/Data-cabor/edit', function () {
        $admincabor = DB::table('data_cabor')->get();
        return view('caboredit', ['cabor' => $admincabor]);
    });
    Route::post('/Data-cabor/create', 'CaborController@create'); //C OK
    Route::get('/Data-cabor', 'CaborController@read'); //R OK
    Route::get('/Data-cabor/add', 'CaborController@add');
    Route::post('/Data-cabor/edit/{id_cabor}=update', 'CaborController@update'); //U OK
    Route::get('/Data-cabor/edit/{id_cabor}', 'CaborController@redirect_update'); //Redirect to Update Page OK
    Route::get('/Data-cabor/delete/{id_cabor}', 'CaborController@delete'); //D OK 
    Route::get('/Data-cabor/cari', 'CaborController@cari');

    /* SIDEBAR - KETUA KONI */
    Route::get('/Data-ketuakoni/tambah', function () {
        $ketuakoni = DB::table('data_master_nomer_ketua_koni')->get();
        return view('data_master_nomer_ketua_koni', ['ketuakoni' => $ketuakoni]);
    });
    Route::get('/Data-ketuakoni/edit', function () {
        $ketuakoni = DB::table('data_master_nomer_ketua_koni')->get();
        return view('editketuakoni', ['ketuakoni' => $ketuakoni]);
    });
    route::post('/ketuakoni/create', 'AtletAddkoniController@create');
    Route::get('/ketuakoni', 'AtletAddkoniController@read');
    Route::post('/ketuakoni/edit/{id}=update', 'AtletAddkoniController@update');
    Route::get('/ketuakoni/edit/{id}', 'AtletAddkoniController@redirect_update');
    Route::get('/ketuakoni/delete/{id}', 'AtletAddkoniController@delete');
    Route::get('/ketuakoni/cari', 'AtletAddkoniController@cari');
    //*SIDEBAR PERTDANDINGAN
    Route::post('/jadwal-pertandingan/create', 'PertandinganController@create');
    Route::get('/jadwal-pertandingan', 'PertandinganController@read');
    //* END SIDEBAR PERTANDINGAN
    //*SIDEBAR status terkahir
    Route::get('/lihat-jadwal/editt', function () {
        $edit = DB::table('data_master_atlet')->get();
        return view('pages/editjadwal', ['jadwal' => $edit]);
    });
    Route::get('/lihat-jadwal/add', function () {
        $atlet_u = DB::table('data_master_atlet')->get();
        $cabor_a = DB::table('cabor')->get();
        $pic = DB::table('jadwal')->get();
        return view('pages/addjadwal', ['lihatdata' => $pic, 'atlet' => $atlet_u, 'cabor' => $cabor_a]);
    });
    Route::post('/lihat-jadwal/create', 'JadwalController@create');
    Route::get('/lihat-jadwal', 'JadwalController@read');
    Route::post('/lihat-jadwal/tambah', 'JadwalController@tambah');
    Route::post('/lihat-jadwal/edit/{id}=update', 'JadwalController@update');
    Route::get('/lihat-jadwal/edit/{id}', 'JadwalController@redirect_update');
    Route::get('/lihat-jadwal/delete/{id}', 'JadwalController@delete');
    Route::get('/lihat-jadwal/cari', 'JadwalController@cari');
    //* SIDEBAR SERAH TERIMA    
    Route::get('/serah-terima/create', function () {
        $serah = DB::table('serah_terima_inventaris')->get();
        $pic = DB::table('jadwal')->get();
        return view('TambahSerah', ['lihatdata' => $pic]);
    });
    Route::get('/serah-terima/read', function () {
        $serah = DB::table('serah_terima_inventaris')->get();
        return view('/pages/lihatserah', ['lihatserah' => $serah]);
    });
    route::post('/serah-terima/create', 'SerahTerimaController@create');
    Route::get('/serah-terima', 'SerahTerimaController@read');
    Route::get('/jadwal', 'SerahTerimaController@index');
    Route::get('/serah-terima/fetch', 'SerahTerimaController@fetch')->name('SerahTerima.fetch');
    Route::post('/serah-terima/edit/{id}=update', 'SerahTerimaController@update');
    Route::get('/serah-terima/edit/{id}', 'SerahTerimaController@redirect_update');
    Route::get('/serah-terima/delete/{id}', 'SerahTerimaController@delete');
    Route::get('/serah-terima/cari', 'SerahTerimaController@cari');
    Route::get('/jadwal/{id}', 'SerahTerimaController@getjadwal');
    // *END SIDEBAR
});
//*END SIDEBAR 
//*SIDEBAR status terkahir
Route::post('/status-terakhir/create', 'StatusController@create');
Route::get('/status-terakhir', 'StatusController@read');
//*END SIDEBAR status
