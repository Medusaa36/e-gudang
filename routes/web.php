<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login ');
});

Route::view('auth/login','auth.login')-> name('auth.login');

Route::view('superadmin/user','superadmin.user.index')-> name('superadmin.user.index');

Route::view('superadmin/kategori','superadmin.kategori.index')-> name('superadmin.kategori.index');

Route::view('superadmin/barang','superadmin.barang.index')-> name('superadmin.barang.index');

Route::view('admin/barang','admin.barang.index')-> name('admin.barang.index');