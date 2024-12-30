<?php

namespace App\Http\Controllers;

class DashboardPembimbingController extends Controller
{
    public function index() {
        return view('filament.dashboard-pembimbing.pages.pembimbing_profil_siswa');
    }
}
