<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
</head>
<body onload="window.print()">
    <table border="1" width="100%" cellpadding="5" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jurusan</th>
        </tr>

        @foreach($mahasiswa as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nim }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->detail_jurusan->nama_jurusan ?? '-' }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>
