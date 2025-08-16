<?php

namespace App\Http\Controllers\Akta;

use App\Http\Controllers\Controller;
use App\Models\Akta\RiwayatStatusAkta;
use Illuminate\Http\Request;

class RiwayatStatusAktaController extends Controller
{
    public function index($aktaId)
    {
        $data = RiwayatStatusAkta::where('akta_id', $aktaId)
            ->orderBy('tanggal_perubahan', 'desc')
            ->get();

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'akta_id'           => 'required|exists:akta,id',
            'tanggal_perubahan' => 'required|date',
            'keterangan'        => 'nullable|string'
        ]);

        $riwayat = RiwayatStatusAkta::create($request->all());

        return response()->json([
            'message' => 'Riwayat perubahan berhasil ditambahkan',
            'data'    => $riwayat
        ], 201);
    }

    public function show($id)
    {
        return response()->json(RiwayatStatusAkta::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $riwayat = RiwayatStatusAkta::findOrFail($id);

        $request->validate([
            'akta_id'           => 'required|exists:akta,id',
            'tanggal_perubahan' => 'required|date',
            'keterangan'        => 'nullable|string'
        ]);

        $riwayat->update($request->all());

        return response()->json([
            'message' => 'Riwayat perubahan berhasil diperbarui',
            'data'    => $riwayat
        ]);
    }

    public function destroy($id)
    {
        RiwayatStatusAkta::findOrFail($id)->delete();
        return response()->json(['message' => 'Riwayat perubahan berhasil dihapus']);
    }
}
