<!DOCTYPE html>
<html>
<head>
    <title>Data Jurusan</title>
</head>
<body onload="window.print()">
    <table border="1" width="100%" cellpadding="5" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nama Jurusan</th>
            <th>Akreditasi</th>
        </tr>

        @foreach($jurusan as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_jurusan }}</td>
                <td>{{ $item->akreditasi }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>
