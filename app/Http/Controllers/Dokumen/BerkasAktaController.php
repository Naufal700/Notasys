<?php

namespace App\Http\Controllers\Dokumen;

use App\Http\Controllers\Controller;
use App\Models\Dokumen\BerkasAkta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BerkasAktaController extends Controller
{
    public function index($aktaId)
    {
        $data = BerkasAkta::where('akta_id', $aktaId)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'akta_id'  => 'required|exists:akta,id',
            'nama_file' => 'required|string|max:255',
            'file'     => 'required|file|max:5120' // 5MB
        ]);

        $path = $request->file('file')->store('berkas-akta');

        $berkas = BerkasAkta::create([
            'akta_id'  => $request->akta_id,
            'nama_file' => $request->nama_file,
            'path_file' => $path
        ]);

        return response()->json([
            'message' => 'Berkas akta berhasil diunggah',
            'data'    => $berkas
        ], 201);
    }

    public function show($id)
    {
        return response()->json(BerkasAkta::findOrFail($id));
    }

    public function destroy($id)
    {
        $berkas = BerkasAkta::findOrFail($id);

        if (Storage::exists($berkas->path_file)) {
            Storage::delete($berkas->path_file);
        }

        $berkas->delete();

        return response()->json(['message' => 'Berkas akta berhasil dihapus']);
    }
}
