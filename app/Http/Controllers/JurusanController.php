<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJurusanRequest;
use App\Http\Requests\UpdateJurusanRequest;
use App\Models\Jurusan;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $jurusans = Jurusan::query()->latest('id_jurusan')->paginate(10);

        return view('jurusan.index', compact('jurusans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJurusanRequest $request): RedirectResponse
    {
        Jurusan::query()->create($request->validated());

        return redirect()->route('jurusan.index')->with('success', 'Data jurusan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function edit(Jurusan $jurusan): View
    {
        return view('jurusan.edit', compact('jurusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJurusanRequest $request, Jurusan $jurusan): RedirectResponse
    {
        $jurusan->update($request->validated());

        return redirect()->route('jurusan.index')->with('success', 'Data jurusan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jurusan $jurusan): RedirectResponse
    {
        $jurusan->delete();

        return redirect()->route('jurusan.index')->with('success', 'Data jurusan berhasil dihapus.');
    }

    // PRINT PDF
    public function print(): View
    {
        $jurusan = Jurusan::all();

        return view('jurusan.print', compact('jurusan'));
    }

    // PRINT EXCEL
    public function exportExcel()
    {
        $jurusan = Jurusan::all();

        return response()
            ->view('jurusan.excel', compact('jurusan'))
            ->header('Content-Type', 'application/vnd.ms-excel')
            ->header('Content-Disposition', 'attachment; filename="jurusan_' . date('Y-m-d_H-i-s') . '.xls"');
    }
}
