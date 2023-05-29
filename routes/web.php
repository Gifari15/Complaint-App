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

Route::get('/', function () {
    return view('index');
});

//ROUTE UNTUK LEVEL ADMIN
//-- MENU HOME --
Route::get('/admin','AdminController@index');
Route::post('/login','AdminController@login');
Route::post('/regis','AdminController@regis');
Route::get('/admin/masyarakat','AdminController@masyarakat');
Route::get('/admin/tanggapan','AdminController@tanggapan');
Route::get('/admin/pengaduan','AdminController@pengaduan');
Route::get('/admin/pengaduan/detail/{idpengajuan}','AdminController@detail');
Route::post('/admin/tambahpetugas', 'AdminController@addptgs'); // TAMBAH PETUGAS
Route::get('/admin/delpetugas/{id_petugas}','AdminController@delpetugas'); //DELETE PETUGAS
Route::post('/admin/updatepetugas','AdminController@updatepetugas'); // UPDATE PETUGAS
Route::get('/admin/delpengaduan/{idpengaduan}','AdminController@delpengaduan');

//-- MENU MASYARAKAT --
Route::put('/admin/updatemasyarakat/{nik}','AdminController@updatemsyrkt'); // UPDATE MASYARAKAT
Route::get('/admin/delmasyarakat/{nik}','AdminController@delmsyrkt'); //DELETE MASYARAKAT

//-- MENU TANGGAPAN --
Route::post('/admin/tanggapan/add', 'AdminController@addtanggapan');
Route::put('/admin/updatetanggapan','AdminController@updatetgp'); // UPDATE TANGGAPAN
Route::get('/admin/deltanggapan/{id_tanggapan}','AdminController@deltgp'); //DELETE TANGGAPAN
Route::get('/admin/tanggapan/cetak_pdf', 'AdminController@cetak_pdf');

//-- LOGOUT --
Route::get('/admin/logout','AdminController@logout');
Route::get('/petugas/logout','PetugasController@logout');
Route::get('/masyarakat/logout','MasyarakatController@logout');

//ROUTE UNTUK LEVEL PETUGAS
Route::get('/petugas','PetugasController@index');
Route::get('/petugas/masyarakat','PetugasController@masyarakat');
Route::get('/petugas/pengaduan','PetugasController@pengaduan');
Route::get('/petugas/pengaduan/detail/{idpengajuan}','PetugasController@detail');
Route::get('/petugas/tanggapan','PetugasController@tanggapan');
Route::put('/petugas/updatemasyarakat/{nik}','PetugasController@updatemsyrkt'); // UPDATE MASYARAKAT
Route::put('/petugas/updatetanggapan','PetugasController@updatetgp');
Route::get('/petugas/tanggapan/cetak_pdf', 'PetugasController@cetak_pdf');
Route::get('/petugas/delmasyarakat/{nik}','PetugasController@delmsyrkt'); //DELETE MASYARAKAT
Route::get('/petugas/deltanggapan/{id_tanggapan}','PetugasController@deltgp'); //DELETE TANGGAPAN
Route::post('/petugas/change','PetugasController@changepw');
Route::get('/petugas/delpengaduan/{idpengaduan}','PetugasController@delpengaduan');


//ROUTE UNTUK MASYARAKAT
Route::get('/masyarakat','MasyarakatController@index'); //DELETE TANGGAPAN
Route::get('/masyarakat/pengaduan','MasyarakatController@pengaduan');
Route::get('/masyarakat/history','MasyarakatController@history');
Route::post('/masyarakat/add', 'MasyarakatController@tambah');
Route::post('/masyarakat/changepw','MasyarakatController@changepw');
Route::get('/masyarakat/delpengaduan/{idpengaduan}','MasyarakatController@delpengaduan'); //DELETE PETUGAS
Route::get('/masyarakat/pengaduan/detail/{idpengajuan}','MasyarakatController@detail');

// Route::get('/', 'LoginController@index');
