<?php

namespace App\Http\Controllers\Agenda;

use App\Http\Controllers\Controller;
use App\Models\Agenda\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        $data = Agenda::with('akta')
            ->when($search, function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                    ->orWhereHas('akta', function ($q2) use ($search) {
                        $q2->where('nomor_akta', 'like', "%{$search}%");
                    });
            })
            ->orderBy('tanggal_mulai', 'desc')
            ->paginate(10);

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'akta_id'       => 'nullable|exists:akta,id',
            'judul'         => 'required|string|max:255',
            'deskripsi'     => 'nullable|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'status'        => 'required|in:terjadwal,selesai,ditunda'
        ]);

        $agenda = Agenda::create($request->all());

        return response()->json([
            'message' => 'Agenda berhasil dibuat',
            'data'    => $agenda
        ], 201);
    }

    public function show($id)
    {
        return response()->json(Agenda::with(['akta', 'tugas'])->findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $agenda = Agenda::findOrFail($id);

        $request->validate([
            'akta_id'       => 'nullable|exists:akta,id',
            'judul'         => 'required|string|max:255',
            'deskripsi'     => 'nullable|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'status'        => 'required|in:terjadwal,selesai,ditunda'
        ]);

        $agenda->update($request->all());

        return response()->json([
            'message' => 'Agenda berhasil diperbarui',
            'data'    => $agenda
        ]);
    }

    public function destroy($id)
    {
        Agenda::findOrFail($id)->delete();
        return response()->json(['message' => 'Agenda berhasil dihapus']);
    }
}
