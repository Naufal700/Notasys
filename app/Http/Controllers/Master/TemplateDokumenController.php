<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Master\TemplateDokumen;
use Illuminate\Support\Facades\Storage;

class TemplateDokumenController extends Controller
{
    // Menampilkan daftar template
    public function index()
    {
        $templates = TemplateDokumen::with('jenisAkta')->latest()->paginate(10);
        return view('master.template_dokumen.index', compact('templates'));
    }

    // Form create
    public function create()
    {
        return view('master.template_dokumen.create');
    }

    // Simpan template
    public function store(Request $request)
    {
        $request->validate([
            'nama_template' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'use_upload' => 'nullable|boolean',
            'file_path' => $request->input('use_upload')
                ? 'required|file|mimes:doc,docx,pdf|max:10240'
                : 'nullable',
            'jenis_akta_id' => 'nullable|exists:jenis_akta,id',
            'is_active' => 'nullable|boolean'
        ]);


        $use_upload = $request->has('use_upload');
        $is_active = $request->has('is_active');
        $path = 'templates/default_akta_jual_beli.docx';

        if ($use_upload && $request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('templates', $filename, 'public');
        }

        TemplateDokumen::create([
            'nama_template' => $request->nama_template,
            'deskripsi' => $request->deskripsi,
            'file_path' => $path,
            'jenis_akta_id' => $request->jenis_akta_id,
            'is_active' => $is_active,
            'created_by' => Auth::id(),
        ]);

        return redirect()->route('template_dokumen.index')->with('success', 'Template berhasil disimpan.');
    }

    // Form edit
    public function edit($id)
    {
        $template = TemplateDokumen::findOrFail($id);
        return view('master.template_dokumen.edit', compact('template'));
    }

    // Update template
    public function update(Request $request, $id)
    {
        $template = TemplateDokumen::findOrFail($id);

        $request->validate([
            'nama_template' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'use_upload' => 'nullable|boolean',
            'file_path' => 'nullable|file|mimes:doc,docx,pdf|max:10240',
            'jenis_akta_id' => 'nullable|exists:jenis_akta,id',
            'is_active' => 'nullable|boolean'
        ]);

        $use_upload = $request->has('use_upload');
        $is_active = $request->has('is_active');

        if ($use_upload && $request->hasFile('file_path')) {
            if ($template->file_path && Storage::disk('public')->exists($template->file_path)) {
                Storage::disk('public')->delete($template->file_path);
            }
            $file = $request->file('file_path');
            $filename = time() . '_' . $file->getClientOriginalName();
            $template->file_path = $file->storeAs('templates', $filename, 'public');
        } elseif (!$use_upload) {
            $template->file_path = 'templates/default_akta_jual_beli.docx';
        }

        $template->update([
            'nama_template' => $request->nama_template,
            'deskripsi' => $request->deskripsi,
            'jenis_akta_id' => $request->jenis_akta_id,
            'is_active' => $is_active,
            'updated_by' => Auth::id(),
        ]);

        return redirect()->route('template_dokumen.index')->with('success', 'Template berhasil diperbarui.');
    }

    // Hapus template
    public function destroy($id)
    {
        $template = TemplateDokumen::findOrFail($id);
        if ($template->file_path && Storage::disk('public')->exists($template->file_path)) {
            Storage::disk('public')->delete($template->file_path);
        }
        $template->delete();

        return redirect()->route('template_dokumen.index')->with('success', 'Template berhasil dihapus.');
    }

    // Download file
    public function download($id)
    {
        $template = TemplateDokumen::findOrFail($id);
        if ($template->file_path && Storage::disk('public')->exists($template->file_path)) {
            return response()->download(storage_path('app/public/' . $template->file_path));
        }
        return redirect()->back()->with('error', 'File tidak ditemukan.');
    }
}
