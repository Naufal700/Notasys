<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        // Ambil data user
        $user = auth()->user();

        // Total klien
        $totalKlien = \App\Models\Master\Klien::count();

        // Klien baru hari ini
        $klienHariIni = \App\Models\Master\Klien::whereDate('created_at', today())->count();

        // Ambil 10 log aktivitas terbaru
        $activities = \App\Models\ActivityLog::with('user')
            ->latest()
            ->take(10)
            ->get();

        return view('dashboard', [
            'user' => $user,
            'totalKlien' => $totalKlien,
            'klienHariIni' => $klienHariIni,
            'activities' => $activities
        ]);
    }
}
