<?php
use Illuminate\Support\Facades\Route;

// PWA Offline fallback
Route::get('/offline', function () { return view('offline'); })->name('offline');
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ModulController;
use App\Http\Controllers\Frontend\KuisController;
use App\Http\Controllers\Frontend\SiswaDashboardController;
use App\Http\Controllers\Frontend\ProfilController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KontenController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\KuisController as AdminKuisController;

// ROOT → langsung ke login
Route::get('/', function () {
    if (auth()->check()) {
        return auth()->user()->role === 'admin'
            ? redirect()->route('admin.dashboard')
            : redirect()->route('siswa.dashboard');
    }
    return redirect()->route('login');
})->name('home');

// AUTH
Route::get('/login',     [AuthController::class, 'showLogin'])->name('login');
Route::post('/login',    [AuthController::class, 'login']);
Route::get('/register',  [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout',   [AuthController::class, 'logout'])->name('logout');

// LUPA SANDI
Route::get('/lupa-sandi',    [PasswordResetController::class, 'showForm'])->name('password.request');
Route::post('/lupa-sandi',   [PasswordResetController::class, 'findAccount'])->name('password.find');
Route::post('/reset-sandi',  [PasswordResetController::class, 'updatePassword'])->name('password.update.direct');

// MODUL & KUIS (bisa diakses tanpa login)
Route::get('/modul/{kategori}', [ModulController::class, 'show'])->name('modul.show');
Route::get('/kuis', [KuisController::class, 'index'])->name('kuis.index');
Route::get('/kuis/soal/{level}', [KuisController::class, 'soal'])->name('kuis.soal');
Route::post('/kuis/simpan', [KuisController::class, 'simpan'])->name('kuis.simpan');

// SISWA DASHBOARD
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [SiswaDashboardController::class, 'index'])->name('siswa.dashboard');
    Route::get('/profil', [ProfilController::class, 'index'])->name('siswa.profil');
});

// ADMIN
Route::prefix('admin')->name('admin.')->middleware(['auth','admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('konten', KontenController::class);
    Route::get('siswa', [SiswaController::class, 'index'])->name('siswa.index');
    Route::get('siswa/{user}', [SiswaController::class, 'show'])->name('siswa.show');
    Route::delete('siswa/{user}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
    Route::patch('siswa/{user}/toggle', [SiswaController::class, 'toggleStatus'])->name('siswa.toggle');
    Route::resource('kuis', AdminKuisController::class);
});
