<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkup;

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
            'vet_name'  => 'required|string',
            'date'      => 'required|date',
            'treatment' => 'required|string',
        ]);

        $checkup = Checkup::create([
            'pet_name'  => $request->pet_name,
            'species'   => $request->species,
            'vet_name'  => $request->vet_name,
            'date'      => $request->date,
            'treatment' => $request->treatment,
        ]);

        // Tetap di halaman form, kirim data untuk pop-up struk
        return back()
            ->with('success', 'Data berhasil disimpan!')
            ->with('checkup', $checkup);
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
