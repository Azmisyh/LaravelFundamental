@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Tambah Mahasiswa</div>
        <div class="card-body">
            <form action="{{ route('mahasiswa.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" name="nim" id="nim" class="form-control" value="{{ old('nim') }}" required>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}" required>
                </div>
                <div class="mb-3">
                    <label for="id_jurusan" class="form-label">Jurusan</label>
                    <select name="id_jurusan" id="id_jurusan" class="form-select" required>
                        <option value="">-- Pilih Jurusan --</option>
                        @foreach ($jurusans as $jurusan)
                            <option value="{{ $jurusan->id_jurusan }}" @selected(old('id_jurusan') == $jurusan->id_jurusan)>
                                {{ $jurusan->nama_jurusan }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-primary" type="submit">Simpan</button>
                <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
