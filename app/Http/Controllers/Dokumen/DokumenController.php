<?php

namespace App\Http\Controllers\Dokumen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dokumen\Dokumen;
use App\Models\Master\TemplateDokumen;

class DokumenController extends Controller
{

    public function index()
    {
        $dokumen = Dokumen::with('template', 'user')->latest()->paginate(10);
        return view('dokumen.index', compact('dokumen'));
    }

    public function create()
    {
        $templates = TemplateDokumen::all();
        return view('dokumen.form', compact('templates'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'template_id' => 'required',
            'data' => 'required|array'
        ]);

        Dokumen::create([
            'template_id' => $request->template_id,
            'data' => $request->data,
            'created_by' => auth()->id()
        ]);

        return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil dibuat!');
    }

    public function edit(Dokumen $dokumen)
    {
        $templates = TemplateDokumen::all();
        return view('dokumen.form', compact('dokumen', 'templates'));
    }

    public function update(Request $request, Dokumen $dokumen)
    {
        $request->validate([
            'data' => 'required|array'
        ]);

        $dokumen->update([
            'data' => $request->data,
        ]);

        return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil diupdate!');
    }
}
