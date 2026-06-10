@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h4 mb-0">Data Mahasiswa</h1>
        <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">Tambah Mahasiswa</a>
    </div>

    <div class="card">
        <div class="table-responsive">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Jurusan</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($mahasiswas as $mahasiswa)
                        <tr>
                            <td>{{ $mahasiswa->id_mahasiswa }}</td>
                            <td>{{ $mahasiswa->nim }}</td>
                            <td>{{ $mahasiswa->nama }}</td>
                            <td>{{ $mahasiswa->jurusan?->nama_jurusan }}</td>
                            <td class="text-end">
                                <a href="{{ route('mahasiswa.edit', $mahasiswa) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('mahasiswa.destroy', $mahasiswa) }}" method="POST" class="d-inline">
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
        {{ $mahasiswas->links() }}
    </div>

    <a href="{{ route('mahasiswa.print') }}" target="_blank">
        Export PDF
    </a>

    <a href="{{ url('/mahasiswa/export-csv') }}" target="_blank">
        Export Excel
    </a>
@endsection
