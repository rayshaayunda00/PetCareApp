<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vaccination;

class VaccinationController extends Controller
{
    public function form()
    {
        return view('vaccination.form');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'pet_name'         => 'required|string|max:255',
            'vaccine_type'    => 'required|string|max:255',
            'vaccination_date' => 'required|date',
            'notes'           => 'nullable|string',
        ]);

        Vaccination::create($request->all());

        return redirect()->route('vaccination.form')->with('success', 'Data vaksinasi berhasil disimpan!');
    }
}
