<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\Keuangan\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index($tagihanId)
    {
        return response()->json(
            Pembayaran::where('tagihan_id', $tagihanId)
                ->orderBy('tanggal_bayar', 'desc')
                ->get()
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'tagihan_id'   => 'required|exists:tagihan,id',
            'tanggal_bayar' => 'required|date',
            'jumlah'       => 'required|numeric|min:0',
            'metode'       => 'required|string|max:50',
            'keterangan'   => 'nullable|string'
        ]);

        $pembayaran = Pembayaran::create($request->all());

        return response()->json([
            'message' => 'Pembayaran berhasil ditambahkan',
            'data'    => $pembayaran
        ], 201);
    }

    public function show($id)
    {
        return response()->json(Pembayaran::with('tagihan')->findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        $request->validate([
            'tagihan_id'   => 'required|exists:tagihan,id',
            'tanggal_bayar' => 'required|date',
            'jumlah'       => 'required|numeric|min:0',
            'metode'       => 'required|string|max:50',
            'keterangan'   => 'nullable|string'
        ]);

        $pembayaran->update($request->all());

        return response()->json([
            'message' => 'Pembayaran berhasil diperbarui',
            'data'    => $pembayaran
        ]);
    }

    public function destroy($id)
    {
        Pembayaran::findOrFail($id)->delete();
        return response()->json(['message' => 'Pembayaran berhasil dihapus']);
    }
}
