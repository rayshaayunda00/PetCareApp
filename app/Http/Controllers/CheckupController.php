<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Vet;
use App\Models\Checkup;

class CheckupController extends Controller
{
    // Tampilkan form
    public function form()
    {
        $pets = Pet::all();
        $vets = Vet::all();
        return view('checkup.form', compact('pets', 'vets'));
    }

    // Simpan data dari form
    public function submit(Request $request)
    {
        $request->validate([
            'pet_id'    => 'required|exists:raysha_pets,id',
            'vet_id'    => 'required|exists:raysha_vets,id',
            'date'      => 'required|date',
            'diagnosis' => 'required|string',
            'treatment' => 'required|string',
        ]);

        Checkup::create($request->all());

        return redirect()->route('checkup.form')->with('success', 'Data periksa kesehatan berhasil disimpan!');
    }
}
