<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Sistem Akademik' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard') }}">Sistem Akademik</a>
            @auth
                <div class="d-flex gap-2">
                    <a class="btn btn-sm btn-outline-light" href="{{ route('jurusan.index') }}">Jurusan</a>
                    <a class="btn btn-sm btn-outline-light" href="{{ route('mahasiswa.index') }}">Mahasiswa</a>
                    <a class="btn btn-sm btn-outline-light" href="{{ route('matakuliah.index') }}">Matakuliah</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-sm btn-warning" type="submit">Logout</button>
                    </form>
                </div>
            @endauth
        </div>
    </nav>

    <main class="container pb-5">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>
