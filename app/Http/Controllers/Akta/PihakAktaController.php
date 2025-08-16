<?php

namespace App\Http\Controllers\Akta;

use App\Http\Controllers\Controller;
use App\Models\Akta\PihakAkta;
use Illuminate\Http\Request;

class PihakAktaController extends Controller
{
    public function index($aktaId)
    {
        $data = PihakAkta::where('akta_id', $aktaId)->orderBy('nama', 'asc')->get();
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'akta_id' => 'required|exists:akta,id',
            'nama'    => 'required|string|max:255',
            'peran'   => 'nullable|string|max:255',
            'kontak'  => 'nullable|string|max:255',
        ]);

        $pihak = PihakAkta::create($request->all());

        return response()->json([
            'message' => 'Pihak Terlibat berhasil ditambahkan',
            'data'    => $pihak
        ], 201);
    }

    public function show($id)
    {
        return response()->json(PihakAkta::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $pihak = PihakAkta::findOrFail($id);

        $request->validate([
            'akta_id' => 'required|exists:akta,id',
            'nama'    => 'required|string|max:255',
            'peran'   => 'nullable|string|max:255',
            'kontak'  => 'nullable|string|max:255',
        ]);

        $pihak->update($request->all());

        return response()->json([
            'message' => 'Pihak Terlibat berhasil diperbarui',
            'data'    => $pihak
        ]);
    }

    public function destroy($id)
    {
        PihakAkta::findOrFail($id)->delete();
        return response()->json(['message' => 'Pihak Terlibat berhasil dihapus']);
    }
}
