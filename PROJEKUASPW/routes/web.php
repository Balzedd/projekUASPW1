<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\AcaraController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PesanController;
use App\Models\Acara;

Route::resource('tikets', TiketController::class);

Route::get('/', function () {
     $acara = Acara::where('kategori', 'Esports')
                  ->latest()
                  ->first();

    $acaras = Acara::with('tikets')
                   ->latest()
                   ->get();

    $featured = Acara::withSum(
        ['transaksis' => function ($q) {
            $q->where('status', 'lunas');
        }],
        'jumlah'
    )
    ->orderByDesc('transaksis_sum_jumlah')
    ->first();

    return view('welcome', compact(
        'acara',
        'acaras',
        'featured'
    ));
});



   

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile-user', function () {
        return view('profile.index');
    })->name('profile.user');

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    Route::get('/acara', [AcaraController::class, 'index'])
        ->name('acara.index');

    Route::get('/acara/create', [AcaraController::class, 'create'])
        ->name('acara.create');

    Route::post('/acara/store', [AcaraController::class, 'store'])
        ->name('acara.store');

    Route::get('/acara/edit/{id}', [AcaraController::class, 'edit'])
        ->name('acara.edit');

    Route::put('/acara/update/{id}', [AcaraController::class, 'update'])
        ->name('acara.update');

    Route::delete('/acara/delete/{id}', [AcaraController::class, 'destroy'])
        ->name('acara.destroy');
});

Route::get('/admin/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'checkRole:A'])
    ->name('admin.dashboard');

Route::get('/user/dashboard', function () {

    $acara = Acara::where('kategori', 'Esports')
                  ->latest()
                  ->first();

    $acaras = Acara::with('tikets')
                   ->latest()
                   ->get();

    $featured = Acara::withSum(
        ['transaksis' => function ($q) {
            $q->where('status', 'lunas');
        }],
        'jumlah'
    )
    ->orderByDesc('transaksis_sum_jumlah')
    ->first();

    return view('dashboard', compact(
        'acara',
        'acaras',
        'featured'
    ));

})->middleware(['auth', 'checkRole:U'])
  ->name('user.dashboard');
Route::get('/pelanggan', [PelangganController::class, 'index'])
    ->name('pelanggan.index');

Route::get('/pelanggan/{id}/edit', [PelangganController::class, 'edit'])
    ->name('pelanggan.edit');

Route::get('/pelanggan/{id}/delete', [PelangganController::class, 'destroy'])
    ->name('pelanggan.destroy');

Route::put('/pelanggan/{id}', [PelangganController::class, 'update'])
    ->name('pelanggan.update');


Route::post('/laporan', [LaporanController::class, 'store'])
    ->name('laporan.store');

    Route::get('/laporan', [LaporanController::class, 'index'])
    ->name('laporan.index');

Route::delete('/laporan/{id}', [LaporanController::class, 'destroy'])
    ->name('laporan.destroy');

Route::get('/tiket-saya', [PesanController::class, 'tiketSaya'])
    ->name('tiket-saya');

Route::middleware('auth')->group(function () {

    Route::get('/pesan/{id}', [PesanController::class, 'index'])
        ->name('pesan');

    Route::post('/pesan', [PesanController::class, 'store'])
        ->name('pesan.store');

   Route::get('/tiket-saya', [PesanController::class, 'tiketSaya'])
    ->middleware('auth')
    ->name('tiket-saya');

    Route::get('/detail-pesanan/{id}', [PesanController::class, 'show'])
        ->name('detail-pesanan');
});

Route::post('/pesanan/{id}/accept', [PesanController::class, 'accept'])
    ->name('pesanan.accept');
 
// Daftar pesanan yang perlu di-accept admin (folder: pesanan)
Route::get('/admin/pesanan', [PesanController::class, 'daftarPesanan'])
    ->middleware(['auth', 'checkRole:A'])
    ->name('pesanan.index');
 
// Riwayat transaksi yang sudah lunas — menu navbar baru, sumber data chart dashboard
Route::get('/admin/transaksi', [PesanController::class, 'riwayatTransaksi'])
    ->middleware(['auth', 'checkRole:A'])
    ->name('transaksi.index');
 

    Route::delete('/transaksi/{id}', [PesanController::class, 'riwayatTransaksiDestroy'])
    ->name('transaksi.destroy');
require __DIR__.'/auth.php';