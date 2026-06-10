<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMatakuliahRequest;
use App\Http\Requests\UpdateMatakuliahRequest;
use App\Models\Jurusan;
use App\Models\Matakuliah;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $matakuliahs = Matakuliah::query()
            ->with('jurusan')
            ->latest('id_matakuliah')
            ->paginate(10);

        return view('matakuliah.index', compact('matakuliahs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $jurusans = Jurusan::query()->orderBy('nama_jurusan')->get();

        return view('matakuliah.create', compact('jurusans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMatakuliahRequest $request): RedirectResponse
    {
        Matakuliah::query()->create($request->validated());

        return redirect()->route('matakuliah.index')->with('success', 'Data matakuliah berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function edit(Matakuliah $matakuliah): View
    {
        $jurusans = Jurusan::query()->orderBy('nama_jurusan')->get();

        return view('matakuliah.edit', compact('matakuliah', 'jurusans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMatakuliahRequest $request, Matakuliah $matakuliah): RedirectResponse
    {
        $matakuliah->update($request->validated());

        return redirect()->route('matakuliah.index')->with('success', 'Data matakuliah berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Matakuliah $matakuliah): RedirectResponse
    {
        $matakuliah->delete();

        return redirect()->route('matakuliah.index')->with('success', 'Data matakuliah berhasil dihapus.');
    }

    // PRINT PDF
    public function print(): View
    {
        $matakuliah = Matakuliah::with('jurusan')->get();

        return view('matakuliah.print', compact('matakuliah'));
    }

    // PRINT EXCEL
    public function exportExcel()
    {
        $matakuliah = Matakuliah::with('jurusan')->get();

        return response()
            ->view('matakuliah.excel', compact('matakuliah'))
            ->header('Content-Type', 'application/vnd.ms-excel')
            ->header('Content-Disposition', 'attachment; filename="matakuliah_' . date('Y-m-d_H-i-s') . '.xls"');
    }
}
