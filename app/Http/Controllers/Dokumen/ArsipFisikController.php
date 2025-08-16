<?php

namespace App\Http\Controllers\Dokumen;

use App\Http\Controllers\Controller;
use App\Models\Dokumen\ArsipFisik;
use Illuminate\Http\Request;

class ArsipFisikController extends Controller
{
    public function index()
    {
        return response()->json(
            ArsipFisik::with('akta')->orderBy('lokasi', 'asc')->get()
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'akta_id' => 'required|exists:akta,id',
            'lokasi'  => 'required|string|max:255',
            'catatan' => 'nullable|string'
        ]);

        $arsip = ArsipFisik::create($request->all());

        return response()->json([
            'message' => 'Arsip fisik berhasil ditambahkan',
            'data'    => $arsip
        ], 201);
    }

    public function show($id)
    {
        return response()->json(ArsipFisik::with('akta')->findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $arsip = ArsipFisik::findOrFail($id);

        $request->validate([
            'akta_id' => 'required|exists:akta,id',
            'lokasi'  => 'required|string|max:255',
            'catatan' => 'nullable|string'
        ]);

        $arsip->update($request->all());

        return response()->json([
            'message' => 'Arsip fisik berhasil diperbarui',
            'data'    => $arsip
        ]);
    }

    public function destroy($id)
    {
        ArsipFisik::findOrFail($id)->delete();
        return response()->json(['message' => 'Arsip fisik berhasil dihapus']);
    }
}
