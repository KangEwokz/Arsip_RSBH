<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SatuanModelController;
use App\Http\Controllers\InventoriModelController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KlasifikasiModelController;
use App\Http\Controllers\KelompokModelController;
use App\Http\Controllers\BarangModelController;

//Dashboard
Route::get('/', [DashboardController::class, 'dashboard']);

// Menampilkan semua data jenis
Route::get('/Satuan', [SatuanModelController::class, 'Satuan']);
Route::get('/TambahSatuan', [SatuanModelController::class, 'tambahSatuan']);
Route::get('/AddForm', [SatuanModelController::class, 'addForm']);
Route::post('/SimpanSatuan', [SatuanModelController::class, 'simpanSatuan']);
Route::get('/EditSatuan/{id_Satuan}', [SatuanModelController::class, 'editSatuan']);
Route::post('/UpdateSatuan/{id_Satuan}', [SatuanModelController::class, 'updateSatuan']);
Route::get('/HapusSatuan/{id_Satuan}', [SatuanModelController::class, 'hapusSatuan']);

// Menampilkan semua data inventori
Route::get('/Inventori', [InventoriModelController::class, 'inventori']);
Route::get('/TambahInventori', [InventoriModelController::class, 'tambahInventori']);
Route::post('/SimpanInventori', [InventoriModelController::class, 'simpanInventori']);
Route::get('/EditInventori/{id_inventori}', [InventoriModelController::class, 'editInventori']);
Route::post('/UpdateInventori/{id_inventori}', [InventoriModelController::class, 'updateInventori']);
Route::get('/HapusInventori/{id_inventori}', [InventoriModelController::class, 'hapusInventori']);

// Menampilkan semua data klasifikasi
Route::get('/Klasifikasi', [KlasifikasiModelController::class, 'klasifikasi']);
Route::get('/TambahKlasifikasi', [KlasifikasiModelController::class, 'tambahKlasifikasi']);
Route::post('/SimpanKlasifikasi', [KlasifikasiModelController::class, 'simpanKlasifikasi']);
Route::get('/EditKlasifikasi/{id_klasifikasi}', [KlasifikasiModelController::class, 'editKlasifikasi']);
Route::post('/UpdateKlasifikasi/{id_klasifikasi}', [KlasifikasiModelController::class, 'updateKlasifikasi']);
Route::post('/UpdateKlasifikasi2/{id_klasifikasi}', [KlasifikasiModelController::class, 'updateKlasifikasi']);
Route::get('/HapusKlasifikasi/{id_klasifikasi}', [KlasifikasiModelController::class, 'hapusKlasifikasi']);

// Menampilkan semua data kelompok
Route::get('/Kelompok', [KelompokModelController::class, 'kelompok']);
Route::get('/TambahKelompok', [KelompokModelController::class, 'tambahKelompok']);
Route::post('/SimpanKelompok', [KelompokModelController::class, 'simpanKelompok']);
Route::get('/EditKelompok/{id_kelompok}', [KelompokModelController::class, 'editKelompok']);
Route::post('/UpdateKelompok/{id_kelompok}', [KelompokModelController::class, 'updateKelompok']);
Route::get('/HapusKelompok/{id_kelompok}', [KelompokModelController::class, 'hapusKelompok']);

// Menampilkan semua data barang
Route::get('/Barang', [BarangModelController::class, 'barang']);
Route::get('/TambahBarang', [BarangModelController::class, 'tambahBarang']);
Route::get('/AddForm', [BarangModelController::class, 'addForm']);
Route::post('/SimpanBarang', [BarangModelController::class, 'simpanBarang']);
Route::get('/EditBarang/{id_barang}', [BarangModelController::class, 'editBarang']);
Route::post('/UpdateBarang/{id_barang}', [BarangModelController::class, 'updateBarang']);
Route::get('/HapusBarang/{id_barang}', [BarangModelController::class, 'hapusBarang']);

