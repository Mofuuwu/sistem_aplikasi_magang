<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardPembimbingController extends Controller
{
    public function index() {
        return view('filament.dashboard-pembimbing.pages.pembimbing_profil_siswa');
    }
}
