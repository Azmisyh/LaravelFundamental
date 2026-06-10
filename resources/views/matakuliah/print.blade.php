<!DOCTYPE html>
<html>
<head>
    <title>Data Matakuliah</title>
</head>
<body onload="window.print()">
    <table border="1" width="100%" cellpadding="5" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nama Matakuliah</th>
            <th>SKS</th>
            <th>Jurusan</th>
        </tr>

        @foreach($matakuliah as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_matakuliah }}</td>
                <td>{{ $item->sks }}</td>
                <td>{{ $item->jurusan?->nama_jurusan ?? '-' }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>
