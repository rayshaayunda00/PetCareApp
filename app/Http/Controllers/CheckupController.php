<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkup;

class CheckupController extends Controller
{
    public function form()
    {
        return view('checkup.form'); // tanpa ambil data dari DB
    }

    public function submit(Request $request)
    {
        $request->validate([
            'pet_name'       => 'required|string',
            'species'        => 'required|string',
            'vet_name'       => 'required|string',
            'specialization' => 'required|string',
            'date'           => 'required|date',
            'diagnosis'      => 'required|string',
            'treatment'      => 'required|string',
        ]);

        Checkup::create([
            'pet_name'       => $request->pet_name,
            'species'        => $request->species,
            'vet_name'       => $request->vet_name,
            'specialization' => $request->specialization,
            'date'           => $request->date,
            'diagnosis'      => $request->diagnosis,
            'treatment'      => $request->treatment,
        ]);

        return redirect()->route('checkup.index')->with('success', 'Data berhasil disimpan!');
    }

    public function index()
    {
        $checkups = Checkup::all(); // tanpa relasi
        return view('checkup.index', compact('checkups'));
    }
}
