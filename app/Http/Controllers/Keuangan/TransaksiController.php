<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\Keuangan\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        $data = Transaksi::with(['jenisTransaksi', 'akta'])
            ->when($search, function ($q) use ($search) {
                $q->where('keterangan', 'like', "%{$search}%")
                    ->orWhereHas('akta', function ($q2) use ($search) {
                        $q2->where('nomor_akta', 'like', "%{$search}%");
                    });
            })
            ->orderBy('tanggal', 'desc')
            ->paginate(10);

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_transaksi_id' => 'required|exists:jenis_transaksi,id',
            'akta_id'            => 'nullable|exists:akta,id',
            'tanggal'            => 'required|date',
            'nominal'            => 'required|numeric|min:0',
            'keterangan'         => 'nullable|string'
        ]);

        $transaksi = Transaksi::create($request->all());

        return response()->json([
            'message' => 'Transaksi berhasil ditambahkan',
            'data'    => $transaksi
        ], 201);
    }

    public function show($id)
    {
        return response()->json(Transaksi::with(['jenisTransaksi', 'akta'])->findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);

        $request->validate([
            'jenis_transaksi_id' => 'required|exists:jenis_transaksi,id',
            'akta_id'            => 'nullable|exists:akta,id',
            'tanggal'            => 'required|date',
            'nominal'            => 'required|numeric|min:0',
            'keterangan'         => 'nullable|string'
        ]);

        $transaksi->update($request->all());

        return response()->json([
            'message' => 'Transaksi berhasil diperbarui',
            'data'    => $transaksi
        ]);
    }

    public function destroy($id)
    {
        Transaksi::findOrFail($id)->delete();
        return response()->json(['message' => 'Transaksi berhasil dihapus']);
    }
}
