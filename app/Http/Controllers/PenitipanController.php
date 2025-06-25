<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;
use App\Models\Pet;

class PenitipanController extends Controller
{
    public function index()
    {
        $owners = Owner::with('pets')->get();
        return view('penitipan.index', compact('owners'));
    }

    public function create()
    {
        return view('penitipan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'phone'    => 'required',
            'address'  => 'required',
            'pet_name' => 'required',
            'species'  => 'required',
            'breed'    => 'required',
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

        return redirect()->route('penitipan.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show($id)
    {
        $owner = Owner::with('pets')->findOrFail($id);
        return view('penitipan.show', compact('owner'));
    }

    public function edit($id)
    {
        $owner = Owner::with('pets')->findOrFail($id);
        return view('penitipan.edit', compact('owner'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'     => 'required',
            'phone'    => 'required',
            'address'  => 'required',
            'pet_name' => 'required',
            'species'  => 'required',
            'breed'    => 'required',
            'age'      => 'required|integer',
        ]);

        $owner = Owner::findOrFail($id);
        $owner->update([
            'name'    => $request->name,
            'phone'   => $request->phone,
            'address' => $request->address,
        ]);

        $pet = $owner->pets->first();
        $pet->update([
            'name'    => $request->pet_name,
            'species' => $request->species,
            'breed'   => $request->breed,
            'age'     => $request->age,
        ]);

        return redirect()->route('penitipan.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $owner = Owner::findOrFail($id);
        $owner->delete();
        return redirect()->route('penitipan.index')->with('success', 'Data berhasil dihapus.');
    }
}
