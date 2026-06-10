@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Edit Jurusan</div>
        <div class="card-body">
            <form action="{{ route('jurusan.update', $jurusan) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama_jurusan" class="form-label">Nama Jurusan</label>
                    <input type="text" name="nama_jurusan" id="nama_jurusan" class="form-control" value="{{ old('nama_jurusan', $jurusan->nama_jurusan) }}" required>
                </div>
                <div class="mb-3">
                    <label for="akreditasi" class="form-label">Akreditasi</label>
                    <input type="text" name="akreditasi" id="akreditasi" class="form-control" value="{{ old('akreditasi', $jurusan->akreditasi) }}" maxlength="2" required>
                </div>
                <button class="btn btn-primary" type="submit">Update</button>
                <a href="{{ route('jurusan.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
