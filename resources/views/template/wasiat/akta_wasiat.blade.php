<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Akta Wasiat - {{ $wasiat->nama_penghadap ?? '........' }}</title>
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
        .list { margin-left: 2em; }
        table { width: 100%; margin-top: 50px; border-collapse: collapse; }
        td { text-align: center; vertical-align: top; padding: 10px; }
        .border-top { border-top: 1px solid #000; padding-top: 5px; }
    </style>
</head>
<body>

<h1>AKTA WASIAT</h1>
<h2>Nomor: {{ $wasiat->nomor_akta ?? '........' }}</h2>

<p>Pada hari <span class="field">{{ $wasiat->hari ?? '........' }}</span>, tanggal <span class="field">{{ $wasiat->tanggal ?? '........' }}</span> ({{ $wasiat->tanggal_terbilang ?? '........' }}), pukul <span class="field">{{ $wasiat->jam ?? '........' }}</span> WIB, hadir di hadapan Notaris <span class="field">{{ $wasiat->notaris ?? auth()->user()->name ?? '........' }}</span>:</p>

<div class="section">
    <p class="indent"><strong>Penghadap/Wasiat:</strong></p>
    <p class="indent">Nama: <span class="field">{{ $wasiat->nama_penghadap ?? '........' }}</span></p>
    <p class="indent">NIK: <span class="field">{{ $wasiat->nik_penghadap ?? '........' }}</span></p>
    <p class="indent">Alamat: <span class="field">{{ $wasiat->alamat_penghadap ?? '........' }}</span></p>
</div>

<div class="section">
    <p class="indent"><strong>Saksi-saksi:</strong></p>
    <p class="indent list">1. {{ $wasiat->saksi1 ?? '........' }}, {{ $wasiat->pekerjaan_saksi1 ?? '........' }}, lahir di {{ $wasiat->tempat_lahir_saksi1 ?? '........' }} tanggal {{ $wasiat->tanggal_lahir_saksi1 ?? '........' }}, NIK {{ $wasiat->nik_saksi1 ?? '........' }}, bertempat tinggal di {{ $wasiat->alamat_saksi1 ?? '........' }}.</p>
    <p class="indent list">2. {{ $wasiat->saksi2 ?? '........' }}, {{ $wasiat->pekerjaan_saksi2 ?? '........' }}, lahir di {{ $wasiat->tempat_lahir_saksi2 ?? '........' }} tanggal {{ $wasiat->tanggal_lahir_saksi2 ?? '........' }}, NIK {{ $wasiat->nik_saksi2 ?? '........' }}, bertempat tinggal di {{ $wasiat->alamat_saksi2 ?? '........' }}.</p>
</div>

<div class="section">
    <h2>Pasal 1 - Pencabutan Wasiat Sebelumnya</h2>
    <p class="indent">Penghadap menyatakan mencabut dan tidak berlaku lagi seluruh wasiat atau surat-surat lain yang mempunyai kekuatan sebagai surat wasiat sebelumnya.</p>
</div>

<div class="section">
    <h2>Pasal 2 - Hibah kepada Ahli Waris</h2>
    <p class="indent">Penghadap mewariskan harta kepada ahli waris berikut:</p>
    <p class="indent list">1. {{ $wasiat->ahli_waris1 ?? '........' }}, {{ $wasiat->hubungan1 ?? '........' }}, lahir di {{ $wasiat->tempat_lahir1 ?? '........' }} tanggal {{ $wasiat->tanggal_lahir1 ?? '........' }}, NIK {{ $wasiat->nik1 ?? '........' }}, bertempat tinggal di {{ $wasiat->alamat1 ?? '........' }}, berupa <span class="field">{{ $wasiat->harta1 ?? '........' }}</span>.</p>
    <p class="indent list">2. {{ $wasiat->ahli_waris2 ?? '........' }}, {{ $wasiat->hubungan2 ?? '........' }}, lahir di {{ $wasiat->tempat_lahir2 ?? '........' }} tanggal {{ $wasiat->tanggal_lahir2 ?? '........' }}, NIK {{ $wasiat->nik2 ?? '........' }}, bertempat tinggal di {{ $wasiat->alamat2 ?? '........' }}, berupa <span class="field">{{ $wasiat->harta2 ?? '........' }}</span>.</p>
</div>

<div class="section">
    <h2>Pasal 3 - Pelaksana Wasiat</h2>
    <p class="indent">Penghadap mengangkat sebagai pelaksana wasiat: <span class="field">{{ $wasiat->pelaksana_wasiat ?? '........' }}</span>, dengan hak dan kewajiban sesuai ketentuan perundang-undangan.</p>
</div>

<div class="section">
    <h2>Pasal 4 - Deklarasi PPATK / Anti-Pencucian Uang</h2>
    <p class="indent">Penghadap menyatakan bahwa seluruh harta yang diwariskan berasal dari sumber yang sah, legal, dan tidak terkait tindak pidana pencucian uang, sesuai ketentuan Undang-Undang Nomor 8 Tahun 2010 dan peraturan PPATK.</p>
</div>

<div class="section">
    <h2>Pasal 5 - Ketentuan Tambahan</h2>
    <p class="indent">{{ $wasiat->keterangan ?? '........' }}</p>
</div>

<table>
    <tr>
        <td>Notaris/PPAT<br class="border-top">____________________</td>
        <td>Penghadap<br class="border-top">____________________</td>
        <td>Saksi 1<br class="border-top">____________________</td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td>Saksi 2<br class="border-top">____________________</td>
    </tr>
</table>

</body>
</html>
