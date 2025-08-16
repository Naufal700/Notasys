<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\Keuangan\Tagihan;
use Illuminate\Http\Request;

class TagihanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        $data = Tagihan::with('akta')
            ->when($search, function ($q) use ($search) {
                $q->where('nomor_tagihan', 'like', "%{$search}%")
                    ->orWhereHas('akta', function ($q2) use ($search) {
                        $q2->where('nomor_akta', 'like', "%{$search}%");
                    });
            })
            ->orderBy('tanggal_tagihan', 'desc')
            ->paginate(10);

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'akta_id'         => 'nullable|exists:akta,id',
            'nomor_tagihan'   => 'required|string|max:50|unique:tagihan,nomor_tagihan',
            'tanggal_tagihan' => 'required|date',
            'total'           => 'required|numeric|min:0',
            'status'          => 'required|in:belum_lunas,lunas'
        ]);

        $tagihan = Tagihan::create($request->all());

        return response()->json([
            'message' => 'Tagihan berhasil ditambahkan',
            'data'    => $tagihan
        ], 201);
    }

    public function show($id)
    {
        return response()->json(Tagihan::with('akta')->findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $tagihan = Tagihan::findOrFail($id);

        $request->validate([
            'akta_id'         => 'nullable|exists:akta,id',
            'nomor_tagihan'   => 'required|string|max:50|unique:tagihan,nomor_tagihan,' . $id,
            'tanggal_tagihan' => 'required|date',
            'total'           => 'required|numeric|min:0',
            'status'          => 'required|in:belum_lunas,lunas'
        ]);

        $tagihan->update($request->all());

        return response()->json([
            'message' => 'Tagihan berhasil diperbarui',
            'data'    => $tagihan
        ]);
    }

    public function destroy($id)
    {
        Tagihan::findOrFail($id)->delete();
        return response()->json(['message' => 'Tagihan berhasil dihapus']);
    }
}
