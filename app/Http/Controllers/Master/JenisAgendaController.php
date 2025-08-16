<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\JenisAgenda;
use Illuminate\Http\Request;

class JenisAgendaController extends Controller
{
    public function index()
    {
        return response()->json(JenisAgenda::orderBy('nama_jenis', 'asc')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jenis' => 'required|string|max:255',
            'deskripsi'  => 'nullable|string'
        ]);

        $data = JenisAgenda::create($request->all());
        return response()->json([
            'message' => 'Jenis Agenda berhasil ditambahkan',
            'data'    => $data
        ], 201);
    }

    public function show($id)
    {
        return response()->json(JenisAgenda::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $jenisAgenda = JenisAgenda::findOrFail($id);

        $request->validate([
            'nama_jenis' => 'required|string|max:255',
            'deskripsi'  => 'nullable|string'
        ]);

        $jenisAgenda->update($request->all());
        return response()->json([
            'message' => 'Jenis Agenda berhasil diperbarui',
            'data'    => $jenisAgenda
        ]);
    }

    public function destroy($id)
    {
        JenisAgenda::findOrFail($id)->delete();
        return response()->json(['message' => 'Jenis Agenda berhasil dihapus']);
    }
}
