<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vaccination;
use App\Models\Vet;

class VaccinationController extends Controller
{
    // ================= PUBLIC =================


    public function form()
{
    $randomVet = Vet::inRandomOrder()->first();
    return view('vaccination.form', compact('randomVet'));
}


public function submit(Request $request)
{
    $request->validate([
        'pet_name'          => 'required|string|max:255',
        'vaccine_type'      => 'required|string|max:255',
        'vaccination_date'  => 'required|date',
        'notes'             => 'nullable|string',
        'doctor_name'       => 'required|string|max:255',
    ]);

    $vaccination = Vaccination::create([
        'pet_name'         => $request->pet_name,
        'vaccine_type'     => $request->vaccine_type,
        'vaccination_date' => $request->vaccination_date,
        'notes'            => $request->notes,
        'doctor_name'      => $request->doctor_name,
    ]);

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
    // ================= STRUK =================

    public function receipt($id)
{
    $vaccination = Vaccination::findOrFail($id);
    return view('vaccination.receipt', compact('vaccination'));
}

}
