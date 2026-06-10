@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4 mb-0">Data Matakuliah</h1>
        <a href="{{ route('matakuliah.create') }}" class="btn btn-primary">Tambah Matakuliah</a>
    </div>

    <div class="card">
        <div class="table-responsive">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Matakuliah</th>
                        <th>SKS</th>
                        <th>Jurusan</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($matakuliahs as $matakuliah)
                        <tr>
                            <td>{{ $matakuliah->id_matakuliah }}</td>
                            <td>{{ $matakuliah->nama_matakuliah }}</td>
                            <td>{{ $matakuliah->sks }}</td>
                            <td>{{ $matakuliah->jurusan?->nama_jurusan }}</td>
                            <td class="text-end">
                                <a href="{{ route('matakuliah.edit', $matakuliah) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('matakuliah.destroy', $matakuliah) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Hapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-3">Belum ada data.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        {{ $matakuliahs->links() }}
    </div>

    <a href="{{ route('matakuliah.print') }}" target="_blank">
        Export PDF
    </a>

    <a href="{{ url('/matakuliah/export-csv') }}" target="_blank">
        Export Excel
    </a>
@endsection
