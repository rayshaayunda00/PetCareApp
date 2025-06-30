<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vaccination;

class VaccinationController extends Controller
{
    // ================= PUBLIC =================


    public function form()
    {
        return view('vaccination.form');
    }

public function submit(Request $request)
{
    $request->validate([
        'pet_name'          => 'required|string|max:255',
        'vaccine_type'      => 'required|string|max:255',
        'vaccination_date'  => 'required|date',
        'notes'             => 'nullable|string',
    ]);

    $vaccination = Vaccination::create($request->all());

    return back()
        ->with('success', 'Data vaksinasi berhasil disimpan!')
        ->with('vaccination', $vaccination);
}


    // ================= ADMIN =================

    public function index()
    {
        $vaccinations = Vaccination::all(); // Jika ada relasi: with('owner', 'pet')
        return view('vaccination.index', compact('vaccinations'));
    }

    public function create()
    {
        return view('vaccination.create'); // Form tambah data
    }

    public function store(Request $request)
    {
        $request->validate([
            'pet_name'          => 'required|string|max:255',
            'vaccine_type'      => 'required|string|max:255',
            'vaccination_date'  => 'required|date',
            'notes'             => 'nullable|string',
        ]);

        Vaccination::create($request->all());

        return redirect()->route('vaccination.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show($id)
    {
        $vaccination = Vaccination::findOrFail($id);
        return view('vaccination.show', compact('vaccination'));
    }

    public function edit($id)
    {
        $vaccination = Vaccination::findOrFail($id);
        return view('vaccination.edit', compact('vaccination'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pet_name'          => 'required|string|max:255',
            'vaccine_type'      => 'required|string|max:255',
            'vaccination_date'  => 'required|date',
            'notes'             => 'nullable|string',
        ]);

        $vaccination = Vaccination::findOrFail($id);
        $vaccination->update($request->all());

        return redirect()->route('vaccination.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $vaccination = Vaccination::findOrFail($id);
        $vaccination->delete();

        return redirect()->route('vaccination.index')->with('success', 'Data berhasil dihapus.');
    }
}
