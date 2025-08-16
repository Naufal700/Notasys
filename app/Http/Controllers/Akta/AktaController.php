<?php

namespace App\Http\Controllers\Akta;

use App\Http\Controllers\Controller;
use App\Models\Akta\Akta;
use Illuminate\Http\Request;

class AktaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $data = Akta::with(['klien', 'jenisAkta', 'statusAkta'])
            ->when($search, function ($q) use ($search) {
                $q->where('nomor_akta', 'like', "%{$search}%")
                    ->orWhereHas('klien', function ($q2) use ($search) {
                        $q2->where('nama', 'like', "%{$search}%");
                    });
            })
            ->orderBy('tanggal', 'desc')
            ->paginate(10);

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_akta'    => 'required|string|max:255|unique:akta,nomor_akta',
            'klien_id'      => 'required|exists:klien,id',
            'jenis_akta_id' => 'required|exists:jenis_akta,id',
            'status_akta_id' => 'required|exists:status_akta,id',
            'tanggal'       => 'required|date',
            'keterangan'    => 'nullable|string'
        ]);

        $akta = Akta::create($request->all());

        return response()->json([
            'message' => 'Akta berhasil dibuat',
            'data'    => $akta
        ], 201);
    }

    public function show($id)
    {
        $akta = Akta::with(['klien', 'jenisAkta', 'statusAkta', 'pihakTerlibat', 'riwayatPerubahan'])
            ->findOrFail($id);

        return response()->json($akta);
    }

    public function update(Request $request, $id)
    {
        $akta = Akta::findOrFail($id);

        $request->validate([
            'nomor_akta'    => 'required|string|max:255|unique:akta,nomor_akta,' . $id,
            'klien_id'      => 'required|exists:klien,id',
            'jenis_akta_id' => 'required|exists:jenis_akta,id',
            'status_akta_id' => 'required|exists:status_akta,id',
            'tanggal'       => 'required|date',
            'keterangan'    => 'nullable|string'
        ]);

        $akta->update($request->all());

        return response()->json([
            'message' => 'Akta berhasil diperbarui',
            'data'    => $akta
        ]);
    }

    public function destroy($id)
    {
        Akta::findOrFail($id)->delete();
        return response()->json(['message' => 'Akta berhasil dihapus']);
    }
}
