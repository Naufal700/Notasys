<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\StatusAkta;
use Illuminate\Http\Request;

class StatusAktaController extends Controller
{
    public function index()
    {
        return response()->json(StatusAkta::orderBy('nama_status', 'asc')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_status' => 'required|string|max:255',
            'deskripsi'   => 'nullable|string'
        ]);

        $data = StatusAkta::create($request->all());
        return response()->json([
            'message' => 'Status Akta berhasil ditambahkan',
            'data'    => $data
        ], 201);
    }

    public function show($id)
    {
        return response()->json(StatusAkta::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $statusAkta = StatusAkta::findOrFail($id);

        $request->validate([
            'nama_status' => 'required|string|max:255',
            'deskripsi'   => 'nullable|string'
        ]);

        $statusAkta->update($request->all());
        return response()->json([
            'message' => 'Status Akta berhasil diperbarui',
            'data'    => $statusAkta
        ]);
    }

    public function destroy($id)
    {
        StatusAkta::findOrFail($id)->delete();
        return response()->json(['message' => 'Status Akta berhasil dihapus']);
    }
}
