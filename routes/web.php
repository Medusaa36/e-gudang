<?php
use App\Livewire\Auth\Login;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', Login::class)->name('login')->middleware('guest');


// halaman setelah login
Route::middleware(['auth'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::view('superadmin/user', 'superadmin.user.index')->name('superadmin.user.index');
    Route::view('superadmin/kategori', 'superadmin.kategori.index')->name('superadmin.kategori.index');
    Route::view('superadmin/barang', 'superadmin.barang.index')->name('superadmin.barang.index');
    Route::view('admin/barang', 'admin.barang.index')->name('admin.barang.index');
});

// logout
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('login');
})->name('logout');
