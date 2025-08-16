<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\JenisAkta;

class JenisAktaController extends Controller
{
    /** Tampilkan daftar jenis akta */
    public function index()
    {
        $jenisAkta = JenisAkta::orderBy('id', 'desc')->paginate(10); // 10 per halaman
        return view('master.jenis_akta.index', compact('jenisAkta'));
    }


    /** Tampilkan form create */
    public function create()
    {
        return view('master.jenis_akta.create');
    }

    /** Simpan data baru */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_akta' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        JenisAkta::create($validated);

        return redirect()->route('master.jenis-akta.index')
            ->with('success', 'Jenis Akta berhasil ditambahkan.');
    }

    /** Tampilkan form edit */
    public function edit(JenisAkta $jenisAkta)
    {
        return view('master.jenis_akta.edit', compact('jenisAkta'));
    }

    /** Update data */
    public function update(Request $request, JenisAkta $jenisAkta)
    {
        $validated = $request->validate([
            'nama_akta' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $jenisAkta->update($validated);

        return redirect()->route('master.jenis-akta.index')
            ->with('success', 'Jenis Akta berhasil diupdate.');
    }

    /** Hapus data */
    public function destroy(JenisAkta $jenisAkta)
    {
        $jenisAkta->delete();

        return redirect()->route('master.jenis-akta.index')
            ->with('success', 'Jenis Akta berhasil dihapus.');
    }
}
