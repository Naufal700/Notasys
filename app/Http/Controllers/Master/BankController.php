<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\Bank;

class BankController extends Controller
{
    /**
     * Tampilkan daftar bank
     */
    public function index()
    {
        $banks = Bank::orderBy('nama_bank')->get();
        return view('master.bank.index', compact('banks'));
    }

    /**
     * Tampilkan form tambah bank
     */
    public function create()
    {
        return view('master.bank.create');
    }

    /**
     * Simpan data bank baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_bank' => 'required|string|max:255',
            'kode_bank' => 'nullable|string|max:50|unique:bank,kode_bank',
            'nomor_rekening' => 'nullable|string|max:50',
            'nama_pemilik' => 'nullable|string|max:255',
            'aktif' => 'boolean',
            'keterangan' => 'nullable|string',
        ]);

        Bank::create($request->all());

        return redirect()->route('bank.index')->with('success', 'Bank berhasil ditambahkan');
    }

    /**
     * Tampilkan form edit bank
     */
    public function edit(Bank $bank)
    {
        return view('master.bank.edit', compact('bank'));
    }

    /**
     * Update data bank
     */
    public function update(Request $request, Bank $bank)
    {
        $request->validate([
            'nama_bank' => 'required|string|max:255',
            'kode_bank' => 'nullable|string|max:50|unique:bank,kode_bank,' . $bank->id,
            'nomor_rekening' => 'nullable|string|max:50',
            'nama_pemilik' => 'nullable|string|max:255',
            'aktif' => 'boolean',
            'keterangan' => 'nullable|string',
        ]);

        $bank->update($request->all());

        return redirect()->route('bank.index')->with('success', 'Bank berhasil diperbarui');
    }

    /**
     * Hapus bank
     */
    public function destroy(Bank $bank)
    {
        $bank->delete();
        return redirect()->route('bank.index')->with('success', 'Bank berhasil dihapus');
    }
}
