<?php

namespace App\Http\Controllers\Agenda;

use App\Http\Controllers\Controller;
use App\Models\Agenda\PengingatAgenda;
use Illuminate\Http\Request;

class PengingatAgendaController extends Controller
{
    public function index($agendaId)
    {
        return response()->json(
            PengingatAgenda::where('agenda_id', $agendaId)->orderBy('created_at', 'desc')->get()
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'agenda_id'   => 'required|exists:agenda,id',
            'judul_tugas' => 'required|string|max:255',
            'deskripsi'   => 'nullable|string',
            'status'      => 'required|in:belum_selesai,selesai,ditunda'
        ]);

        $tugas = PengingatAgenda::create($request->all());

        return response()->json([
            'message' => 'Tugas agenda berhasil ditambahkan',
            'data'    => $tugas
        ], 201);
    }

    public function show($id)
    {
        return response()->json(PengingatAgenda::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $tugas = PengingatAgenda::findOrFail($id);

        $request->validate([
            'agenda_id'   => 'required|exists:agenda,id',
            'judul_tugas' => 'required|string|max:255',
            'deskripsi'   => 'nullable|string',
            'status'      => 'required|in:belum_selesai,selesai,ditunda'
        ]);

        $tugas->update($request->all());

        return response()->json([
            'message' => 'Tugas agenda berhasil diperbarui',
            'data'    => $tugas
        ]);
    }

    public function destroy($id)
    {
        PengingatAgenda::findOrFail($id)->delete();
        return response()->json(['message' => 'Tugas agenda berhasil dihapus']);
    }
}
