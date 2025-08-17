<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Akta Jual-Beli Tanah - {{ $ajb->nomor_akta ?? '........' }}</title>
    <style>
        @page { size: A4; margin: 2.5cm; }
        body { font-family: "Times New Roman", serif; font-size: 12pt; line-height: 1.6; }
        h1, h2 { text-align: center; margin: 0; }
        h1 { font-size: 16pt; margin-bottom: 10px; }
        h2 { font-size: 14pt; margin-bottom: 15px; }
        p { margin: 5px 0; text-align: justify; }
        .section { margin-top: 15px; }
        .field { font-weight: bold; }
        .indent { text-indent: 2em; }
        .list-item { margin-left: 2em; margin-top: 5px; }
        table { width: 100%; margin-top: 50px; border-collapse: collapse; }
        td { text-align: center; vertical-align: top; padding: 10px; }
    </style>
</head>
<body>

<h1>AKTA JUAL-BELI TANAH</h1>
<h2>Nomor: {{ $ajb->nomor_akta ?? '........' }}</h2>

<p>Pada hari ini, tanggal <span class="field">{{ $ajb->tanggal ?? '........' }}</span>, bertempat di hadapan Pejabat Pembuat Akta Tanah (PPAT) <span class="field">{{ $ajb->notaris ?? auth()->user()->name ?? '........' }}</span>, dengan daerah kerja <span class="field">{{ $ajb->daerah_kerja ?? '........' }}</span> dan berkantor di <span class="field">{{ $ajb->alamat_kantor_ppat ?? '........' }}</span>, telah hadir:</p>

<div class="section">
    <p class="list-item">1. PIHAK PERTAMA (Penjual):</p>
    <p class="indent">Nama: <span class="field">{{ $ajb->nama_penjual ?? '........' }}</span></p>
    <p class="indent">NIK/KTP: <span class="field">{{ $ajb->nik_penjual ?? '........' }}</span></p>
    <p class="indent">Tempat, Tanggal Lahir: <span class="field">{{ $ajb->tempat_lahir_penjual ?? '........' }}, {{ $ajb->tanggal_lahir_penjual ?? '........' }}</span></p>
    <p class="indent">Kewarganegaraan: <span class="field">{{ $ajb->kewarganegaraan_penjual ?? 'Indonesia' }}</span></p>
    <p class="indent">Pekerjaan: <span class="field">{{ $ajb->pekerjaan_penjual ?? '........' }}</span></p>
    <p class="indent">Alamat: <span class="field">{{ $ajb->alamat_penjual ?? '........' }}</span></p>
</div>

<div class="section">
    <p class="list-item">2. PIHAK KEDUA (Pembeli):</p>
    <p class="indent">Nama: <span class="field">{{ $ajb->nama_pembeli ?? '........' }}</span></p>
    <p class="indent">NIK/KTP: <span class="field">{{ $ajb->nik_pembeli ?? '........' }}</span></p>
    <p class="indent">Tempat, Tanggal Lahir: <span class="field">{{ $ajb->tempat_lahir_pembeli ?? '........' }}, {{ $ajb->tanggal_lahir_pembeli ?? '........' }}</span></p>
    <p class="indent">Kewarganegaraan: <span class="field">{{ $ajb->kewarganegaraan_pembeli ?? 'Indonesia' }}</span></p>
    <p class="indent">Pekerjaan: <span class="field">{{ $ajb->pekerjaan_pembeli ?? '........' }}</span></p>
    <p class="indent">Alamat: <span class="field">{{ $ajb->alamat_pembeli ?? '........' }}</span></p>
</div>

<div class="section">
    <p class="list-item">3. OBJEK TANAH:</p>
    <p class="indent">Hak Milik / Sertifikat: <span class="field">{{ $ajb->no_hak_milik ?? '........' }}</span></p>
    <p class="indent">Luas Tanah: <span class="field">{{ $ajb->luas_tanah ?? '........' }} m² ({{ $ajb->luas_tanah_terbilang ?? '........' }})</span></p>
    <p class="indent">Surat Ukur: Nomor <span class="field">{{ $ajb->no_surat_ukur ?? '........' }}</span>, tanggal <span class="field">{{ $ajb->tanggal_surat_ukur ?? '........' }}</span></p>
    <p class="indent">NIB: <span class="field">{{ $ajb->nib ?? '........' }}</span></p>
    <p class="indent">Lokasi: Jalan <span class="field">{{ $ajb->jalan ?? '........' }}</span>, Desa/Kelurahan <span class="field">{{ $ajb->desa ?? '........' }}</span>, Kecamatan <span class="field">{{ $ajb->kecamatan ?? '........' }}</span>, Kabupaten/Kota <span class="field">{{ $ajb->kabupaten ?? '........' }}</span>, Propinsi <span class="field">{{ $ajb->propinsi ?? '........' }}</span></p>
    <p class="indent">Jenis Tanah: <span class="field">{{ $ajb->jenis_tanah ?? '........' }}</span></p>
    <p class="indent">Bangunan / Fasilitas: <span class="field">{{ $ajb->bangunan ?? '........' }}</span></p>
</div>

<div class="section">
    <h2>Pasal 1 - Harga dan Pembayaran</h2>
    <p class="indent">Harga jual beli disepakati sebesar <span class="field">{{ $ajb->harga ?? '........' }}</span> ({{ $ajb->harga_terbilang ?? '........' }}), dengan uang muka (DP) sebesar <span class="field">{{ $ajb->dp ?? '........' }}</span>. Sisa pembayaran dilakukan sesuai kesepakatan para pihak.</p>
</div>

<div class="section">
    <h2>Pasal 2 - Penyerahan dan Penguasaan</h2>
    <p class="indent">Mulai hari ini, obyek jual beli telah menjadi milik Pihak Kedua, termasuk semua manfaat dan risiko yang timbul.</p>
</div>

<div class="section">
    <h2>Pasal 3 - Jaminan Penjual</h2>
    <p class="indent">Pihak Pertama menjamin bahwa obyek jual beli bebas dari sengketa, sita, hipotik, beban, atau jaminan lainnya yang tidak tercatat dalam sertifikat.</p>
</div>

<div class="section">
    <h2>Pasal 4 - Kepatuhan Pembeli</h2>
    <p class="indent">Pihak Kedua menyatakan kepemilikan tanah sesuai ketentuan maksimum penguasaan tanah menurut undang-undang.</p>
</div>

<div class="section">
    <h2>Pasal 5 - Pengukuran Ulang</h2>
    <p class="indent">Jika terdapat perbedaan luas tanah menurut hasil pengukuran BPN, para pihak menerima hasil pengukuran tanpa mengubah harga jual beli dan tidak akan saling menggugat.</p>
</div>

<div class="section">
    <h2>Pasal 6 - Biaya, Pajak dan Lain-lain</h2>
    <p class="indent">Segala biaya pembuatan akta, saksi, serta peralihan hak dibebankan kepada Pihak Kedua sesuai peraturan yang berlaku.</p>
</div>

<div class="section">
    <h2>Pasal 7 - Penutup</h2>
    <p class="indent">{{ $ajb->keterangan ?? '........' }}</p>
</div>

<table>
    <tr>
        <td>PPAT<br>____________________</td>
        <td>Pihak Pertama<br>____________________</td>
        <td>Pihak Kedua<br>____________________</td>
    </tr>
    <tr>
        <td>Saksi 1<br>____________________</td>
        <td>Saksi 2<br>____________________</td>
        <td></td>
    </tr>
</table>

</body>
</html>
