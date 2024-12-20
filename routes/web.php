<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AnnouncementCommentsController;
use App\Http\Controllers\DashboardPembimbingController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return redirect('/dashboard_siswa');
});

Route::post('/dashboard_siswa/pengumuman/addcomment', [AnnouncementCommentsController::class, 'store'])->name('dashboard_siswa.addcomment');
Route::put('/dashboard_siswa/tugas/{id}/submittask', [TaskController::class, 'update'])->name('dashboard_siswa.submittask');

Route::post('/dashboard_siswa/profiles/{id}/edit', [StudentController::class, 'edit'])->name('dashboard_siswa.editprofile');
Route::post('/dashboard_siswa/profiles/create', [StudentController::class, 'create'])->name('dashboard_siswa.createprofile');

