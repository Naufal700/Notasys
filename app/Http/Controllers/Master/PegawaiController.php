<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Models\Master\Pegawai;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    // Menampilkan daftar pegawai
    public function index()
    {
        $pegawai = Pegawai::orderBy('nama')->paginate(10);
        return view('master.pegawai.index', compact('pegawai'));
    }

    // Form tambah pegawai
    public function create()
    {
        return view('master.pegawai.create');
    }

    // Simpan pegawai baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:pegawai_m,email',
            'username' => 'nullable|unique:pegawai_m,username',
            'password' => 'nullable|string|min:6',
            'role' => 'required|in:admin,notaris,staff,kasir',
        ]);

        $data = $request->all();
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        Pegawai::create($data);

        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil ditambahkan.');
    }

    // Form edit pegawai
    public function edit($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return view('master.pegawai.edit', compact('pegawai'));
    }

    // Update pegawai
    public function update(Request $request, $id)
    {
        $pegawai = Pegawai::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:pegawai_m,email,' . $id,
            'username' => 'nullable|unique:pegawai_m,username,' . $id,
            'password' => 'nullable|string|min:6',
            'role' => 'required|in:admin,notaris,staff,kasir',
        ]);

        $data = $request->all();
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']); // jangan update password jika kosong
        }

        $pegawai->update($data);

        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil diperbarui.');
    }

    // Hapus pegawai
    public function destroy($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();

        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil dihapus.');
    }
}
