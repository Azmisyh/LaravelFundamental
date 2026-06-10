@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Tambah Matakuliah</div>
        <div class="card-body">
            <form action="{{ route('matakuliah.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama_matakuliah" class="form-label">Nama Matakuliah</label>
                    <input type="text" name="nama_matakuliah" id="nama_matakuliah" class="form-control" value="{{ old('nama_matakuliah') }}" required>
                </div>
                <div class="mb-3">
                    <label for="sks" class="form-label">SKS</label>
                    <input type="number" name="sks" id="sks" class="form-control" value="{{ old('sks') }}" min="1" max="6" required>
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
                <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
