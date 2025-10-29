<?php
use App\Livewire\Auth\Login;
use App\Livewire\Superadmin\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', Login::class)->name('login')->middleware('guest');


Route::middleware(['auth'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::view('superadmin/user', 'superadmin.user.index')->name('superadmin.user.index');
    
    Route::get('/superadmin/user/printpdf', function () {
        $user = App\Models\User::all();
        $namaFile = 'Data User ' . Carbon::now()->translatedFormat('d F Y') . '.pdf';
        $pdf = Pdf::loadView('superadmin.user.printpdf', ['user' => $user])
            ->setPaper('a4', 'portrait');
        return $pdf->download($namaFile);
    })->name('superadmin.user.printpdf');
    Route::get('users/export', [App\Livewire\Superadmin\User\Index::class, 'export'])->name('superadmin.user.printexcel');
    Route::view('superadmin/kategori', 'superadmin.kategori.index')->name('superadmin.kategori.index');
    Route::view('superadmin/barang', 'superadmin.barang.index')->name('superadmin.barang.index');
    Route::view('admin/barang', 'admin.barang.index')->name('admin.barang.index');
});

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('login');
})->name('logout');

