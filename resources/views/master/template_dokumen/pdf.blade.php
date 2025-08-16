<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Template Dokumen PDF</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>Daftar Template Dokumen</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Template</th>
                <th>Jenis Akta</th>
                <th>Status</th>
                <th>File Path</th>
            </tr>
        </thead>
        <tbody>
            @foreach($templates as $key => $template)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $template->nama_template }}</td>
                <td>{{ $template->jenisAkta->nama ?? '-' }}</td>
                <td>{{ $template->is_active ? 'Aktif' : 'Nonaktif' }}</td>
                <td>{{ $template->file_path ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
