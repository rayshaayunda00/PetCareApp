<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkup;
use App\Models\Vet;

class CheckupController extends Controller
{
    public function form()
    {
        return view('checkup.form');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'pet_name'  => 'required|string',
            'species'   => 'required|string',
            'vet_name'  => 'required|string', // Ini maksudnya: umur hewan
            'date'      => 'required|date',
            'treatment' => 'required|string',
        ]);

        // Simpan data pemeriksaan
        $checkup = Checkup::create([
            'pet_name'  => $request->pet_name,
            'species'   => $request->species,
            'vet_name'  => $request->vet_name, // "vet_name" sebagai umur hewan
            'date'      => $request->date,
            'treatment' => $request->treatment,
        ]);

        // Ambil nama dokter secara acak (tidak disimpan ke DB)
        $randomVet = Vet::inRandomOrder()->first();
        $doctorName = $randomVet ? $randomVet->name : 'Tidak tersedia';

        // Kirim data ke session (termasuk nama dokter)
        return back()
            ->with('success', 'Data berhasil disimpan!')
            ->with('checkup', $checkup)
            ->with('doctor_name', $doctorName);
    }

    public function index()
    {
        $checkups = Checkup::all();
        return view('checkup.index', compact('checkups'));
    }

    public function destroy($id)
    {
        $checkup = Checkup::findOrFail($id);
        $checkup->delete();

        return redirect()->route('checkup.index')->with('success', 'Data berhasil dihapus!');
    }
}
