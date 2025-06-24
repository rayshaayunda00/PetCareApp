<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;
use App\Models\Pet;

class PenitipanController extends Controller
{
    public function form()
    {
        return view('penitipan.form');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'phone'    => 'required|string|max:20',
            'address'  => 'required|string',
            'pet_name' => 'required|string|max:255',
            'species'  => 'required|string|max:100',
            'breed'    => 'required|string|max:100',
            'age'      => 'required|integer',
        ]);

        $owner = Owner::create([
            'name'    => $request->name,
            'phone'   => $request->phone,
            'address' => $request->address,
        ]);

        Pet::create([
            'owner_id' => $owner->id,
            'name'     => $request->pet_name,
            'species'  => $request->species,
            'breed'    => $request->breed,
            'age'      => $request->age,
        ]);

        return redirect()->route('penitipan.form')->with('success', 'Data penitipan berhasil disimpan!');
    }
}
