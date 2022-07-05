<?php

use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LoginControllert;
use App\Http\Controllers\RegisController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\PemesanController;
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
    return view('welcome');
});
Route::get('/login',[LoginControllert::class,'login'])->name('login');
Route::post("/login",[LoginControllert::class,"postLogin"])->name("postlogin");
Route::get('/register',[RegisController::class,'register'])->name('register');
Route::post('/register',[RegisController::class,'postregister'])->name('postregister');
Route::get('/logout',[LoginControllert::class,'logout'])->name('logout');


Route::group(['middleware'=>['auth','cekrole:admin,pegawai']], function(){
    //bagian Create Data
    Route::get('/home',[HomeController::class,'HalamaUtama'])->name('home');
    Route::get('/barang',[BarangController::class,'HalamanBarang'])->name('barang');
    Route::get('/exportpdf',[BarangController::class,'ExportPDF'])->name('ExportPDF');
    Route::get('/barang/create',[BarangController::class,'HalamanTambahBarang'])->name('tambahbarang');
    Route::post('/barang/create',[BarangController::class,'postHalamanBarang'])->name('postbarang');
    Route::get('/pegawai',[PegawaiController::class,'halamanpegawai'])->name('pegawai');
    Route::get('/exportpdfpegawai',[PegawaiController::class,'ExportPDFpegawai'])->name('exportpdfpegawai');
    Route::get('/pegawai/create',[PegawaiController::class,'halamantambahpegawai'])->name('tambahpegawai');
    Route::post('pegawai/create',[PegawaiController::class,'tambahdatapegawai'])->name('tambahdatapegawai');
    Route::get('/barangkeluar',[BarangKeluarController::class,'halamanbarangkeluar'])->name('barangkeluar');
    Route::get('/exportpdfbarangkeluar',[BarangKeluarController::class,'ExportPDFbarangkeluar'])->name('exportpdfbarangkeluar');
    Route::get('/barangkeluar/create',[BarangKeluarController::class,'halamantambahkeluar'])->name('createkeluar');
    Route::post('/barangkeluar/create',[BarangKeluarController::class,'postkeluarbarang'])->name('postbarangkeluar');
    //bagian pemesan
    Route::get('/tampil/pemesan',[PemesanController::class,'tampilhalaman'])->name('tampil');
    Route::get('/tampil/transaksi',[PemesanController::class,'tampiltransaksi'])->name('tambahtransaksi');
    Route::post('/create/pemesan',[PemesanController::class,'createpemesan'])->name('postpemesan');
    Route::get('/tampil/transaksi2',[PemesanController::class,'tampiltransaksi2'])->name('createtransaksi');
    Route::post('/create/transaksi',[PemesanController::class,'createtransaksi'])->name('posttransaksi');
    Route::get('/exportpdffaktur',[PemesanController::class,'exportpdffaktur'])->name('exportpdffaktur');
    //bagian edit data pemesan
    Route::get('/tampildatapemesan/{id}',[PemesanController::class,'tampildatapemesan'])->name('tampildatapemesan');
    Route::post('/updatedatapemesan/{id}',[PemesanController::class,'updatedatapemesan'])->name('updatedatapemesan');
    //bagian edit data transaksi
    Route::get('/tampildatatransaksi/{id}',[PemesanController::class,'tampildatatransaksi'])->name('tampildatatransaksi');
    Route::post('/updatedatastatus/{id}',[PemesanController::class,'updatedatastatus'])->name('updatedatastatus');
    //bagian Delete data
    Route::get('/deletedatatransaksi/{id}',[PemesanController::class,'deletedatatransaksi'])->name('deletedatatransaksi');
    //bagian Edit Data Barang
    Route::get('/tampildatabarang/{id}',[BarangController::class,'tampilkandata'])->name('tampilknadata');
    Route::post('/updatedatabarang/{id}',[BarangController::class,'updatedata'])->name('updatedata');
    //bagian Edit Data Pegawai
    Route::get('/tampildatapegawai/{id}',[PegawaiController::class,'tampilkandatapegawai'])->name('tampilkandatapegawai');
    Route::post('/updatedatapegawai/{id}',[PegawaiController::class,'updatedatapegawai'])->name('updatedatapegawai');
    //bagian Delete Data
    Route::get('/deletedatabarang/{id}',[BarangController::class,'deletedata'])->name('deletedata');
    //bagian Delete Pegawai
    Route::get('/deletedatapegawai/{id}',[PegawaiController::class,'deletedatapegawai'])->name('deletedatapegawai');

    Route::get('/barangkeluar/{id}',[BarangKeluarController::class,'tampilbarangkeluar'])->name('ambilbarangkeluar');
    Route::post('/ambilbarangkeluar/{id}',[BarangKeluarController::class,'ambilbarangkeluar'])->name('ambilbarangkeluar');
});

