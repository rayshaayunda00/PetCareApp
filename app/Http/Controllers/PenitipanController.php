<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;
use App\Models\Pet;
use App\Models\Penitipan;

class PenitipanController extends Controller
{
    // ================= ADMIN =================

    public function index()
    {
        $owners = Owner::with('pets')->get();
        return view('penitipan.index', compact('owners'));
    }

    public function create()
    {
        return view('penitipan.create'); // Admin create
    }

public function store(Request $request)
{
    $request->validate([
        'name'        => 'required',
        'phone'       => 'required',
        'address'     => 'required',
        'pet_name'    => 'required',
        'species'     => 'required',
        'breed'       => 'required',
        'age'         => 'required|integer',
        'start_date'  => 'required|date',
        'end_date'    => 'nullable|date|after_or_equal:start_date',
        'notes'       => 'nullable|string',
    ]);

    // Simpan Owner
    $owner = Owner::create([
        'name'    => $request->name,
        'phone'   => $request->phone,
        'address' => $request->address,
    ]);

    // Simpan Pet
    $pet = Pet::create([
        'owner_id' => $owner->id,
        'name'     => $request->pet_name,
        'species'  => $request->species,
        'breed'    => $request->breed,
        'age'      => $request->age,
    ]);

    // Simpan Penitipan
    Penitipan::create([
        'owner_id'   => $owner->id,
        'pet_id'     => $pet->id,
        'start_date' => $request->start_date,
        'end_date'   => $request->end_date,
        'status'     => 'aktif',
        'notes'      => $request->notes,
    ]);

    return back()->with('success', 'Data penitipan berhasil disimpan!');
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

    // ================= FORM PUBLIC =================

    public function formPublic()
    {
        return view('penitipan.create');
    }

public function submitPublic(Request $request)
{
    $request->validate([
        'name'        => 'required',
        'phone'       => 'required',
        'address'     => 'required',
        'pet_name'    => 'required',
        'species'     => 'required',
        'breed'       => 'required',
        'age'         => 'required|integer',
        'start_date'  => 'required|date',
        'end_date'    => 'nullable|date|after_or_equal:start_date',
        'notes'       => 'nullable|string',
    ]);

    // Simpan Owner
    $owner = Owner::create([
        'name'    => $request->name,
        'phone'   => $request->phone,
        'address' => $request->address,
    ]);

    // Simpan Pet
    $pet = Pet::create([
        'owner_id' => $owner->id,
        'name'     => $request->pet_name,
        'species'  => $request->species,
        'breed'    => $request->breed,
        'age'      => $request->age,
    ]);

    // Simpan Penitipan
    Penitipan::create([
        'owner_id'   => $owner->id,
        'pet_id'     => $pet->id,
        'start_date' => $request->start_date,
        'end_date'   => $request->end_date,
        'status'     => 'aktif',
        'notes'      => $request->notes,
    ]);

    return back()
    ->with('success', 'Data penitipan berhasil disimpan!')
    ->with('penitipan', (object)[
        'name'        => $owner->name,
        'phone'       => $owner->phone,
        'address'     => $owner->address,
        'pet_name'    => $pet->name,
        'species'     => $pet->species,
        'breed'       => $pet->breed,
        'age'         => $pet->age,
        'start_date'  => $request->start_date,
        'end_date'    => $request->end_date,
        'notes'       => $request->notes,
    ]);

}

}
