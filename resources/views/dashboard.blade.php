@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="h4 mb-3">Dashboard</h1>
            <p class="mb-1">Selamat datang, {{ auth()->user()->name }}.</p>
            <p class="text-muted mb-0">Gunakan menu navigasi untuk mengelola data jurusan, mahasiswa, dan matakuliah.</p>
        </div>
    </div>
@endsection
