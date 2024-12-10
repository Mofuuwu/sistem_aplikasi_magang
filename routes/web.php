<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AnnouncementCommentsController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return redirect('/dashboard_siswa');
});

Route::post('/dashboard_siswa/pengumuman/addcomment', [AnnouncementCommentsController::class, 'store'])->name('dashboard_siswa.addcomment');

