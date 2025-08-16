<?php

namespace App\Http\Controllers\Sistem;

use App\Http\Controllers\Controller;
use App\Models\Sistem\LogAktivitas;
use Illuminate\Http\Request;

class LogAktivitasController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        $data = LogAktivitas::with('user')
            ->when($search, function ($q) use ($search) {
                $q->where('aksi', 'like', "%{$search}%")
                    ->orWhere('deskripsi', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return response()->json($data);
    }

    public function show($id)
    {
        return response()->json(LogAktivitas::with('user')->findOrFail($id));
    }
}
