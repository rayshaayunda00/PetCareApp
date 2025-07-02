<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkup;
use App\Models\Vet;

class CheckupController extends Controller
{
    // Form input pemeriksaan
    public function form()
    {
        $randomVet = Vet::inRandomOrder()->first();
        return view('checkup.form', compact('randomVet'));
    }

    // Submit dan simpan data checkup
    public function submit(Request $request)
    {
        $request->validate([
            'pet_name'    => 'required|string',
            'species'     => 'required|string',
            'vet_name'    => 'required|string', // Umur hewan
            'date'        => 'required|date',
            'treatment'   => 'required|string',
            'doctor_name' => 'required|string',
        ]);

        $checkup = Checkup::create([
            'pet_name'    => $request->pet_name,
            'species'     => $request->species,
            'vet_name'    => $request->vet_name,
            'date'        => $request->date,
            'treatment'   => $request->treatment,
            'doctor_name' => $request->doctor_name,
        ]);

        return back()
            ->with('success', 'Data berhasil disimpan!')
            ->with('checkup', $checkup);
    }

    // Tampilkan daftar checkup
    public function index()
    {
        $checkups = Checkup::all();
        return view('checkup.index', compact('checkups'));
    }

    // Hapus data checkup
    public function destroy($id)
    {
        $checkup = Checkup::findOrFail($id);
        $checkup->delete();

        return redirect()->route('checkup.index')->with('success', 'Data berhasil dihapus!');
    }

    // Tampilkan struk berdasarkan ID
    public function receipt($id)
    {
        $checkup = Checkup::findOrFail($id);
        return view('checkup.receipt', compact('checkup'));
    }
}
