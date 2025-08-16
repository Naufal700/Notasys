<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\JenisPajak;
use Illuminate\Http\Request;

class JenisPajakController extends Controller
{
    public function index()
    {
        return response()->json(JenisPajak::orderBy('nama_pajak', 'asc')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pajak' => 'required|string|max:255',
            'deskripsi'  => 'nullable|string'
        ]);

        $data = JenisPajak::create($request->all());
        return response()->json([
            'message' => 'Jenis Pajak berhasil ditambahkan',
            'data'    => $data
        ], 201);
    }

    public function show($id)
    {
        return response()->json(JenisPajak::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $jenisPajak = JenisPajak::findOrFail($id);

        $request->validate([
            'nama_pajak' => 'required|string|max:255',
            'deskripsi'  => 'nullable|string'
        ]);

        $jenisPajak->update($request->all());
        return response()->json([
            'message' => 'Jenis Pajak berhasil diperbarui',
            'data'    => $jenisPajak
        ]);
    }

    public function destroy($id)
    {
        JenisPajak::findOrFail($id)->delete();
        return response()->json(['message' => 'Jenis Pajak berhasil dihapus']);
    }
}
