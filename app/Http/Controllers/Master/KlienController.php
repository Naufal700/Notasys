<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\Klien;
use App\Models\Master\JenisIdentitas; // tambahkan
use App\Imports\KlienImport;
use App\Exports\KlienExport;
use Maatwebsite\Excel\Facades\Excel;

class KlienController extends Controller
{
    /** Display list of clients */
    public function index()
    {
        $klien = Klien::with('jenisIdentitas')->paginate(10); // 10 per halaman
        return view('master.klien.index', compact('klien'));
    }


    /** Show form to create new client */
    public function create()
    {
        $jenisIdentitas = JenisIdentitas::all(); // ambil semua jenis identitas
        return view('master.klien.create', compact('jenisIdentitas'));
    }

    /** Store new client to database */
    public function store(Request $request)
    {
        $validated = $this->validateKlien($request);
        Klien::create($validated);

        return redirect()->route('master.klien.index')
            ->with('success', 'Data klien berhasil ditambahkan.');
    }

    /** Show form to edit existing client */
    public function edit(Klien $klien)
    {
        $jenisIdentitas = JenisIdentitas::all(); // ambil semua jenis identitas
        return view('master.klien.edit', compact('klien', 'jenisIdentitas'));
    }

    /** Update client data */
    public function update(Request $request, Klien $klien)
    {
        $validated = $this->validateKlien($request);
        $klien->update($validated);

        return redirect()->route('master.klien.index')
            ->with('success', 'Data klien berhasil diupdate.');
    }

    /** Delete client */
    public function destroy(Klien $klien)
    {
        $klien->delete();

        return redirect()->route('master.klien.index')
            ->with('success', 'Data klien berhasil dihapus.');
    }

    /** Import Excel file */
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        Excel::import(new KlienImport, $request->file('file'));

        return redirect()->route('master.klien.index')
            ->with('success', 'Data klien berhasil diimport.');
    }

    /** Export all clients to Excel */
    public function export()
    {
        return Excel::download(new KlienExport, 'klien.xlsx');
    }

    /** Download template Excel for clients */
    public function downloadTemplate()
    {
        return Excel::download(new KlienExport, 'template_klien.xlsx');
    }

    /** Validate request data for create/update */
    private function validateKlien(Request $request): array
    {
        return $request->validate([
            'nama' => 'required|string|max:255',
            'jenis' => 'required|in:perorangan,badan_hukum',
            'jenis_identitas_id' => 'required|integer|exists:jenis_identitas,id', // pastikan ada di tabel
            'nomor_identitas' => 'nullable|string|max:50',
            'npwp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
            'telepon' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100',
        ]);
    }
}
