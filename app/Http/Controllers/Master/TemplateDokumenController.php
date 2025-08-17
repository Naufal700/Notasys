<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Master\JenisAkta;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Master\TemplateDokumen;
use Illuminate\Support\Facades\File;

class TemplateDokumenController extends Controller
{
    public function index(Request $request)
    {
        $query = TemplateDokumen::with('jenisAkta');

        if ($request->has('template_type') && $request->template_type != '') {
            $query->where('jenis_akta_id', $request->template_type);
        }

        $templates = $query->orderBy('created_at', 'desc')->paginate(10)->withQueryString();
        $jenis_akta = JenisAkta::all();

        return view('master.template_dokumen.index', compact('templates', 'jenis_akta'));
    }

    public function loadTemplate($id)
    {
        $template = TemplateDokumen::findOrFail($id);

        // Langsung ambil dari DB (format: template.ajb.template)
        $viewPath = $template->file_path;

        $defaultData = [];
        switch (strtolower($template->jenisAkta->nama_akta ?? '')) {
            case 'ajb':
                $defaultData = [
                    'nomor_akta' => '',
                    'tanggal' => '',
                    'nama_penjual' => '',
                    'nik_penjual' => '',
                    'tempat_lahir_penjual' => '',
                    'tanggal_lahir_penjual' => '',
                    'kewarganegaraan_penjual' => 'Indonesia',
                    'pekerjaan_penjual' => '',
                    'alamat_penjual' => '',

                    'nama_pembeli' => '',
                    'nik_pembeli' => '',
                    'tempat_lahir_pembeli' => '',
                    'tanggal_lahir_pembeli' => '',
                    'kewarganegaraan_pembeli' => 'Indonesia',
                    'pekerjaan_pembeli' => '',
                    'alamat_pembeli' => '',

                    'no_hak_milik' => '',
                    'luas_tanah' => '',
                    'luas_tanah_terbilang' => '',
                    'tanggal_surat_ukur' => '',
                    'no_surat_ukur' => '',
                    'nib' => '',
                    'propinsi' => '',
                    'kabupaten' => '',
                    'kecamatan' => '',
                    'desa' => '',
                    'jalan' => '',
                    'jenis_tanah' => '',
                    'bangunan' => '',
                    'harga' => '',
                    'harga_terbilang' => '',
                    'dp' => '',
                    'keterangan' => '',
                    'daerah_kerja' => '',
                    'alamat_kantor_ppat' => '',
                    'notaris' => Auth::user()->name ?? '',
                    'saksi1' => '',
                    'saksi2' => '',
                ];
                $dataKey = 'ajb';
                break;

            case 'pendirian pt':
                $defaultData = [
                    'nomor_akta' => '',
                    'tanggal' => '',
                    'nama_perusahaan' => '',
                    'jenis_usaha' => '',
                    'alamat_perusahaan' => '',
                    'pemegang_saham' => [],
                    'notaris' => Auth::user()->name ?? ''
                ];
                $dataKey = 'pt';
                break;

            case 'akta wasiat':
                $defaultData = [
                    'nomor_akta' => '',
                    'hari' => '',
                    'tanggal' => '',
                    'tanggal_terbilang' => '',
                    'jam' => '',
                    'nama_penghadap' => '',
                    'alamat_penghadap' => '',
                    'nik_penghadap' => '',
                    'saksi1' => '',
                    'pekerjaan_saksi1' => '',
                    'tempat_lahir_saksi1' => '',
                    'tanggal_lahir_saksi1' => '',
                    'nik_saksi1' => '',
                    'alamat_saksi1' => '',
                    'saksi2' => '',
                    'pekerjaan_saksi2' => '',
                    'tempat_lahir_saksi2' => '',
                    'tanggal_lahir_saksi2' => '',
                    'nik_saksi2' => '',
                    'alamat_saksi2' => '',
                    'ahli_waris1' => '',
                    'hubungan1' => '',
                    'tempat_lahir1' => '',
                    'tanggal_lahir1' => '',
                    'nik1' => '',
                    'alamat1' => '',
                    'harta1' => '',
                    'ahli_waris2' => '',
                    'hubungan2' => '',
                    'tempat_lahir2' => '',
                    'tanggal_lahir2' => '',
                    'nik2' => '',
                    'alamat2' => '',
                    'harta2' => '',
                    'pelaksana_wasiat' => '',
                    'notaris' => Auth::user()->name ?? '',
                    'keterangan' => '',
                ];
                $dataKey = 'wasiat';
                break;

            default:
                $defaultData = [];
                $dataKey = 'data';
                break;
        }

        return view($viewPath, [$dataKey => (object)$defaultData]);
    }

    public function create()
    {
        $jenis_akta = JenisAkta::all();

        $template_dirs = [
            'ajb' => resource_path('views/template/ajb'),
            'pt' => resource_path('views/template/pt'),
            'wasiat' => resource_path('views/template/wasiat'),
        ];

        $templates_blade = [];
        foreach ($template_dirs as $key => $dir) {
            if (File::exists($dir)) {
                $files = File::files($dir);
                foreach ($files as $file) {
                    // langsung format template.ajb.template
                    $templates_blade[] = 'template.' . $key . '.' . pathinfo($file)['filename'];
                }
            }
        }

        return view('master.template_dokumen.create', compact('jenis_akta', 'templates_blade'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_template' => 'required|string|max:255',
            'file_path' => 'required|string|max:255',
            'jenis_akta_id' => 'required|exists:jenis_akta,id',
        ]);

        TemplateDokumen::create([
            'nama_template' => $request->nama_template,
            'deskripsi' => $request->deskripsi,
            'file_path' => $request->file_path, // langsung pakai template.ajb.template
            'jenis_akta_id' => $request->jenis_akta_id,
            'paper_size' => $request->paper_size ?? 'A4',
            'orientation' => $request->orientation ?? 'portrait',
            'is_active' => $request->has('is_active') ? true : false,
            'created_by' => Auth::id(),
        ]);

        return redirect()->route('template.index')->with('success', 'Template berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $template = TemplateDokumen::findOrFail($id);
        $jenis_akta = JenisAkta::all();
        return view('master.template_dokumen.edit', compact('template', 'jenis_akta'));
    }

    public function update(Request $request, $id)
    {
        $template = TemplateDokumen::findOrFail($id);

        $request->validate([
            'nama_template' => 'required|string|max:255',
            'file_path' => 'required|string|max:255',
            'jenis_akta_id' => 'required|exists:jenis_akta,id',
        ]);

        $template->update([
            'nama_template' => $request->nama_template,
            'deskripsi' => $request->deskripsi,
            'file_path' => $request->file_path,
            'jenis_akta_id' => $request->jenis_akta_id,
            'paper_size' => $request->paper_size ?? 'A4',
            'orientation' => $request->orientation ?? 'portrait',
            'is_active' => $request->has('is_active') ? true : false,
            'updated_by' => Auth::id(),
        ]);

        return redirect()->route('template.index')->with('success', 'Template berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $template = TemplateDokumen::findOrFail($id);
        $template->delete();

        return redirect()->route('template.index')->with('success', 'Template berhasil dihapus.');
    }

    public function cetak(Request $request, $id)
    {
        $template = TemplateDokumen::findOrFail($id);

        $dataKey = 'ajb';
        $nama_akta = strtolower($template->jenisAkta->nama_akta ?? '');
        if ($nama_akta === 'pendirian pt') $dataKey = 'pt';
        if ($nama_akta === 'akta wasiat') $dataKey = 'wasiat';

        $data = $request->template_data ?? [];
        $objData = (object) $data;

        $pdf = PDF::loadView($template->file_path, [$dataKey => $objData])
            ->setPaper($template->paper_size, $template->orientation);

        return $pdf->stream($template->nama_template . '.pdf');
    }
}
