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
        // Anda bisa menambahkan logika khusus dashboard di sini
        return view('dashboard', [
            'user' => auth()->user()
        ]);
    }
}
