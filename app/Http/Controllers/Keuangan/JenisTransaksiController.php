<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\Keuangan\JenisTransaksi;
use Illuminate\Http\Request;

class JenisTransaksiController extends Controller
{
    public function index()
    {
        return response()->json(JenisTransaksi::orderBy('nama_jenis', 'asc')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jenis' => 'required|string|max:255',
            'tipe'       => 'required|in:pemasukan,pengeluaran',
            'deskripsi'  => 'nullable|string'
        ]);

        $jenis = JenisTransaksi::create($request->all());

        return response()->json([
            'message' => 'Jenis transaksi berhasil ditambahkan',
            'data'    => $jenis
        ], 201);
    }

    public function show($id)
    {
        return response()->json(JenisTransaksi::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $jenis = JenisTransaksi::findOrFail($id);

        $request->validate([
            'nama_jenis' => 'required|string|max:255',
            'tipe'       => 'required|in:pemasukan,pengeluaran',
            'deskripsi'  => 'nullable|string'
        ]);

        $jenis->update($request->all());

        return response()->json([
            'message' => 'Jenis transaksi berhasil diperbarui',
            'data'    => $jenis
        ]);
    }

    public function destroy($id)
    {
        JenisTransaksi::findOrFail($id)->delete();
        return response()->json(['message' => 'Jenis transaksi berhasil dihapus']);
    }
}
