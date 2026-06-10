<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMahasiswaRequest;
use App\Http\Requests\UpdateMahasiswaRequest;
use App\Models\Jurusan;
use App\Models\Mahasiswa;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $mahasiswas = Mahasiswa::query()
            ->with('jurusan')
            ->latest('id_mahasiswa')
            ->paginate(10);

        return view('mahasiswa.index', compact('mahasiswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $jurusans = Jurusan::query()->orderBy('nama_jurusan')->get();

        return view('mahasiswa.create', compact('jurusans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMahasiswaRequest $request): RedirectResponse
    {
        Mahasiswa::query()->create($request->validated());

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa): View
    {
        $jurusans = Jurusan::query()->orderBy('nama_jurusan')->get();

        return view('mahasiswa.edit', compact('mahasiswa', 'jurusans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMahasiswaRequest $request, Mahasiswa $mahasiswa): RedirectResponse
    {
        $mahasiswa->update($request->validated());

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa): RedirectResponse
    {
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus.');
    }

    // PRINT PDF
    public function print(): View
    {
        $mahasiswa = Mahasiswa::with('detail_jurusan')->get();

        return view('mahasiswa.print', compact('mahasiswa'));
    }

    // PRINT EXCEL
    public function exportExcel()
    {
        $mahasiswa = Mahasiswa::with('detail_jurusan')->get();

        return response()
            ->view('mahasiswa.excel', compact('mahasiswa'))
            ->header('Content-Type', 'application/vnd.ms-excel')
            ->header('Content-Disposition', 'attachment; filename="mahasiswa_' . date('Y-m-d_H-i-s') . '.xls"');
    }
}
