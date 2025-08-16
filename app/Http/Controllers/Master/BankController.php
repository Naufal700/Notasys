<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function index()
    {
        return response()->json(Bank::orderBy('nama_bank', 'asc')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_bank'      => 'required|string|max:255',
            'kode_bank'      => 'nullable|string|max:50',
            'alamat_cabang'  => 'nullable|string',
        ]);

        $data = Bank::create($request->all());
        return response()->json([
            'message' => 'Bank berhasil ditambahkan',
            'data'    => $data
        ], 201);
    }

    public function show($id)
    {
        return response()->json(Bank::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $bank = Bank::findOrFail($id);

        $request->validate([
            'nama_bank'      => 'required|string|max:255',
            'kode_bank'      => 'nullable|string|max:50',
            'alamat_cabang'  => 'nullable|string',
        ]);

        $bank->update($request->all());
        return response()->json([
            'message' => 'Bank berhasil diperbarui',
            'data'    => $bank
        ]);
    }

    public function destroy($id)
    {
        Bank::findOrFail($id)->delete();
        return response()->json(['message' => 'Bank berhasil dihapus']);
    }
}
