<?php

use App\Http\Controllers\BandingkanEvent;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriSarprasController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\PenyelenggaraController;
use App\Http\Controllers\SarprasController;
use App\Http\Controllers\WewenangController;
use App\Models\KategoriSarpras;
use App\Models\Peminjaman;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Penyelenggara
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('dashboardPenyelenggara');
});

// event
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/kelolaEvent', [EventController::class, 'index'])->name('kelolaEvent');
    Route::get('/tambahEvent', [EventController::class, 'create'])->name('tambahEvent');
    Route::post('/kelolaEvent', [EventController::class, 'store'])->name('simpanEvent');
    Route::patch('/kelolaEvent/{event}/edit', [EventController::class, 'update'])->name('updateEvent');
    Route::get('/kelolaEvent/{id}', [EventController::class, 'edit'])->name('editEvent');
    Route::delete('kelolaEvent/{event}/delete', [EventController::class, 'destroy'])->name('hapusEvent');

    Route::get('/pilihSarpras/{id}', [EventController::class, 'pilihSarpras'])->name('pilihSarpras');
    Route::post('/buatPengajuan', [EventController::class, 'buatPengajuan'])->name('buatPengajuan');
});

// admin
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin', [HomeController::class, 'adminHome'])->name('dashboardAdmin');
    Route::get('/admin/penyelenggara', [HomeController::class, 'kelolaPenyelenggara'])->name('kelolaPenyelenggara');
    Route::get('/admin/wewenang', [HomeController::class, 'wewenang'])->name('wewenang');
    Route::get('/admin/kategoriSarana', [HomeController::class, 'kategoriSarana'])->name('kategoriSarana');
    Route::get('/admin/sarana', [HomeController::class, 'kelolaSarana'])->name('kelolaSarpras');
    // Route::get('/admin/pengajuan', [HomeController::class, 'kelolaPengajuan'])->name('pengajuan');
    // Route::get('/admin/peminjaman', [HomeController::class, 'kelolaPeminjaman'])->name('peminjaman');
    // Route::get('/admin/bandingkanEvent', [HomeController::class, 'bandingkanEvent'])->name('bandingkanEvent');
});

// edit user
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//  kelola penyelenggara
Route::middleware('auth')->group(function () {
    // Route::get('/admin/kelolaPenyelenggara', [PenyelenggaraController::class, 'index'])->name('kelolaPenyelenggara');
    Route::get('/admin/tambahPenyelenggara', [PenyelenggaraController::class, 'create'])->name('tambahPenyelenggara');
    Route::post('/admin/kelolaPenyelenggara', [PenyelenggaraController::class, 'store'])->name('simpanPenyelenggara');
    Route::patch('/penyelenggara/{name}/edit', [PenyelenggaraController::class, 'update'])->name('updatePenyelenggara');
    Route::get('/penyelenggara/{id}/', [PenyelenggaraController::class, 'edit'])->name('editPenyelenggara');
    Route::delete('/penyelenggara/{name}/delete', [PenyelenggaraController::class, 'destroy'])->name('hapusPenyelenggara');
});

//  wewenang
Route::middleware('auth')->group(function () {
    // Route::get('/admin/wewenang', [WewenangController::class, 'index'])->name('wewenang');
    Route::get('/admin/tambahWewenang', [WewenangController::class, 'create'])->name('tambahWewenang');
    Route::post('/admin/wewenang', [WewenangController::class, 'store'])->name('simpanWewenang');
    Route::patch('/wewenang/{wewenang}/edit', [WewenangController::class, 'update'])->name('updateWewenang');
    Route::get('/wewenang/{id}/', [WewenangController::class, 'edit'])->name('editWewenang');
    Route::delete('/wewenang/{nama_wewenang}/delete', [WewenangController::class, 'destroy'])->name('hapusWewenang');
});

// kategori Sarpras
Route::middleware('auth')->group(function () {
    // Route::get('/admin/kategoriSarana', [KategoriSarprasController::class, 'index'])->name('kategoriSarana');
    Route::get('/admin/tambahKategori', [KategoriSarprasController::class, 'create'])->name('tambahKategori');
    Route::post('/admin/kategoriSarana', [KategoriSarprasController::class, 'store'])->name('simpanKategori');
    Route::patch('/kategori/{kategori}/edit', [KategoriSarprasController::class, 'update'])->name('updateKategori');
    Route::get('/kategori/{id}/', [KategoriSarprasController::class, 'edit'])->name('editKategori');
    Route::delete('/kategoriSarana/{nama_kategori}/delete', [KategoriSarprasController::class, 'destroy'])->name('hapusKategori');
});

// kelola sarpras
Route::middleware('auth')->group(function () {
    // Route::get('/admin/kelolaSarpras', [SarprasController::class, 'index'])->name('kelolaSarpras');
    Route::get('/admin/tambahSarpras', [SarprasController::class, 'create'])->name('tambahSarpras');
    Route::post('/admin/kelolaSarpras', [SarprasController::class, 'store'])->name('simpanSarpras');
    Route::patch('/kelolaSarpras/{sarpras}/edit', [SarprasController::class, 'update'])->name('updateSarpras');
    Route::get('/kelolaSarpras/{id}', [SarprasController::class, 'edit'])->name('editSarpras');
    Route::delete('/sarpras/{nama_sarpras}/delete', [SarprasController::class, 'destroy'])->name('hapusSarpras');
});

// kelola pengajuan
Route::middleware('auth')->group(function () {
    Route::get('/admin/pengajuan', [PengajuanController::class, 'index'])->name('pengajuan');
    Route::get('/admin/tambahPengajuan', [PengajuanController::class, 'create'])->name('tambahPengajuan');
    Route::delete('/admin/{id}/delete', [PengajuanController::class, 'destroy'])->name('hapusPengajuan');
});

// kelola peminjaman
Route::middleware('auth')->group(function () {
    Route::get('/admin/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman');
    Route::delete('/kelolaPeminjaman/{id}/delete', [PeminjamanController::class, 'destroy'])->name('hapusPeminjaman');
});

//bandingkan event
Route::middleware('auth')->group(function () {
    Route::get('/admin/bandingkanEvent', [BandingkanEvent::class, 'index'])->name('bandingkanEvent');
    Route::post('/admin/bandingkanEvent', [BandingkanEvent::class, 'index'])->name('bandingkanEvent');
    Route::post('/admin/rumus', [BandingkanEvent::class, 'rumus'])->name('rumus');
    // Route::get('/bandingkanEvent/{id}', [BandingkanEvent::class, 'getEventById']);
    // Route::delete('/BandingkanEvent/{id}/delete', [BandingkanEvent::class, 'destroy'])->name('hapusBandingkanEvent');
});



require __DIR__ . '/auth.php';
