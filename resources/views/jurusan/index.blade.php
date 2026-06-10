@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4 mb-0">Data Jurusan</h1>
        <a href="{{ route('jurusan.create') }}" class="btn btn-primary">Tambah Jurusan</a>
    </div>

    <div class="card">
        <div class="table-responsive">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Jurusan</th>
                        <th>Akreditasi</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jurusans as $jurusan)
                        <tr>
                            <td>{{ $jurusan->id_jurusan }}</td>
                            <td>{{ $jurusan->nama_jurusan }}</td>
                            <td>{{ $jurusan->akreditasi }}</td>
                            <td class="text-end">
                                <a href="{{ route('jurusan.edit', $jurusan) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('jurusan.destroy', $jurusan) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Hapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-3">Belum ada data.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        {{ $jurusans->links() }}
    </div>

    <a href="{{ route('jurusan.print') }}" target="_blank">
        Export PDF
    </a>

    <a href="{{ url('/jurusan/export-csv') }}" target="_blank">
        Export Excel
    </a>
@endsection
