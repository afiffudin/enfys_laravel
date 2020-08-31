<?php

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

Route::get('/', function () {
    return view('dashboard');
});

Route::post('/herxpanel/login', 'PanelLoginController@AuthCheck');
// Route::get('/kedua', function () {
//     Route::get('/atlet/atlet', 'data_master_atlet_controller@atlet');
// });

/* SIDEBAR - ADMIN */
Route::get('/Data-Atlet/tambah', function () {
    $cabor = DB::table('cabor')->get();
    return view('part/TambahAtlet', ['cabor' => $cabor]);
});
Route::get('/Data-Atlet/edit', function () {
    $editcabor = DB::table('cabor')->get();
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
    $admincabor = DB::table('cabor')->get();
    return view('part/TambahAdminCbr', ['cabor' => $admincabor]);
});
Route::get('/Data-admincabor/edit', function () {
    $admincabor = DB::table('cabor')->get();
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
    $admincabor = DB::table('cabor')->get();
    return view('caboredit', ['cabor' => $admincabor]);
});
Route::post('/Data-cabor/create', 'CaborController@create'); //C OK
Route::get('/Data-cabor', 'CaborController@read'); //R OK
Route::get('/Data-cabor/add', 'CaborController@add');
Route::post('/Data-cabor/edit/{id}=update', 'CaborController@update'); //U OK
Route::get('/Data-cabor/edit/{id}', 'CaborController@redirect_update'); //Redirect to Update Page OK
Route::get('/Data-cabor/delete/{id}', 'CaborController@delete'); //D OK
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
Route::get('/lihat-jadwal', 'JadwalController@read');
Route::get('/lihat-jadwal/edit/{id}=update', 'JadwalController@update');
Route::get('/lihat-jadwal/edit/{id}', 'JadwalController@redirect_update');
Route::get('/lihat-jadwal/delete/{id}', 'JadwalController@delete');
Route::get('/lihat-jadwal/cari', 'JadwalController@cari');
//* SIDEBAR SERAH TERIMA    
Route::get('/serah-terima/read', function () {
    $serah = DB::table('jadwal')->get();
    return view('TambahSerah', ['jadwal' => $serah]);
});
route::post('/serah-terima/create', 'SerahTerimaController@create');
Route::get('/serah-terima', 'SerahTerimaController@read');
Route::post('/serah-terima/edit/{id}=update', 'SerahTerimaController@update');
Route::get('/serah-terima/edit/{id}', 'SerahTerimaControler@redirect_update');
Route::get('/serah-terima/delete/{id}', 'SerahTerimaController@delete');
Route::get('/serah-terima/cari', 'SerahTerimaController@cari');
// *END SIDEBAR

//*END SIDEBAR 
//*SIDEBAR status terkahir
Route::post('/status-terakhir/create', 'StatusController@create');
Route::get('/status-terakhir', 'StatusController@read');
//*END SIDEBAR status
Route::get('/keempat', function () {
    return view('monitoring_koni');
});
Route::get('/edit', function () {
    return view('edit');
});

Auth::routes();

Route::get('/AuthCheck', 'LoginController@index')->name('AuthCheck');
